<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Parkir Kendaraan</title>
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
        form {
            background: #fff;
            color: #333;
            padding: 25px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
        }
        form h2 {
            margin-top: 0;
            color: #2a5298;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #aaa;
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
            margin-top: 20px;
            display: inline-block;
            padding: 12px 20px;
            border-radius: 6px;
            background: #f3f3f3;
            color: #2a5298;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
        }
    </style>
</head>
<body>
    <header>
        <h1>Program Parkir Kendaraan</h1>
    </header>

    <div class="container">
        <form action="karcis.php" method="post">
            <h2>Input Data Parkir</h2>
            
            <label for="plat">Plat Nomor:</label>
            <input type="text" name="plat" id="plat" required>

            <label for="jenis">Jenis Kendaraan:</label>
            <select name="jenis" id="jenis" required>
                <option value="Motor">Motor</option>
                <option value="Mobil">Mobil</option>
                <option value="Bus">Bus</option>
            </select>

            <label for="jam">Lama Parkir (jam):</label>
            <input type="number" name="jam" id="jam" min="1" required>

            <button type="submit">Cetak Karcis</button>
            <a href="index.php" class="back">← Kembali ke Daftar Tugas</a>
        </form>
    </div>
</body>
</html>
