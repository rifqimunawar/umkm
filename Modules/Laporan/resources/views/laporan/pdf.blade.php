<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 5%;
      padding: 0;
    }

    h3 {
      text-align: center;
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }

    table,
    th,
    td {
      border: 1px solid #000;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <div style="text-align:center;">
    <h3>{{ $title }}</h3>
  </div>

  <!-- ISI KONTEN -->
  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Karyawan</th>
        <th>NIP</th>
        <th>Jabatan</th>
        <th>Nilai</th>
        <th>Periode</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->nip }}</td>
          <td>{{ $item->jabatan }}</td>
          <td>{{ $item->avg_nilai }}</td>
          <td>{{ $item->bulan . ' ' . $item->tahun }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
