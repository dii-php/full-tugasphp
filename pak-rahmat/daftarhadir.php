<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kehadiran Karyawan - XI RPL B</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 10px;
            text-align: center;
        }
        th {
            background-color: #2a5298;
            color: #fff;
        }
        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }
        tr:nth-child(odd) td {
            background-color: #eef3ff;
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
        hr {
            border: none;
            border-top: 2px solid rgba(0, 0, 0, 0.2);
            margin: 20px auto;
            width: 100%;
        }
        @media (max-width: 600px) {
            header h1 {
                font-size: 1.5rem;
            }
            .card {
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
        <h1>Daftar Kehadiran Karyawan</h1>
        <p>Oleh: Moh. Novrialdi Pratama</p>
    </header>

    <div class="container">
        <div class="card">
            <h2>Rekap Kehadiran Harian</h2>

            <?php
                $karyawan = ["Aldi", "Rahmat", "Sayyid", "Whilly", "Hanung"];

                echo "<table>";
                echo "<tr><th>No.</th><th>Nama Karyawan</th><th>Status Kehadiran</th></tr>";

                for ($i = 0; $i < count($karyawan); $i++) {
                    $no = $i + 1;

                    if ($no % 2 == 0) {
                        $status = "Hadir";
                    } else {
                        $status = "Izin";
                    }

                    echo "<tr>
                            <td>$no</td>
                            <td>{$karyawan[$i]}</td>
                            <td>$status</td>
                          </tr>";
                }

                echo "</table>";
            ?>

            <a href="../index.php" class="back">← Kembali ke Daftar Tugas</a> 
        </div>
    </div>
</body>
</html>
