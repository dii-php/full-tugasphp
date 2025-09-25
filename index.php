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
            flex-direction: row;
            justify-content: center;
            flex-wrap: wrap;
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

        /* ✅ Tambahan agar responsif */
        @media (max-width: 768px) {
            header h1 {
                font-size: 1.8rem;
            }
            header p {
                font-size: 1rem;
            }
            h2.section-title {
                font-size: 1.5rem;
            }
            .container {
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }
            .card {
                width: 100%;
                max-width: 350px;
            }
        }

        @media (max-width: 480px) {
            header {
                padding: 25px 10px;
            }
            header h1 {
                font-size: 1.5rem;
            }
            h2.section-title {
                font-size: 1.2rem;
            }
            .card {
                padding: 15px;
                width: 100%;
                max-width: 300px;
            }
            .card h2 {
                font-size: 1.1rem;
            }
            .card p {
                font-size: 0.85rem;
            }
            .card a {
                font-size: 0.9rem;
                padding: 8px 12px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Daftar Tugas XI RPL B</h1>
        <p>Oleh: Moh. Novrialdi Pratama</p>
    </header>

    <!-- Bagian Tugas Ibu Ratna -->
    <h2 class="section-title">TUGAS IBU RATNA</h2>
    <div class="container">
        <div class="card">
            <h2>Tugas 1</h2>
            <p>Program web untuk menghitung besar tabungan tiap bulan</p>
            <a href="ibu-ratna/tabungan.php">Lihat Program</a>
        </div>

        <div class="card">
            <h2>Tugas 2</h2>
            <p>Program rental mobil</p>
            <a href="ibu-ratna/rental.php">Lihat Program</a>
        </div>

        <div class="card">
            <h2>Tugas 3</h2>
            <p>Program perusahaan</p>
            <a href="ibu-ratna/perusahaan.php">Lihat Program</a>
        </div>

        <div class="card">
            <h2>Tugas 4</h2>
            <p>Menghitung total gaji</p>
            <a href="ibu-ratna/totalgaji.php">Lihat Program</a>
        </div>

        <div class="card">
            <h2>Tugas 5</h2>
            <p>Diskon toko pakaian</p>
            <a href="ibu-ratna/tokopakaian.php">Lihat Program</a>
        </div>
    </div>

    <!-- Bagian Tugas Pak Rahmat -->
    <h2 class="section-title">TUGAS PAK RAHMAT</h2>
    <div class="container">
        <div class="card">
            <h2>Tugas 1</h2>
            <p>Program Pemesanan Tiket Bioskop</p>
            <a href="pak-rahmat/bioskop.php">Lihat Program</a>
        </div>

        <div class="card">
            <h2>Tugas 2</h2>
            <p>Program Pemesanan Makanan di Restoran</p>
            <a href="pak-rahmat/makanan.php">Lihat Program</a>
        </div>

        <div class="card">
            <h2>Tugas 3</h2>
            <p>Program Parkir Kendaraan</p>
            <a href="pak-rahmat/parkir.php">Lihat Program</a>
        </div>

        <div class="card">
            <h2>Tugas 4</h2>
            <p>Program Pemesanan Tiket Transportasi</p>
            <a href="pak-rahmat/transportasi.php">Lihat Program</a>
        </div>
    </div>

    <!-- Bagian Tugas Pak Fajar -->
    <h2 class="section-title">TUGAS PAK FAJAR</h2>
    <div class="container">
        <div class="card">
            <h2>Tugas 1</h2>
            <p>Form Biodata</p>
            <a href="pak-fajar/formbio.php">Lihat Program</a>
        </div>
    </div>
</body>
</html>
