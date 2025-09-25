<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Makanan Restoran</title>
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
            width: 420px; /* default desktop */
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
        footer {
            text-align: center;
            padding: 15px;
            background: rgba(0, 0, 0, 0.4);
            font-size: 0.85rem;
            margin-top: auto;
        }

        /* ✅ Responsif */
        @media (max-width: 600px) {
            header h1 {
                font-size: 1.5rem;
            }
            .container {
                padding: 20px 10px;
            }
            .card {
                width: 90%;       /* lebih besar di mobile */
                max-width: 500px; /* biar gak terlalu lebar */
                padding: 20px;
                box-sizing: border-box;
            }
            input, select, button {
                font-size: 0.95rem;
                padding: 10px;
            }
            .back {
                font-size: 0.9rem;
                margin-top: 15px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Pemesanan Makanan Restoran</h1>
        <p>XI RPL B - Moh. Novrialdi Pratama</p>
    </header>

    <div class="container">
        <div>
            <div class="card">
                <h2>Form Pemesanan</h2>
                <form method="post" action="notamakan.php">
                    <label for="nama">Nama Pelanggan</label>
                    <input type="text" name="nama" id="nama" required>

                    <label for="menu">Menu Makanan</label>
                    <select name="menu" id="menu" required>
                        <option value="Nasi Goreng">Nasi Goreng</option>
                        <option value="Mie Ayam">Mie Ayam</option>
                        <option value="Soto">Soto</option>
                        <option value="Bakso">Bakso</option>
                    </select>

                    <label for="jumlah">Jumlah Porsi</label>
                    <input type="number" name="jumlah" id="jumlah" min="1" required>

                    <button type="submit" href="notamakan.php">Pesan Makanan</button>
                </form>

                <a href="../index.php" class="back">← Kembali ke Daftar Tugas</a>
            </div>
        </div>
    </div>
</body>
</html>
