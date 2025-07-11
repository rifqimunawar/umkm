# app.py
from flask import Flask, request, jsonify
import pandas as pd
from prophet import Prophet
from datetime import datetime
import numpy as np
from sklearn.linear_model import LinearRegression



app = Flask(__name__)

@app.route('/')
def hello():
    return 'Hello World from Flask!'

@app.route('/prediksi_bahan_baku', methods=['POST'])
def prediksi_bahan_baku():
    data = request.get_json()
    df = pd.DataFrame(data)

    df['created_at'] = pd.to_datetime(df['created_at'])
    hasil_forecast = {}
    bahan_list = df['nama_bahan'].unique()

    for bahan in bahan_list:
        bahan_df = df[df['nama_bahan'] == bahan].copy()

        daily_usage = (
            bahan_df
            .groupby(bahan_df['created_at'].dt.date)['jumlah_bahan_digunakan_unk_1_produk']
            .sum()
            .reset_index()
            .rename(columns={'created_at': 'ds', 'jumlah_bahan_digunakan_unk_1_produk': 'y'})
        )

        if len(daily_usage) < 2:
            hasil_forecast[bahan] = {"error": "Data kurang untuk forecasting"}
            continue

        daily_usage['ds'] = pd.to_datetime(daily_usage['ds'])

        all_dates = pd.date_range(start=daily_usage['ds'].min(), end=daily_usage['ds'].max())
        daily_usage = daily_usage.set_index('ds').reindex(all_dates, fill_value=0).reset_index()
        daily_usage.columns = ['ds', 'y']
        q_low = daily_usage['y'].quantile(0.01)
        q_high = daily_usage['y'].quantile(0.99)
        daily_usage = daily_usage[(daily_usage['y'] >= q_low) & (daily_usage['y'] <= q_high)]

        model = Prophet(
            seasonality_mode='multiplicative',
            weekly_seasonality=True,
            daily_seasonality=False,
            yearly_seasonality=False
        )

        model.fit(daily_usage)

        future = model.make_future_dataframe(periods=7)
        forecast = model.predict(future)

        prediksi_7_hari = forecast[['ds', 'yhat']].tail(7).copy()
        prediksi_7_hari['tanggal'] = prediksi_7_hari['ds'].dt.strftime('%Y-%m-%d %H:%M:%S')
        prediksi_7_hari['kebutuhan'] = prediksi_7_hari['yhat'].round(2)

        hasil_forecast[bahan] = prediksi_7_hari[['tanggal', 'kebutuhan']].to_dict(orient='records')

    return jsonify(hasil_forecast)


@app.route('/m2block', methods=['POST'])
def m2block():
    try:
        payload = request.get_json()
        data = payload.get('data', [])

        if not data or not isinstance(data, list):
            return jsonify({'error': 'Invalid data format'}), 400

        # Convert to log2 scale (karena semua angka kelipatan 2)
        log_data = np.log2(data)

        X = np.arange(len(log_data)).reshape(-1, 1)
        y = np.array(log_data).reshape(-1, 1)

        # Fit linear regression pada log2 dari data
        model = LinearRegression()
        model.fit(X, y)

        # Prediksi log2 nilai berikutnya
        next_indices = np.array([[len(data) + i] for i in range(3)])
        next_log_values = model.predict(next_indices).flatten()

        # Convert kembali ke basis 2
        next_values = np.power(2, next_log_values)

        result = {
            'next': int(round(next_values[0])),
            'next1': int(round(next_values[1])),
            'next2': int(round(next_values[2])),
        }

        return jsonify(result)

    except Exception as e:
        return jsonify({'error': str(e)}), 500
if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5001)
