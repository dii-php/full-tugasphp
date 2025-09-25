<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil - XI RPL B</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #2a5298, #1e3c72);
            margin: 0;
            padding: 0;
            color: #fff;
        }
        hr {
            border: none;
            border-top: 2px solid rgba(255, 255, 255, 0.4);
            margin: 30px auto;
            width: 420px;
            max-width: 100%;
            box-sizing: border-box;
        }
        header {
            text-align: center;
            padding: 25px 20px;
            background: rgba(0, 0, 0, 0.3);
        }
        header h1 {
            margin: 0;
            font-size: 2rem;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
        }
        .card {
            background: #fff;
            color: #333;
            width: 420px;
            max-width: 100%;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
            box-sizing: border-box;
        }
        .card h2 {
            text-align: center;
            color: #2a5298;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
        }
        label {
            font-weight: bold;
        }
        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
        }
        button {
            background: #2a5298;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #1e3c72;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 8px;
            font-size: 1rem;
        }
        .back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2a5298;
            font-weight: bold;
        }
        .note {
            margin-top: 15px;
            font-size: 0.85rem;
            color: #7777778e;
            font-style: italic;
            text-align: center;
        }
        .support {
            margin-top: 20px;
            background: rgba(255,255,255,0.1);
            padding: 15px;
            border-radius: 8px;
            font-size: 0.9rem;
            line-height: 1.6;
            width: 420px;
            max-width: 100%;
            box-sizing: border-box;
        }

        /* Responsiveness */
        @media (max-width: 600px) {
            header h1 {
                font-size: 1.5rem;
            }
            .card, .support {
                width: 100%;
                padding: 20px;
            }
            body {
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Program Rental Mobil</h1>
        <p>XI RPL B - Moh. Novrialdi Pratama</p>
    </header>

    <div class="container">
        <div class="card">
            <h2>Sewa Toyota Avanza 2009</h2>
            <form method="post">
                <label for="hari">Jumlah Hari Sewa</label>
                <input type="number" name="hari" id="hari" min="1" required>
                <button type="submit">Hitung Biaya</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $hari = $_POST["hari"];
                $sewa_perhari = 300000;
                $sopir = 150000;
                $asuransi = 50000;
                $biaya_sewa = $sewa_perhari * $hari;
                $totalb_sopir = $sopir * $hari;
                $total = $biaya_sewa + $totalb_sopir + $asuransi;

                echo "<div class='result'>";
                echo "<strong>Rincian Biaya:</strong><br>";
                echo "Mobil: Toyota Avanza 2009<br>";
                echo "Lama Sewa: $hari hari<br><br>";
                echo "Biaya Sewa Mobil: Rp " . number_format($biaya_sewa) . "<br>";
                echo "Biaya Sopir ($hari hari): Rp " . number_format($totalb_sopir) . "<br>";
                echo "Asuransi: Rp " . number_format($asuransi) . "<br><hr>";
                echo "Total Biaya: <b>Rp " . number_format($total) . "</b>";
                echo "</div>";
            }
            ?>

            <a href="../index.php" class="back">← Kembali ke Daftar Tugas</a>
        </div>
    </div>
</body>
</html>
