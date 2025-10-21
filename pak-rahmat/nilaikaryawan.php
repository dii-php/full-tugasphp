<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Kinerja Karyawan</title>
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
        <h1>Penilaian Kinerja Karyawan</h1>
    </header>

    <div class="container">
        <div class="result">
            <h2>Hasil Penilaian</h2>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nilai</th>
                    <th>Predikat</th>
                </tr>
                <?php
                // Array nilai karyawan
                $nilai_karyawan = [60, 85, 70, 90, 50];
                $no = 1;

                // Perulangan untuk menampilkan nilai dan kategori
                foreach ($nilai_karyawan as $nilai) {
                    if ($nilai >= 85) {
                        $kategori = "A (Sangat Baik)";
                    } else if ($nilai >= 70) {
                        $kategori = "B (Baik)";
                    } else if ($nilai >= 60) {
                        $kategori = "C (Cukup)";
                    } else {
                        $kategori = "D (Kurang)";
                    }

                    echo "<tr>
                            <td>$no</td>
                            <td>$nilai</td>
                            <td>$kategori</td>
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
