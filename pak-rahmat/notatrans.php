<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Tiket Transportasi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            margin: 0;
            padding: 0;
            color: #fff;
        }
        .container {
            max-width: 500px;
            margin: 40px auto;
            background: #fff;
            color: #333;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
        }
        .kop {
            text-align: center;
            border-bottom: 2px dashed #2a5298;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .kop h2 {
            margin: 0;
            color: #2a5298;
            font-size: 1.6rem;
        }
        .kop p {
            margin: 3px 0;
            font-size: 0.9rem;
        }
        .result {
            font-size: 1rem;
            line-height: 1.6;
        }
        .highlight {
            font-weight: bold;
            color: #2a5298;
        }
        .thanks {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
            color: #555;
        }
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 16px;
            color: #2a5298;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        /* ✅ Tambahan supaya responsive */
        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 18px;
                max-width: 100%;
            }
            .kop h2 {
                font-size: 1.3rem;
            }
            .kop p {
                font-size: 0.8rem;
            }
            .result {
                font-size: 0.9rem;
            }
            .back-btn {
                display: block;
                text-align: center;
                margin: 20px auto 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Kop Nota -->
        <div class="kop">
            <h2>Travel Aldi</h2>
            <p>Alamat: Huntap Duyu, 94225</p>
            <p>Telp/HP: 0852-4036-7954</p>
            <p>==============================</p>
            <p><b>TIKET PERJALANAN RESMI</b></p>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST["nama"];
            $jenis = $_POST["jenis"];
            $jumlah = intval($_POST["jumlah"]);
            $harga = 0;
            $persen = 0;

            // Harga berdasarkan jenis transportasi
            switch($jenis) {
                case "Kereta":
                    $harga = 80000;
                    break;
                case "Pesawat":
                    $harga = 1250000;
                    break;
                case "Kapal":
                    $harga = 300000;
                    break;
                case "Bus":
                    $harga = 75000;
                    break;
            }

            $total = $harga * $jumlah;
            $diskon = 0;

            // Diskon bila beli ≥ 3 tiket
            if ($jumlah >= 3) {
                $diskon = 0.15 * $total;
                $persen = 15;
            }

            $bayar = $total - $diskon;

            echo "<div class='result'>";
            echo "<p><span class='highlight'>Nama Penumpang:</span> $nama</p>";
            echo "<p><span class='highlight'>Jenis Transportasi:</span> $jenis</p>";
            echo "<p><span class='highlight'>Harga Tiket:</span> Rp " . number_format($harga, 0, ',', '.') . "</p>";
            echo "<p><span class='highlight'>Jumlah Tiket:</span> $jumlah</p>";
            echo "<p><span class='highlight'>Total Harga:</span> Rp " . number_format($total, 0, ',', '.') . "</p>";
            echo "<p><span class='highlight'>Diskon:</span> Rp " . number_format($diskon, 0, ',', '.') . " ($persen%)</p>";
            echo "<hr>";
            echo "<p><b>Total Bayar: Rp " . number_format($bayar, 0, ',', '.') . "</b></p>";
            echo "</div>";

            echo "<p class='thanks'>Selamat menikmati perjalanan ✈️🚆🛳️🚌</p>";
        } else {
            echo "<p class='result'>Data pemesanan tidak ditemukan.</p>";
        }
        ?>

        <a href="transportasi.php" class="back-btn">← Kembali</a>
    </div>
</body>
</html>
