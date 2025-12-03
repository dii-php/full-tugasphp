<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelunasan Utang Ibu Siti</title>
    
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
            display: block;
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            color: #fff;
            background: #2a5298;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }
        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 18px;
                max-width: 100%;
            }
            .kop h2 {
                font-size: 1.3rem;
            }
        }
</style>
</head>

<body>
<?php
    $utang = 5000000;
    $cicilan = 300000;
    $bulan = 0;
    $sisaUtangPerBulan = [];

    while ($utang > 0) {
        $bulan++;
        if ($utang > $cicilan) {
            $utang -= $cicilan;
        } else {
            $utang = 0;
        }
        $sisaUtangPerBulan[] = $utang;
    }
?>
<div class="container">

    <div class="kop">
        <h2>Pelunasan Utang Ibu Siti</h2>
        <p>Simulasi Pembayaran Cicilan</p>
        <p>==============================</p>
        <p><b>Laporan Pelunasan Utang</b></p>
    </div>

    <div class="result">
        <?php
        for ($x = 1; $x <= $bulan; $x++) {
            echo "<p>Bulan ke-$x: Sisa utang Rp " . number_format($sisaUtangPerBulan[$x-1], 0, ',', '.') . "</p>";
        }

        echo "<hr>";

        echo "<p class='highlight'>✅ Pelunasan penuh tercapai dalam $bulan bulan!</p>";
        echo "<p><b>Total utang awal: Rp " . number_format(5000000, 0, ',', '.') . "</b></p>";
        echo "<p><b>Cicilan per bulan: Rp " . number_format(300000, 0, ',', '.') . "</b></p>";
        ?>
    </div>

    <a href="../index.php" class="back-btn">← Kembali</a>

</div>
</body>
</html>
