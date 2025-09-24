<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Menghitung Diskon & Voucher</title>
</head>
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
            max-width: 500px;
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
        select, input {
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
            background: #0051e9ff;
        }
        .back {
            margin-top: 10px;
            display: inline-block;
            padding: 10px 15px;
            border-radius: 6px;
            color: #2a5298;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
        }
        .note {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #d9534f;
            font-style: italic;
        }
    </style>
<body>
    <header>
        <h1>Program Menghitung Diskon & Voucher</h1>
    </header>

    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['proses'])) {
            $jumlah = $_POST['jumlah'];
            $totalPembelian = 0;
            $detailPembelian = [];

            for ($i = 1; $i <= $jumlah; $i++) {
                $size = $_POST["size_$i"];
                $hargaSatuan = 0;

                switch ($size) {
                    case "S":
                        $hargaSatuan = 100000;
                        break;
                    case "M":
                        $hargaSatuan = 150000;
                        break;
                    case "L":
                        $hargaSatuan = 200000;
                        break;
                    case "XL":
                        $hargaSatuan = 250000;
                        break;
                    case "XXL":
                        $hargaSatuan = 300000;
                        break;
                }

                $totalPembelian += $hargaSatuan;
                $detailPembelian[] = [
                    'no' => $i,
                    'size' => $size,
                    'harga' => $hargaSatuan
                ];
            }

            // Diskon & voucher
            $diskonPersen = 15;
            $voucher = 0;

            if ($totalPembelian > 300000) {
                $diskonPersen = 20;
                $voucher = 50000;
            }

            $diskon = $diskonPersen / 100 * $totalPembelian;
            $totalBayar = $totalPembelian - $diskon;
            ?>

            <div class="result">
                <h2>Hasil Perhitungan</h2>
                <?php foreach ($detailPembelian as $item): ?>
                    <p><strong>Item <?= $item['no'] ?>:</strong> 
                        Ukuran <?= $item['size'] ?> - Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                    </p>
                <?php endforeach; ?>

                <p><strong>Total Pembelian:</strong> Rp <?= number_format($totalPembelian, 0, ',', '.') ?></p>
                <p><strong>Diskon:</strong> <?= $diskonPersen ?>% (Rp <?= number_format($diskon, 0, ',', '.') ?>)</p>
                <hr>
                <p><strong>Total Bayar:</strong> Rp <?= number_format($totalBayar, 0, ',', '.') ?></p>

                <?php if ($voucher > 0): ?>
                    <p><strong>Voucher:</strong> Rp <?= number_format($voucher, 0, ',', '.') ?></p>
                    <p class="note">VOUCHER dapat digunakan di pembelian berikutnya.</p>
                <?php endif; ?>

                <a href="tokopakaian.php" class="back">← Beli Lagi</a><br>
                <a href="index.php" class="back">← Kembali ke Daftar Tugas</a>
            </div>

        <?php } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lanjut'])) {
            $jumlah = $_POST['jumlah'];
            ?>
            <form action="tokopakaian.php" method="post">
                <h2>Pilih Ukuran Tiap Pakaian</h2>
                <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
                <?php for ($i = 1; $i <= $jumlah; $i++): ?>
                    <label for="size_<?= $i ?>">Pakaian <?= $i ?>:</label>
                    <select name="size_<?= $i ?>" id="size_<?= $i ?>" required>
                        <option value="">-- Pilih Ukuran --</option>
                        <option value="S">S (Rp 100.000)</option>
                        <option value="M">M (Rp 150.000)</option>
                        <option value="L">L (Rp 200.000)</option>
                        <option value="XL">XL (Rp 250.000)</option>
                        <option value="XXL">XXL (Rp 300.000)</option>
                    </select>
                <?php endfor; ?>
                <button type="submit" name="proses">Hitung Diskon</button>
                <a href="tokopakaian.php" class="back">← Ubah Jumlah</a><br>
                <a href="index.php" class="back">← Kembali ke Daftar Tugas</a>
            </form>
        <?php } else { ?>
            <form action="tokopakaian.php" method="post">
                <h2>Form Toko Pakaian</h2>
                <label for="jumlah">Ingin beli berapa pakaian?</label>
                <input type="number" name="jumlah" id="jumlah" min="1" required>
                <button type="submit" name="lanjut">Lanjut</button>
                <a href="index.php" class="back">← Kembali ke Daftar Tugas</a>
            </form>
        <?php } ?>
    </div>
</body>
</html>
