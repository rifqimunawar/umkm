<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KriteriasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kriterias')->delete();
        
        \DB::table('kriterias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'jabatan_id' => '1',
                'kriteria' => 'kepenulisan',
                'desc' => 'skill menulis',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-06-10 12:02:42',
                'created_at' => '2025-06-10 11:50:41',
                'updated_at' => '2025-06-10 12:02:42',
            ),
            1 => 
            array (
                'id' => 2,
                'jabatan_id' => '1',
                'kriteria' => 'Komunikasi',
                'desc' => 'skil komunikasi lobi',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-06-10 12:02:46',
                'created_at' => '2025-06-10 11:50:59',
                'updated_at' => '2025-06-10 12:02:46',
            ),
            2 => 
            array (
                'id' => 3,
                'jabatan_id' => '1',
                'kriteria' => 'Kepemimpinan',
                'desc' => 'Kemampuan memimpin tim, mengarahkan visi, dan membuat keputusan strategis.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:10:26',
                'updated_at' => '2025-06-10 12:10:26',
            ),
            3 => 
            array (
                'id' => 4,
                'jabatan_id' => '1',
                'kriteria' => 'Komunikasi Visi',
                'desc' => 'Mampu menyampaikan tujuan jangka panjang dan memotivasi tim.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:10:52',
                'updated_at' => '2025-06-10 12:10:52',
            ),
            4 => 
            array (
                'id' => 5,
                'jabatan_id' => '1',
                'kriteria' => 'Manajemen Risiko',
                'desc' => 'Ketanggapan dalam mengidentifikasi dan mengelola risiko bisnis.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:11:13',
                'updated_at' => '2025-06-10 12:11:13',
            ),
            5 => 
            array (
                'id' => 6,
                'jabatan_id' => '1',
                'kriteria' => 'Inovasi Bisnis',
                'desc' => 'Kemampuan mencari peluang baru dan menciptakan strategi pertumbuhan.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:11:29',
                'updated_at' => '2025-06-10 12:11:29',
            ),
            6 => 
            array (
                'id' => 7,
                'jabatan_id' => '1',
                'kriteria' => 'Hubungan Klien',
                'desc' => 'Membangun dan menjaga kepercayaan klien utama.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:11:43',
                'updated_at' => '2025-06-10 12:11:43',
            ),
            7 => 
            array (
                'id' => 8,
                'jabatan_id' => '2',
                'kriteria' => 'Manajemen Waktu',
                'desc' => 'Ketepatan dalam menyusun dan mengikuti timeline proyek.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:12:13',
                'updated_at' => '2025-06-10 12:12:13',
            ),
            8 => 
            array (
                'id' => 9,
                'jabatan_id' => '2',
                'kriteria' => 'Koordinasi Tim',
                'desc' => 'Kemampuan berkomunikasi dan mengatur kolaborasi antar anggota tim.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:12:28',
                'updated_at' => '2025-06-10 12:12:28',
            ),
            9 => 
            array (
                'id' => 10,
                'jabatan_id' => '2',
                'kriteria' => 'Pemecahan Masalah',
                'desc' => 'Tanggap dalam menyelesaikan kendala teknis maupun non-teknis.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:12:45',
                'updated_at' => '2025-06-10 12:12:45',
            ),
            10 => 
            array (
                'id' => 11,
                'jabatan_id' => '2',
                'kriteria' => 'Kepuasan Klien',
                'desc' => 'Sejauh mana hasil proyek memenuhi harapan dan kebutuhan klien.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:13:02',
                'updated_at' => '2025-06-10 12:13:02',
            ),
            11 => 
            array (
                'id' => 12,
                'jabatan_id' => '2',
                'kriteria' => 'Dokumentasi Proyek',
                'desc' => 'Kelengkapan dan kerapihan laporan serta spesifikasi teknis.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:13:17',
                'updated_at' => '2025-06-10 12:13:17',
            ),
            12 => 
            array (
                'id' => 13,
                'jabatan_id' => '3',
                'kriteria' => 'Kreativitas Desain',
                'desc' => 'Orisinalitas dan estetika dalam menciptakan antarmuka.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:13:33',
                'updated_at' => '2025-06-10 12:13:33',
            ),
            13 => 
            array (
                'id' => 14,
                'jabatan_id' => '3',
                'kriteria' => 'Konsistensi UI',
                'desc' => 'Kesesuaian desain antar halaman dan elemen aplikasi.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:14:05',
                'updated_at' => '2025-06-10 12:14:05',
            ),
            14 => 
            array (
                'id' => 15,
                'jabatan_id' => '3',
                'kriteria' => 'Empati Pengguna',
                'desc' => 'Kemampuan memahami kebutuhan dan perilaku pengguna.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:14:20',
                'updated_at' => '2025-06-10 12:14:20',
            ),
            15 => 
            array (
                'id' => 16,
                'jabatan_id' => '3',
                'kriteria' => 'Prototyping & Wireframing',
                'desc' => 'etepatan dalam membuat prototipe sebelum pengembangan.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:14:33',
                'updated_at' => '2025-06-10 12:14:33',
            ),
            16 => 
            array (
                'id' => 17,
                'jabatan_id' => '3',
                'kriteria' => 'Kolaborasi Tim',
                'desc' => 'Kemampuan berkoordinasi dengan frontend dan PM.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:14:49',
                'updated_at' => '2025-06-10 12:14:49',
            ),
            17 => 
            array (
                'id' => 18,
                'jabatan_id' => '4',
                'kriteria' => 'Kualitas Kode',
                'desc' => 'Kebersihan, efisiensi, dan struktur kode yang ditulis.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:15:19',
                'updated_at' => '2025-06-10 12:15:19',
            ),
            18 => 
            array (
                'id' => 19,
                'jabatan_id' => '4',
                'kriteria' => 'Implementasi UI/UX',
                'desc' => 'Akurasi dalam menerjemahkan desain ke dalam kode.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:15:32',
                'updated_at' => '2025-06-10 12:15:32',
            ),
            19 => 
            array (
                'id' => 20,
                'jabatan_id' => '4',
                'kriteria' => 'Responsivitas Aplikasi',
                'desc' => 'Kesesuaian tampilan di berbagai perangkat.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:15:45',
                'updated_at' => '2025-06-10 12:15:45',
            ),
            20 => 
            array (
                'id' => 21,
                'jabatan_id' => '4',
                'kriteria' => 'Performance Optimizing',
                'desc' => 'Kecepatan loading dan penggunaan resource efisien.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:15:57',
                'updated_at' => '2025-06-10 12:15:57',
            ),
            21 => 
            array (
                'id' => 22,
                'jabatan_id' => '4',
                'kriteria' => 'Kolaborasi Git',
            'desc' => 'Penggunaan version control (branching, merge, commit) secara benar.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:16:13',
                'updated_at' => '2025-06-10 12:16:13',
            ),
            22 => 
            array (
                'id' => 23,
                'jabatan_id' => '5',
                'kriteria' => 'Struktur API',
                'desc' => 'Kerapihan dan dokumentasi API yang dibuat.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:16:30',
                'updated_at' => '2025-06-10 12:16:30',
            ),
            23 => 
            array (
                'id' => 24,
                'jabatan_id' => '5',
                'kriteria' => 'Keamanan Aplikasi',
                'desc' => 'Perlindungan terhadap celah umum seperti SQL injection, XSS, dsb.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:16:43',
                'updated_at' => '2025-06-10 12:16:43',
            ),
            24 => 
            array (
                'id' => 25,
                'jabatan_id' => '5',
                'kriteria' => 'Kinerja Database',
                'desc' => 'Efisiensi query dan pengelolaan data.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:16:55',
                'updated_at' => '2025-06-10 12:16:55',
            ),
            25 => 
            array (
                'id' => 26,
                'jabatan_id' => '5',
                'kriteria' => 'Stabilitas Sistem',
                'desc' => 'Uptime dan reliability dari sisi server/backend.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:17:08',
                'updated_at' => '2025-06-10 12:17:08',
            ),
            26 => 
            array (
                'id' => 27,
                'jabatan_id' => '5',
                'kriteria' => 'Testing & Debugging',
                'desc' => 'Kedisiplinan dalam menulis test dan menangani error.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:17:21',
                'updated_at' => '2025-06-10 12:17:21',
            ),
            27 => 
            array (
                'id' => 28,
                'jabatan_id' => '6',
                'kriteria' => 'Ketelitian Testing',
                'desc' => 'Kemampuan menemukan bug atau error yang tersembunyi.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:17:37',
                'updated_at' => '2025-06-10 12:17:37',
            ),
            28 => 
            array (
                'id' => 29,
                'jabatan_id' => '6',
                'kriteria' => 'Dokumentasi Uji',
                'desc' => 'Kelengkapan dan kejelasan laporan hasil testing.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:17:50',
                'updated_at' => '2025-06-10 12:17:50',
            ),
            29 => 
            array (
                'id' => 30,
                'jabatan_id' => '6',
                'kriteria' => 'Komunikasi dengan Dev',
                'desc' => 'Kolaborasi efektif dengan developer saat melaporkan bug.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:18:04',
                'updated_at' => '2025-06-10 12:18:04',
            ),
            30 => 
            array (
                'id' => 31,
                'jabatan_id' => '6',
            'kriteria' => 'Automated Testing (opsional)',
                'desc' => 'Penguasaan tools seperti Selenium, PHPUnit, dsb.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:18:22',
                'updated_at' => '2025-06-10 12:18:22',
            ),
            31 => 
            array (
                'id' => 32,
                'jabatan_id' => '6',
                'kriteria' => 'Pemahaman Fungsional',
                'desc' => 'Memahami fitur dan alur aplikasi secara menyeluruh.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:18:36',
                'updated_at' => '2025-06-10 12:18:36',
            ),
        ));
        
        
    }
}