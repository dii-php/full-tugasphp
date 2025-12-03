<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pola Bintang Segitiga Siku-Siku Terbalik</title>
    
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
        .warning {
            color: #d9534f;
            font-weight: bold;
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
    $pola = "";
    for ($i = 5; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            $pola .= "*";
        }
        $pola .= "\n";
    }
?>
<div class="container">

    <div class="kop">
        <h2>Pola Bintang Segitiga Siku-Siku Terbalik</h2>
        <p>Visualisasi Pola Bintang Menggunakan Nested For Loop</p>
        <p>==============================</p>
        <p><b>Pola Bintang Tinggi 5 Baris</b></p>
    </div>

    <div class="result">
        <?php
        // Tampilkan pola bintang menggunakan <pre> untuk mempertahankan format
        echo "<p class='highlight'>Pola Bintang:</p>";
        echo "<pre>$pola</pre>";
        
        // Penjelasan singkat
        echo "<p>Pola ini dibuat menggunakan perulangan for bersarang:</p>";
        echo "<ul>";
        echo "<li>Perulangan luar (i) mengontrol jumlah baris, dimulai dari 5 ke 1.</li>";
        echo "<li>Perulangan dalam (j) mencetak bintang (*) sebanyak nilai i pada baris tersebut.</li>";
        echo "</ul>";
        ?>
    </div>

    <a href="../index.php" class="back-btn">← Kembali</a>

</div>
</body>
</html>