<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Bioskop</title>
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
            padding: 30px 20px;
            background: rgba(0, 0, 0, 0.3);
        }
        header h1 {
            margin: 0;
            font-size: 2rem;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 20px;
            flex: 1;
        }
        .card {
            background: #fff;
            color: #333;
            width: 420px;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
        }
        .card h2 {
            text-align: center;
            color: #2a5298;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
        }
        label {
            font-weight: bold;
        }
        input, select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
        }
        button {
            background: #2a5298;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #1e3c72;
        }
        .back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2a5298;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>Pemesanan Tiket Bioskop</h1>
        <p>XI RPL B - Moh. Novrialdi Pratama</p>
    </header>

    <div class="container">
        <div>
            <div class="card">
                <h2>Form Pemesanan Tiket</h2>
                <form method="post" action="notabioskop.php">
                    <label for="nama">Nama Pembeli</label>
                    <input type="text" name="nama" id="nama" required>

                    <label for="jenis">Jenis Film</label>
                    <select name="jenis" id="jenis" required>
                        <option value="2D">2D</option>
                        <option value="3D">3D</option>
                        <option value="IMAX">IMAX</option>
                    </select>

                    <label for="jumlah">Jumlah Tiket</label>
                    <input type="number" name="jumlah" id="jumlah" min="1" required>

                    <button type="submit">Pesan Tiket</button>
                </form>

                <a href="index.php" class="back">← Kembali ke Daftar Tugas</a>
            </div>
        </div>
    </div>
</body>
</html>
