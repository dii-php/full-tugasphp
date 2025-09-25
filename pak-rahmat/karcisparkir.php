<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karcis Parkir</title>
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
            position: relative;
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
        .back {
            position: absolute;
            bottom: 15px;
            left: 20px;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 6px;
            color: #2a5298;
            font-weight: bold;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        /* ✅ Tambahan CSS agar responsif di mobile */
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            .container {
                margin: 20px auto;
                padding: 15px;
                width: 100%;
                box-sizing: border-box;
            }
            .kop h2 {
                font-size: 1.2rem;
            }
            .kop p {
                font-size: 0.8rem;
            }
            .result {
                font-size: 0.9rem;
            }
            .back {
                position: static;
                display: inline-block;
                margin-top: 15px;
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Kop Struk -->
        <div class="kop">
            <h2>Rumah Aldi</h2>
            <p>Alamat: Huntap Duyu, 94225</p>
            <p>Telp/HP: 0852-4036-7954</p>
            <p>==============================</p>
            <p><b>KARCIS PARKIR RESMI</b></p>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $plat = $_POST["plat"];
            $jenis = $_POST["jenis"];
            $jam = (int)$_POST["jam"];

            switch ($jenis) {
                case "Motor":
                    $tarif = 2000;
                    break;
                case "Mobil":
                    $tarif = 5000;
                    break;
                case "Bus":
                    $tarif = 10000;
                    break;
                default:
                    $tarif = 0;
            }

            $total = $tarif * $jam;

            // Diskon bila lebih dari 10 jam
            $diskon = 0;
            if ($jam > 10) {
                $diskon = 0.1 * $total;
            }

            $bayar = $total - $diskon;

            echo "<div class='result'>";
            echo "<p><span class='highlight'>Plat Nomor:</span> $plat</p>";
            echo "<p><span class='highlight'>Jenis Kendaraan:</span> $jenis</p>";
            echo "<p><span class='highlight'>Lama Parkir:</span> $jam jam</p>";
            echo "<p><span class='highlight'>Tarif per Jam:</span> Rp " . number_format($tarif, 0, ',', '.') . "</p>";
            echo "<p><span class='highlight'>Total Bayar:</span> Rp " . number_format($total, 0, ',', '.') . "</p>";
            if ($diskon > 0) {
                echo "<p><span class='highlight'>Diskon:</span> Rp " . number_format($diskon, 0, ',', '.') . " (10%)</p>";
                echo "<hr>";
                echo "<p><b>Jumlah Dibayar: Rp " . number_format($bayar, 0, ',', '.') . "</b></p>";
            } else {
                echo "<hr>";
                echo "<p><b>Jumlah Dibayar: Rp " . number_format($bayar, 0, ',', '.') . "</b></p>";
            }
            echo "</div>";

            echo "<p class='thanks'>Terima kasih telah menggunakan layanan parkir kami 🚗🛵🚌.</p><br>";
        } else {
            echo "<p class='result'>Data parkir tidak ditemukan.</p><br>";
        }
        ?>
        <a href="parkir.php" class="back">← Kembali</a>
    </div>
</body>
</html>
