<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Tabungan Bulanan</title>
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
        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
        }
        .info {
            font-size: 0.9rem;
            color: #555;
            font-style: italic;
            min-height: 20px;
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
        .result {
            margin-top: 20px;
            padding: 15px;
            background: #f3f3f3;
            border-radius: 8px;
            font-size: 1.05rem;
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
        .support {
            margin-top: 30px;
            background: rgba(255,255,255,0.1);
            padding: 15px;
            border-radius: 8px;
            font-size: 0.9rem;
            line-height: 1.6;
        }
        footer {
            text-align: center;
            padding: 15px;
            background: rgba(0, 0, 0, 0.4);
            font-size: 0.85rem;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <header>
        <h1>Program Hitung Tabungan</h1>
        <p>XI RPL B - Moh. Novrialdi Pratama</p>
    </header>

    <div class="container">
        <div>
            <div class="card">
                <h2>Input Data Tabungan</h2>
                <form method="post">
                    <label for="awal">Tabungan Awal (Rp)</label>
                    <input type="number" name="awal" id="awal" required>
                    <div class="info" id="infoBunga">Bunga: Rp 0</div>

                    <button type="submit">Hitung</button>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $awal = $_POST["awal"];

                    $bunga_persen = 1.5;
                    $jumlah_bunga = $awal * ($bunga_persen / 100);

                    $admin = 0.5;
                    $jumlah_admin = $awal * ($admin / 100);

                    $hasil = $awal + $jumlah_bunga - $jumlah_admin;

                    echo "<div class='result'>";
                    echo "<strong>Hasil Perhitungan:</strong><br>";
                    echo "Tabungan Awal: Rp " . number_format($awal) . "<br>";
                    echo "Bunga: $bunga_persen% → Rp " . number_format($jumlah_bunga) . "<br>";
                    echo "Biaya Administrasi (0.5%) : Rp " . number_format($jumlah_admin) . "<br><hr>";
                    echo "Total Tabungan Akhir Bulan: <b>Rp " . number_format($hasil) . "</b>";
                    echo "</div>";
                }  
                ?>

                <a href="index.php" class="back">← Kembali ke Daftar Tugas</a>

                <p class="note">Dibuat dengan beberapa bantuan dari Chat GPT, YouTube, Copilot AI, Windsurf</p>
            </div><hr>
            <div class="support">
                <p><strong>Fungsi Bantuan:</strong></p>
                <p><b>YouTube</b> : Memahami algoritma dan struktur PHP</p>
                <p><b>ChatGPT</b> : Membuat JavaScript untuk update Real Time nominal Bunga</p>
                <p><b>Copilot AI</b> : Auto Correction apabila terjadi typo</p>
                <p><b>Windsurf</b> : Referensi tema, dan UI (Style.css)</p>
            </div>
        </div>
    </div>

    <footer>
        
    </footer>

    <script>
        const inputAwal = document.getElementById("awal");
        const infoBunga = document.getElementById("infoBunga");

        inputAwal.addEventListener("input", function() {
            let nilai = parseFloat(this.value) || 0;
            let persenBunga = 1.5;
            let jumlahBunga = nilai * (persenBunga / 100);

            infoBunga.textContent = "Bunga: Rp " + jumlahBunga.toLocaleString("id-ID");
        });
    </script>
</body>
</html>
