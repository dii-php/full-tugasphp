<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Tugas - XI RPL B</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            margin: 0;
            padding: 0;
            color: #fff;
        }
        header {
            text-align: center;
            padding: 40px 20px;
            background: rgba(0, 0, 0, 0.3);
        }
        header h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        header p {
            margin: 10px 0 0;
            font-size: 1.2rem;
        }
        h2.section-title {
            text-align: center;
            margin-top: 40px;
            font-size: 2rem;
            color: #ffffffff;
        }
        .container {
            display: flex;
            flex-direction: row; /* Horizontal */
            justify-content: center;
            flex-wrap: wrap; /* Supaya responsif di layar kecil */
            padding: 40px 20px;
            gap: 20px;
        }
        .card {
            background: #fff;
            color: #333;
            width: 280px;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            transition: 0.3s;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
        }
        .card:hover {
            transform: translateY(-8px);
            background: #f3f3f3;
        }
        .card h2 {
            margin: 0 0 10px;
            color: #2a5298;
        }
        .card p {
            font-size: 0.95rem;
        }
        .card a {
            text-decoration: none;
            color: #2a5298;
            font-weight: bold;
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            border: 2px solid #2a5298;
            border-radius: 6px;
            transition: 0.3s;
        }
        .card a:hover {
            background: #2a5298;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <h1>Daftar Tugas XI RPL B</h1>
        <p>Oleh: Moh. Novrialdi Pratama</p>
    </header>

    <h2 class="section-title">TUGAS IBU RATNA</h2>
    <div class="container">
        <div class="card">
            <h2>Tugas 1</h2>
            <p>Program web untuk menghitung besar tabungan tiap bulan</p>
            <a href="tabungan.php">Lihat Program</a>
        </div>

        <div class="card">
            <h2>Tugas 2</h2>
            <p>Program rental mobil</p>
            <a href="rental.php">Lihat Program</a>
        </div>

        <div class="card">
            <h2>Tugas 3</h2>
            <p>Program perusahaan</p>
            <a href="perusahaan.php">Lihat Program</a>
        </div>

        <div class="card">
            <h2>Tugas 4</h2>
            <p>Menghitung total gaji</p>
            <a href="totalgaji.php">Lihat Program</a>
        </div>
    </div>

    <h2 class="section-title">TUGAS PAK RAHMAT</h2>
    <div class="container">
        <div class="card">
            <h2>Tugas 1</h2>
            <p>Program Pemesanan Tiket Bioskop</p>
            <a href="bioskop.php">Lihat Program</a>
        </div>

        <div class="card">
            <h2>Tugas 2</h2>
            <p>Program Pemesanan Makanan di Restoran</p>
            <a href="makanan.php">Lihat Program</a>
        </div>

        <div class="card">
            <h2>Tugas 3</h2>
            <p>Program Parkir Kendaraan</p>
            <a href="parkir.php">Lihat Program</a>
        </div>

        <div class="card">
            <h2>Tugas 4</h2>
            <p>Program Pemesanan Tiket Transportasi</p>
            <a href="transportasi.php">Lihat Program</a>
        </div>
    </div>
</body>
</html>
