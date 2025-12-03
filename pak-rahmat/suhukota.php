<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Suhu Kota</title>
    
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
    $kotaList = [
        'Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Semarang', 'Makassar', 'Palembang', 
        'Depok', 'Tangerang', 'Bekasi', 'Malang', 'Yogyakarta', 'Denpasar', 'Pontianak', 
        'Banjarmasin', 'Jawa Barat', 'Jawa Timur', 'Jawa Tengah', 'Sumatera Utara', 'Sulawesi Selatan', 'Sulawesi Tengah'
    ];

    $suhuKota = [];
    foreach ($kotaList as $kota) {
        $suhuKota[$kota] = rand(20, 40); // Random suhu antara 20-40°C
    }

    // Inisialisasi variabel untuk perhitungan rata-rata
    $totalSuhu = 0;
    $counter = 0;
    $peringatan = [];

    // Foreach loop untuk memproses setiap kota
    foreach ($suhuKota as $kota => $suhu) {
        if ($suhu < 25) {
            continue; // Lewati kota dengan suhu di bawah 25°C
        }
        $totalSuhu += $suhu;
        $counter++;
        if ($suhu > 35) {
            $peringatan[] = "Peringatan: Suhu di $kota melebihi 35°C (" . $suhu . "°C)!";
        }
    }

    // Hitung rata-rata jika ada data valid
    $rataRata = ($counter > 0) ? $totalSuhu / $counter : 0;
?>
<div class="container">

    <div class="kop">
        <h2>Laporan Suhu Kota</h2>
        <p>Laporan Suhu Mingguan</p>
        <p>==============================</p>
        <p><b>Data Suhu Kota di Indonesia</b></p>
    </div>

    <div class="result">
        <?php
        // Tampilkan data suhu semua kota (termasuk yang di-skip)
        echo "<p><b>Data Suhu Lengkap:</b></p>";
        foreach ($suhuKota as $kota => $suhu) {
            $status = ($suhu < 25) ? " (Dilewati: < 25°C)" : "";
            echo "<p>$kota: " . $suhu . "°C$status</p>";
        }

        echo "<hr>";

        // Tampilkan peringatan jika ada
        if (!empty($peringatan)) {
            echo "<p class='warning'>Peringatan Khusus:</p>";
            foreach ($peringatan as $warn) {
                echo "<p class='warning'>$warn</p>";
            }
            echo "<hr>";
        }

        // Tampilkan hasil perhitungan rata-rata
        if ($counter > 0) {
            echo "<p class='highlight'>✅ Rata-rata suhu keseluruhan: " . number_format($rataRata, 2) . "°C (dari $counter kota yang valid)</p>";
        } else {
            echo "<p class='warning'>Tidak ada data suhu yang valid (semua di bawah 25°C) untuk dihitung rata-rata.</p>";
        }
        ?>
    </div>

    <a href="../index.php" class="back-btn">← Kembali</a>

</div>
</body>
</html>
