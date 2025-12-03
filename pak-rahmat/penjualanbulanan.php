    <?php
    $target = 1000000;
    $total = 0;
    $hariBreak = null;

    // Array contoh omzet 30 hari (boleh diubah)
    $omzet = [
        200000, 350000, 450000, 700000, 900000,
        1200000, 500000, 400000, 300000, 200000,
        150000, 160000, 200000, 250000, 300000,
        400000, 600000, 200000, 450000, 800000,
        950000, 970000, 990000, 1100000, 200000,
        300000, 400000, 500000, 600000, 900000
    ];

    for ($i = 1; $i <= 30; $i++) {

        $hariIni = $omzet[$i - 1];
        $total += $hariIni;

        if ($hariIni >= $target) {
            $hariBreak = $i;
            break;
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Analisis Omzet Bulanan</title>
        
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
    <div class="container">

        <div class="kop">
            <h2>Analisis Omzet Bulanan</h2>
            <p>Manajer Toko</p>
            <p>==============================</p>
            <p><b>Laporan Analisis Omzet</b></p>
        </div>

        <div class="result">
            <?php
            for ($x = 1; $x <= ($hariBreak ? $hariBreak : 30); $x++) {
                echo "<p>Hari ke-$x: Rp " . number_format($omzet[$x-1], 0, ',', '.') . "</p>";
            }

            echo "<hr>";

            if ($hariBreak) {
                echo "<p class='highlight'>🎯 Target Rp 1.000.000 tercapai pada hari ke-$hariBreak!</p>";
            } else {
                echo "<p class='highlight'>❌ Target tidak tercapai dalam 30 hari.</p>";
            }

            echo "<p><b>Total omzet: Rp " . number_format($total, 0, ',', '.') . "</b></p>";
            ?>
        </div>

        <p class="thanks">Terima kasih 😊</p>

        <a href="../index.php" class="back-btn">← Kembali</a>

    </div>
    </body>
    </html>