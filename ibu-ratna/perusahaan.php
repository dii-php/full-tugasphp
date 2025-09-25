<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Gaji Mingguan - XI RPL B</title>
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
            padding: 30px 20px;
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
        .desc {
            font-size: 0.95rem;
            color: #444;
            background: #f3f6ff;
            padding: 12px;
            border-left: 4px solid #110ecaff;
            border-radius: 6px;
            margin-bottom: 15px;
        }
        .result {
            margin-top: 15px;
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
        hr {
            border: none;
            border-top: 2px solid rgba(0, 0, 0, 0.2);
            margin: 20px auto;
            width: 100%;
        }

        /* Tambahan agar responsive */
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
        <h1>Program Hitung Gaji Mingguan</h1>
        <p>XI RPL B - Moh. Novrialdi Pratama</p>
    </header>

    <div class="container">
        <div class="card">
            <h2>Rincian Gaji Pekerja</h2>

            <div class="desc">
                Program ini menghitung gaji mingguan seorang pekerja kontraktor. 
                Gaji pokok dihitung berdasarkan 5 hari kerja, setiap hari kerjanya 7 jam dengan bayaran Rp50.000. 
                Habis itu ada lembur juga 2 hari, masing-masing lembur ada yang 2 jam dan 3 jam, dibayar Rp20.000 per jam. 
                Total gaji nya dari gaji pokok terus ditambah dengan gaji lembur.
            </div>

            <?php
                $gaji_per7jam = 50000;
                $hari_kerja = 5;
                $lembur1 = 2;
                $lembur2 = 3;
                $bayar_lembur = 20000;
                $gaji_pokok = $hari_kerja * $gaji_per7jam;
                $total_jam_lembur = $lembur1 + $lembur2;
                $gaji_lembur = $total_jam_lembur * $bayar_lembur;
                $total_gaji = $gaji_pokok + $gaji_lembur;

                echo "<div class='result'>";
                echo "<strong>Detail Perhitungan:</strong><br>";
                echo "Hari Kerja: $hari_kerja hari × Rp" . number_format($gaji_per7jam) . " = Rp " . number_format($gaji_pokok) . "<br>";
                echo "Lembur: $total_jam_lembur jam × Rp" . number_format($bayar_lembur) . " = Rp " . number_format($gaji_lembur) . "<br><hr>";
                echo "Total Gaji Mingguan: <b>Rp " . number_format($total_gaji) . "</b><br><hr>";
                echo "Total Gaji Bulanan: <b>Rp " . number_format($total_gaji * 4) . "</b>";
                echo "</div>";
            ?>
            <a href="../index.php" class="back">← Kembali ke Daftar Tugas</a>
        </div>
    </div>
</body>
</html>
