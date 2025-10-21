<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Gaji Karyawan</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            margin: 0;
            padding: 0;
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            text-align: center;
            padding: 40px 20px;
            background: rgba(0, 0, 0, 0.3);
        }
        header h1 {
            margin: 0;
            font-size: 2.2rem;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 20px;
            flex: 1;
            flex-direction: column;
        }
        .result {
            background: #fff;
            color: #333;
            padding: 25px;
            border-radius: 12px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
            margin: 0 auto 20px auto;
            box-sizing: border-box;
        }
        h2 {
            margin-top: 0;
            color: #2a5298;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px 8px;
            text-align: center;
        }
        th {
            background-color: #2a5298;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f5f5f5;
        }
        .back {
            margin-top: 15px;
            display: inline-block;
            padding: 10px 15px;
            border-radius: 6px;
            background: #f3f3f3;
            color: #2a5298;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
            text-align: center;
        }
        .back:hover {
            background: #ddd;
        }
        @media (max-width: 480px) {
            header h1 {
                font-size: 1.6rem;
            }
            .container {
                padding: 20px 10px;
                align-items: center;
            }
            .result {
                padding: 15px;
                max-width: 100%;
            }
            th, td {
                font-size: 0.9rem;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Perhitungan Gaji Karyawan</h1>
    </header>

    <div class="container">
        <div class="result">
            <h2>Hasil Perhitungan Gaji</h2>
            <table>
                <tr>
                    <th>No</th>
                    <th>Jam Kerja</th>
                    <th>Jam Lembur</th>
                    <th>Total Gaji (Rp)</th>
                </tr>
                <?php
                // Data jam kerja 4 karyawan
                $jam_kerja = [40, 35, 50, 45];
                $upah_normal = 20000;
                $upah_lembur = 25000;
                $no = 1;

                // Perulangan untuk menghitung gaji setiap karyawan
                foreach ($jam_kerja as $jam) {
                    if ($jam > 40) {
                        $lembur = $jam - 40;
                        $jam_normal = 40;
                    } else {
                        $lembur = 0;
                        $jam_normal = $jam;
                    }

                    $gaji = ($jam_normal * $upah_normal) + ($lembur * $upah_lembur);

                    echo "<tr>
                            <td>$no</td>
                            <td>$jam</td>
                            <td>$lembur</td>
                            <td>Rp " . number_format($gaji, 0, ',', '.') . "</td>
                          </tr>";
                    $no++;
                }
                ?>
            </table>

            <a href="../index.php" class="back">← Kembali ke Daftar Tugas</a>
        </div>
    </div>
</body>
</html>
