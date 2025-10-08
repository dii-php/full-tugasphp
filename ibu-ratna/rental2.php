<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Pendaftaran Ulang rental2</title>
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
        <h1>Program Rental Mobil</h1>
        <p>Oleh: Moh. Novrialdi Pratama</p>
    </header>

    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['proses'])) {
            $nama = htmlspecialchars($_POST['nama']);
            $nomor = htmlspecialchars($_POST['nomor']);
            $mobil = htmlspecialchars($_POST['mobil']);

            $bsewa = 0;
            $asuransi = 0;

            switch ($mobil) {
                case "Avanza":
                    $bsewa = 300000;
                    $asuransi = 15000;
                    break;
                case "Xenia":
                    $bsewa = 300000;
                    $asuransi = 15000;
                    break;
                case "Innova":
                    $bsewa = 500000;
                    $asuransi = 25000;
                    break;
                case "Alphard":
                    $bsewa = 750000;
                    $asuransi = 30000;
                    break;
                case "Fortuner":
                    $bsewa = 700000;
                    $asuransi = 25000;
                    break;
            }

            $total = $bsewa + $asuransi;
            ?>

            <div class="result">
                <h2>Hasil Pendaftaran</h2>
                <table>
                    <tr><th>Data</th><th>Keterangan</th></tr>
                    <tr><td>Nama</td><td><?= $nama ?></td></tr>
                    <tr><td>Nomor HP</td><td><?= $nomor ?></td></tr>
                    <tr><td>Jenis Mobil</td><td><?= $mobil ?></td></tr>
                    <tr><td>Biaya Sewa/hari</td><td>Rp <?= number_format($bsewa, 0, ',', '.') ?></td></tr>
                    <tr><td>Biaya Asuransi</td><td>Rp <?= number_format($asuransi, 0, ',', '.') ?></td></tr>
                </table>

                <a href="rental2.php">← Daftar Ulang Lagi</a><br>
                <a href="../index.php">← Kembali ke Daftar Tugas</a>
            </div>

        <?php } else { ?>
            <form action="rental2.php" method="post">
                <h2>Form Perentalan Mobil</h2>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required pattern="[A-Za-z\s]+" title="Nama hanya boleh berisi huruf dan spasi">

                <label for="nomor">Nomor Telepon:</label>
                <input type="number" id="nomor" name="nomor" required>

                <label for="mobil">Jenis Mobil:</label>
                <select id="mobil" name="mobil" required>
                    <option value="">-- Pilih Mobil --</option>
                    <option value="Avanza">Avanza</option>
                    <option value="Xenia">Xenia</option>
                    <option value="Innova">Innova</option>
                    <option value="Alphard">Alphard</option>
                    <option value="Fortuner">Fortuner</option>
                </select>

                <button type="submit" name="proses">Lihat Total Pembayaran</button><br>
                <a href="../index.php">← Kembali ke Daftar Tugas</a>
            </form>
        <?php } ?>
    </div>
</body>
</html>
