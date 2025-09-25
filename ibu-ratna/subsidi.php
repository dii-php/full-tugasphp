<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Menghitung Subsidi Pendidikan</title>
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
            align-items: flex-start;
            padding: 40px 20px;
            flex: 1;
            flex-direction: column;
        }
        form, .result {
            background: #fff;
            color: #333;
            padding: 25px;
            border-radius: 12px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
            margin: 0 auto 20px auto;
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
        @media (max-width: 600px) {
            header {
            padding: 20px 10px;
        }
        header h1 {
            font-size: 1.5rem;
        }
        header p {
            font-size: 0.9rem;
        }
        .container {
            padding: 20px 10px;
        }
        form, .result {
            padding: 18px;
            max-width: 100%;
            margin: 0 auto 15px auto;
        }
        h2 {
            font-size: 1.2rem;
        }
        label {
            font-size: 0.9rem;
        }
        input, button, .back {
            font-size: 0.9rem;
            padding: 10px;
        }
        button {
            font-size: 1rem;
        }
    }

    </style>
</head>
<body>
    <header>
        <h1>Program Menghitung Subsidi Pendidikan</h1>
        <p>Oleh: Moh.Novrialdi Pratama</p>
    </header>

    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $penghasilan = (int) str_replace(".", "", $_POST['penghasilan_hidden']);
            $listrik = (int) str_replace(".", "", $_POST['listrik_hidden']);
            $jumlah_anak = (int) $_POST['jumlah_anak'];

            $subsidi_peranak = 50000;
            $bantuan_sosial = 0;

            // Cek apakah keluarga kurang mampu
            $kurang_mampu = ($penghasilan < 1000000 && $listrik < 100000);

            if ($kurang_mampu) {
                $subsidi_peranak = 60000;
                $bantuan_sosial = 100000;
            }

            $total_subsidi = ($jumlah_anak * $subsidi_peranak) + $bantuan_sosial;
            ?>

            <div class="result">
                <h2>Hasil Perhitungan</h2>
                <p><strong>Penghasilan:</strong> Rp <?= number_format($penghasilan, 0, ',', '.') ?></p>
                <p><strong>Konsumsi Listrik:</strong> Rp <?= number_format($listrik, 0, ',', '.') ?></p>
                <p><strong>Jumlah Anak (6-17 tahun):</strong> <?= $jumlah_anak ?></p>

                <hr>
                <p><strong>Status Keluarga:</strong> <?= $kurang_mampu ? "Kurang Mampu" : "Mampu" ?></p>
                <p><strong>Subsidi per Anak:</strong> Rp <?= number_format($subsidi_peranak, 0, ',', '.') ?></p>
                <?php if ($bantuan_sosial > 0): ?>
                    <p><strong>Bantuan Sosial Tambahan:</strong> Rp <?= number_format($bantuan_sosial, 0, ',', '.') ?></p>
                <?php endif; ?>
                <hr>
                <p><strong>Total Subsidi Diterima:</strong> Rp <?= number_format($total_subsidi, 0, ',', '.') ?></p>

                <a href="subsidi.php" class="back">← Hitung Lagi</a>
                <a href="../index.php" class="back">← Kembali ke Daftar Tugas</a>
            </div>

        <?php } else { ?>
            <form action="subsidi.php" method="post">
                <h2>Input Data Keluarga</h2>

                <label for="penghasilan">Penghasilan per Bulan:</label>
                <input type="text" id="penghasilan" required>
                <input type="hidden" name="penghasilan_hidden" id="penghasilan_hidden">

                <label for="listrik">Pengeluaran Listrik per Bulan:</label>
                <input type="text" id="listrik" required>
                <input type="hidden" name="listrik_hidden" id="listrik_hidden">

                <label for="jumlah_anak">Jumlah Anak Usia 6-17 Tahun:</label>
                <input type="number" name="jumlah_anak" id="jumlah_anak" min="0" required>

                <button type="submit">Hitung Subsidi</button>
                <a href="../index.php" class="back">← Kembali ke Daftar Tugas</a>
            </form>

            <script>
                function formatRupiah(input, hiddenInput) {
                    input.addEventListener("input", function() {
                        let value = this.value.replace(/\D/g, "");
                        if (value) {
                            this.value = new Intl.NumberFormat('id-ID').format(value);
                            hiddenInput.value = value;
                        } else {
                            this.value = "";
                            hiddenInput.value = "";
                        }
                    });
                }

                formatRupiah(document.getElementById("penghasilan"), document.getElementById("penghasilan_hidden"));
                formatRupiah(document.getElementById("listrik"), document.getElementById("listrik_hidden"));
            </script>
        <?php } ?>
    </div>
</body>
</html>
