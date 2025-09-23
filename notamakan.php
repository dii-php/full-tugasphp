<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian Makanan</title>
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
    </style>
</head>
<body>
    <div class="container">
        <!-- Kop Nota -->
        <div class="kop">
            <h2>Warung Aldi</h2>
            <p>Alamat: Huntap Duyu, 94225</p>
            <p>Telp/HP: 0852-4036-7954</p>
            <p>==============================</p>
            <p><b>NOTA PEMBELIAN MAKANAN</b></p>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST["nama"];
            $menu = $_POST["menu"];
            $jumlah = intval($_POST["jumlah"]);
            $harga = 0;

            // Harga berdasarkan menu
            switch($menu) {
                case "Nasi Goreng":
                    $harga = 18000;
                    break;
                case "Mie Ayam":
                    $harga = 15000;
                    break;
                case "Soto":
                    $harga = 20000;
                    break;
                case "Bakso":
                    $harga = 14000;
                    break;
            }

            $total = $harga * $jumlah;
            $diskon = 0;

            // Diskon berdasarkan jumlah porsi
            if ($jumlah >= 10) {
                $diskon = 0.25 * $total;
            } elseif ($jumlah >= 5) {
                $diskon = 0.15 * $total;
            }
            if ($jumlah >= 10) {
                $persen = 25;
            } elseif ($jumlah >= 5) {
                $persen = 15;
            }

            $bayar = $total - $diskon;

            echo "<div class='result'>";
            echo "<p><span class='highlight'>Nama Pelanggan:</span> $nama</p>";
            echo "<p><span class='highlight'>Menu:</span> $menu</p>";
            echo "<p><span class='highlight'>Harga Satuan:</span> Rp " . number_format($harga, 0, ',', '.') . "</p>";
            echo "<p><span class='highlight'>Jumlah Porsi:</span> $jumlah</p>";
            echo "<p><span class='highlight'>Total Harga:</span> Rp " . number_format($total, 0, ',', '.') . "</p>";
            echo "<p><span class='highlight'>Diskon:</span> Rp " . number_format($diskon, 0, ',', '.') . " ($persen%)</p>";
            echo "<hr>";
            echo "<p><b>Total Bayar: Rp " . number_format($bayar, 0, ',', '.') . "</b></p>";
            echo "</div>";

            echo "<p class='thanks'>Terima kasih telah makan di Warung Aldi 🍽️</p>";
        } else {
            echo "<p class='result'>Data pesanan tidak ditemukan.</p>";
        }
        ?>

        <a href="makanan.php" class="back-btn">← Kembali</a>
    </div>
</body>
</html>
