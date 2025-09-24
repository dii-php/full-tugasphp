<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Menghitung Total Gaji</title>
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
            align-items: center;
            padding: 40px 20px;
            flex-direction: column;
        }
        form, .result {
            background: #fff;
            color: #333;
            padding: 25px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px; /* biar tidak melebar */
            box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        h2 {
            margin-top: 0;
            color: #2a5298;
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #aaa;
            box-sizing: border-box;
        }
        button {
            margin-top: 15px;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #2a5298;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #1e3c72;
        }
        .back {
            margin-top: 10px;
            display: inline-block;
            padding: 10px 15px;
            border-radius: 6px;
            background: #f3f3f3;
            color: #2a5298;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
        }
        .back:hover {
            background: #ddd;
        }

        /* Responsive untuk HP kecil */
        @media (max-width: 480px) {
            header h1 {
                font-size: 1.6rem;
            }
            form, .result {
                padding: 15px;
            }
            button, .back {
                font-size: 0.9rem;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Program Menghitung Total Gaji</h1>
    </header>

    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $omset = str_replace(".", "", $_POST['omset_hidden']);
            $gajiPokok = 5250000;
            $bonus = 0;

            if ($omset > 99999999) {
                $bonus = 0.01 * $omset;
            }

            $totalGaji = $gajiPokok + $bonus;
            ?>

        <div class="result">
            <h2>Hasil Perhitungan</h2>
            <p><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></p>
            <p><strong>Omset Penjualan:</strong> Rp <?= number_format($omset, 0, ',', '.') ?></p>
            <p><strong>Gaji Pokok:</strong> Rp <?= number_format($gajiPokok, 0, ',', '.') ?></p>

            <?php if ($bonus > 0): ?>
                <p><strong>Bonus:</strong> Rp <?= number_format($bonus, 0, ',', '.') ?> (<?= 1 ?>%)</p>
            <?php endif; ?>

            <hr>
            <p><strong>Total Gaji:</strong> Rp <?= number_format($totalGaji, 0, ',', '.') ?></p>
            <a href="totalgaji.php" class="back">← Hitung Lagi</a>
            <a href="index.php" class="back">← Kembali ke Daftar Tugas</a>
        </div>


            <?php
        } else {
        ?>
        <form action="totalgaji.php" method="post">
            <h2>Input Data Gaji</h2>
            
            <label for="nama">Nama Karyawan:</label>
            <input type="text" name="nama" id="nama" required>

            <label for="omset">Omset Penjualan:</label>
            <input type="text" id="omset" required>
            <input type="hidden" name="omset_hidden" id="omset_hidden">

            <button type="submit">Hitung Total Gaji</button>
            <a href="index.php" class="back">← Kembali ke Daftar Tugas</a>
        </form>

        <script>
            const omsetInput = document.getElementById("omset");
            const omsetHidden = document.getElementById("omset_hidden");

            omsetInput.addEventListener("input", function(e) {
                let value = this.value.replace(/\D/g, ""); 
                if (value) {
                    this.value = new Intl.NumberFormat('id-ID').format(value);
                    omsetHidden.value = value;
                } else {
                    this.value = "";
                    omsetHidden.value = "";
                }
            });
        </script>
        <?php } ?>
    </div>
</body>
</html>
