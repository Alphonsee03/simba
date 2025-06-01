<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Learn More - MySimba</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fcfc;
            margin: 0;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #5a5bdd;
            color: white;
            padding: 1.5rem 2rem;
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 1.5px;
        }

        main {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        h2 {
            color: #5a5bdd;
            margin-top: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
            font-size: 1.9rem;
            border-bottom: 3px solid #ddfef8;
            padding-bottom: 0.3rem;
        }
        h3 {
            color: #5a5bdd;
            font-weight: 500px;
            font-size: 1rem;
        }

        p {
            margin-bottom: 1.2rem;
            font-size: 1.1rem;
            color: #555;
        }

        ul {
            margin-left: 1.5rem;
            margin-bottom: 1.5rem;
        }

        ul li {
            margin-bottom: 0.7rem;
            font-size: 1.05rem;
        }

        a.back-link {
            display: inline-block;
            margin-top: 3rem;
            text-decoration: none;
            background-color: #5a5bdd;
            color: white;
            padding: 0.8rem 1.6rem;
            border-radius: 40px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        a.back-link:hover,
        a.back-link:focus {
            background-color: #454bcb;
            outline: none;
        }
    </style>
</head>
<body>
    <header>MySimba - Learn More</header>
    <main class="mainn">
        <section>
            <h2>Concept</h2>
            <p>MySIMBA adalah aplikasi berbasis web yang dibangun dengan <b>Laravel 11</b> untuk mengelola proses beasiswa kampus secara efisien,
                transparan, dan berbasis sistem pendukung keputusan. Aplikasi ini menggunakan <b>multi-role</b> (Admin, Petugas, Mahasiswa), 
                autentikasi menggunakan <b>multi-guard bawaan laravel</b>, dan menerapkan metode SPK <b>SAW (Simple Additive Weighting)</b> untuk proses seleksi penerima beasiswa</p>
        </section>

        <section>
            <h2>Roles & Functions</h2>
                <h3> ~ ADMIN</h3>
                <p>Akes tertinggi dalam sistem ini. Memiliki akses penuh ke semua fitur dan data.</p>
            <ul>
                <li>Manajemen User (CRUD Admin, Petugas, Mahasiswa)</li>
                <li>Manajemen Beasiswa (CRUD Beasiswa)</li>
                <li>Monitoring dan analisis data (dashboard dinamis)</li>
                <li>Melihat hasil seleksi SAW semua beasiswa</li>
                <li>Menentukan kriteria & bobot seleksi (opsional)</li>
            </ul>
                <h3> ~ PETUGAS</h3>
                <p>Role Veryfikator dalam sistem ini, untuk memveryfikasi mahasiswa yang mendaftar beasiswa </p>
            <ul>
                <li>Menambahkan/mengelola data mahasiswa pendaftar</li>
                <li>Melihat data pendaftar tiap beasiswa</li>
                <li>Melakukan proses seleksi (memicu algoritma SAW)</li>
                <li>Melihat hasil seleksi</li>
                <li>Mencetak laporan hasil seleksi</li>
            </ul>
                <h3> ~ MAHASISWA</h3>
                <p>Mahasiswa yang mendaftar berbagai macam beasiswa  </p>
            <ul>
                <li>Melihat daftar beasiswa yang tersedia</li>
                <Mengajukan>Mengajukan pendaftaran beasiswa</li>
                <li>Melihat status seleksi (LOLOS/TIDAK)</li>
                <li>Melihat hasil akhir seleksi (nilai & peringkat)</li>
                <li>Mencetak laporan hasil seleksi</li>
            </ul>
        </section>

        <section>
            <h2>Featur Utama & Modul</h2>
            <ul>
                <li>Authenticasi Multi-Role</li>
                <li>Pendaftaran Beasiswa</li>
                <li>Proses Seleksi SAW</li>
                <li>Hasil Seleksi</li>
            </ul>
        </section>

        <a href="{{ url('/') }}" class="back-link" aria-label="Back to Home Page">← Back to Home</a>
    </main>
</body>
</html>
