<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Pendaftaran Ulang SMK</title>
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
        a {
            margin-top: 10px;
            display: inline-block;
            padding: 10px 15px;
            border-radius: 6px;
            color: #2a5298;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
        }
        a:hover {
            background: rgba(42, 82, 152, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px 10px;
            text-align: left;
        }
        th {
            background: #2a5298;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <h1>Program Pendaftaran Ulang SMK</h1>
        <p>Oleh: Moh. Novrialdi Pratama</p>
    </header>

    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['proses'])) {
            $nama = htmlspecialchars($_POST['nama']);
            $nomor = htmlspecialchars($_POST['nomor']);
            $kelas = htmlspecialchars($_POST['kelas']);

            $uanggedung = 0;
            $spp = 0;
            $seragam = 0;

            switch ($kelas) {
                case "10":
                    $uanggedung = 800000;
                    $spp = 90000;
                    $seragam = 125000;
                    break;
                case "11":
                    $uanggedung = 500000;
                    $spp = 75000;
                    $seragam = 100000;
                    break;
                case "12":
                    $uanggedung = 500000;
                    $spp = 75000;
                    $seragam = 100000;
                    break;
                default:
                    $uanggedung = 0;
                    $spp = 0;
                    $seragam = 0;
                    break;
            }

            $total = $uanggedung + $spp + $seragam;
            ?>

            <div class="result">
                <h2>Hasil Pendaftaran</h2>
                <table>
                    <tr><th>Data</th><th>Keterangan</th></tr>
                    <tr><td>Nama</td><td><?= $nama ?></td></tr>
                    <tr><td>Nomor Induk</td><td><?= $nomor ?></td></tr>
                    <tr><td>Kelas</td><td><?= $kelas ?></td></tr>
                    <tr><td>Uang Gedung</td><td>Rp <?= number_format($uanggedung, 0, ',', '.') ?></td></tr>
                    <tr><td>SPP</td><td>Rp <?= number_format($spp, 0, ',', '.') ?></td></tr>
                    <tr><td>Seragam</td><td>Rp <?= number_format($seragam, 0, ',', '.') ?></td></tr>
                    <tr><th>Total Bayar</th><th>Rp <?= number_format($total, 0, ',', '.') ?></th></tr>
                </table>

                <a href="smk.php">← Daftar Ulang Lagi</a><br>
                <a href="../index.php">← Kembali ke Daftar Tugas</a>
            </div>

        <?php } else { ?>
            <form action="smk.php" method="post">
                <h2>Form Pendaftaran Ulang</h2>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required pattern="[A-Za-z\s]+" title="Nama hanya boleh berisi huruf dan spasi">

                <label for="nomor">Nomor Induk:</label>
                <input type="number" id="nomor" name="nomor" required>

                <label for="kelas">Kelas:</label>
                <select id="kelas" name="kelas" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>

                <button type="submit" name="proses">Lihat Total Pembayaran</button><br>
                <a href="../index.php">← Kembali ke Daftar Tugas</a>
            </form>
        <?php } ?>
    </div>
</body>
</html>
