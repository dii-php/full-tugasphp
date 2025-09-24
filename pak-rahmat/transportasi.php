<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Transportasi</title>
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
        h2 {
            text-align: center;
            color: #2a5298;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #2a5298;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #2a5298;
            border: none;
            color: white;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
        }
        .back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2a5298;
            font-weight: bold;
        }
        button:hover {
            background: #1e3c72;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pemesanan Tiket Transportasi</h2>
        <form action="notatrans.php" method="post">
            <label for="nama">Nama Penumpang:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="jenis">Jenis Transportasi:</label>
            <select id="jenis" name="jenis" required>
                <option value="Kereta">Kereta</option>
                <option value="Pesawat">Pesawat</option>
                <option value="Kapal">Kapal</option>
                <option value="Bus">Bus</option>
            </select>

            <label for="jumlah">Jumlah Tiket:</label>
            <input type="number" id="jumlah" name="jumlah" min="1" required>

            <button type="submit">Pesan Tiket</button>
            <a href="index.php" class="back">← Kembali ke Daftar Tugas</a>
        </form>
    </div>
</body>
</html>
