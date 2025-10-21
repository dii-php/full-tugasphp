<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Nilai Siswa</title>
<style>
    @media (max-width: 768px) {
        header h1 { font-size: 1.6rem; }
        form, .result, .table-container { padding: 15px; border-radius: 8px; }
        input, button { padding: 10px; font-size: 0.95rem; }
        label { font-size: 0.9rem; }
        .back { display: block; margin: 8px 0; text-align: center; }
    }
    @media (max-width: 480px) {
        body { font-size: 14px; }
        header { padding: 25px 15px; }
        header h1 { font-size: 1.4rem; }
        form, .result, .table-container { padding: 12px; border-radius: 6px; }
        input, button { font-size: 0.9rem; }
        table { font-size: 0.8rem; }
        th, td { padding: 8px; }
    }
    .table-container { overflow-x: auto; }
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        margin: 0; padding: 0; color: #fff;
    }
    header { text-align: center; padding: 40px 20px; background: rgba(0,0,0,0.3); }
    header h1 { margin: 0; font-size: 2.2rem; }
    .container {
        display: flex; justify-content: center; align-items: center;
        padding: 40px 20px; flex-direction: column;
    }
    form, .result, .table-container {
        background: #fff; color: #333; padding: 25px; border-radius: 12px;
        width: 100%; max-width: 700px; box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
        margin-bottom: 20px; box-sizing: border-box;
    }
    h2 { margin-top: 0; color: #2a5298; text-align: center; }
    label { display: block; margin: 10px 0 5px; font-weight: bold; }
    input {
        width: 100%; padding: 10px; border-radius: 6px;
        border: 1px solid #aaa; box-sizing: border-box;
    }
    button {
        margin-top: 15px; width: 100%; padding: 12px; border: none; border-radius: 6px;
        background: #2a5298; color: #fff; font-weight: bold; cursor: pointer; transition: 0.3s;
    }
    button:hover { background: #0051e9ff; }
    .back {
        margin-top: 10px; display: inline-block; padding: 10px 15px; border-radius: 6px;
        color: #2a5298; font-weight: bold; text-decoration: none; transition: 0.3s;
    }
    table {
        width: 100%; border-collapse: collapse; margin-top: 15px;
    }
    th, td {
        border: 1px solid #aaa; padding: 10px; text-align: center;
    }
    th { background: #2a5298; color: #fff; }
    tr:nth-child(even) { background: #f9f9f9; }
</style>
</head>
<body>
<header>
    <h1>Form Nilai Siswa</h1>
    <p>Oleh: Moh. Novrialdi Pratama</p>
</header>
<div class="container">

<?php

$koneksi = new mysqli("tch", "gabole wlee", "apa", "db_nilai");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

function getPredikat($nilai) {
    if ($nilai >= 90) return "A";
    elseif ($nilai >= 80) return "B";
    elseif ($nilai >= 70) return "C";
    elseif ($nilai >= 60) return "D";
    else return "E";
}

$pesanError = "";
$pesanSukses = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama']);
    $nama = preg_replace('/\s+/', ' ', $nama);
    $namaLower = strtolower($nama);
    $bindo = (int)$_POST['bindo'];
    $bing = (int)$_POST['bing'];
    $mtk = (int)$_POST['mtk'];
    $kejuruan = (int)$_POST['kejuruan'];


    if ($bindo < 0 || $bing < 0 || $mtk < 0 || $kejuruan < 0) {
        $pesanError = "❌ Nilai tidak boleh negatif!";
    } elseif ($bindo > 99 || $bing > 99 || $mtk > 99 || $kejuruan > 99) {
        $pesanError = "❌ Nilai tidak boleh lebih dari 99!";
    } else {
        // Cek duplikat nama (case-insensitive)
        $cek = $koneksi->prepare("SELECT * FROM nilai_siswa WHERE LOWER(TRIM(nama)) = ?");
        $cek->bind_param("s", $namaLower);
        $cek->execute();
        $hasil = $cek->get_result();

        if ($hasil->num_rows > 0) {
            $pesanError = "❌ Nama <b>$nama</b> sudah ada dalam database.";
        } else {

            $rata = round(($bindo + $bing + $mtk + $kejuruan) / 4, 2);
            $predikat = getPredikat($rata);

            $stmt = $koneksi->prepare("INSERT INTO nilai_siswa (nama, bindo, bing, mtk, kejuruan, rata_rata, predikat)
                                       VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("siiiids", $nama, $bindo, $bing, $mtk, $kejuruan, $rata, $predikat);
            if ($stmt->execute()) {
                $pesanSukses = "✅ Data nilai untuk <b>$nama</b> berhasil disimpan.";
            } else {
                $pesanError = "❌ Terjadi kesalahan saat menyimpan data.";
            }
        }
    }
}

// --- Pesan tampil di atas form ---
if (!empty($pesanError)) {
    echo "<div style='background:#ffe5e5; border:1px solid red; color:red; padding:10px; margin-bottom:10px;'>$pesanError</div>";
}
if (!empty($pesanSukses)) {
    echo "<div style='background:#e6ffed; border:1px solid green; color:green; padding:10px; margin-bottom:10px;'>$pesanSukses</div>";
}
?>

<!-- FORM INPUT -->
<form action="nilai.php" method="post" novalidate>
    <h2>Input Nilai Siswa</h2>
    <label for="nama">Nama Siswa:</label>
    <input type="text" name="nama" id="nama" required
           pattern="[A-Za-z\s\.]+" oninput="this.value=this.value.replace(/[^A-Za-z\s\.]/g,'')">

    <label for="bindo">Nilai Bahasa Indonesia:</label>
    <input type="number" name="bindo" id="bindo" min="0" max="99" required
           oninput="if(this.value>99)this.value=99;">

    <label for="bing">Nilai Bahasa Inggris:</label>
    <input type="number" name="bing" id="bing" min="0" max="99" required
           oninput="if(this.value>99)this.value=99;">

    <label for="mtk">Nilai Matematika:</label>
    <input type="number" name="mtk" id="mtk" min="0" max="99" required
           oninput="if(this.value>99)this.value=99;">

    <label for="kejuruan">Nilai Kejuruan:</label>
    <input type="number" name="kejuruan" id="kejuruan" min="0" max="99" required
           oninput="if(this.value>99)this.value=99;">

    <button type="submit">Simpan Nilai</button>
    <a href="../index.php" class="back">← Kembali ke list tugas</a>
</form>

<!-- TABEL DATA -->
<div class="table-container">
    <h2>Daftar Nilai Siswa</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>B.Indonesia</th>
            <th>B.Inggris</th>
            <th>Matematika</th>
            <th>Kejuruan</th>
            <th>Rata-rata</th>
            <th>Predikat</th>
        </tr>
        <?php
        $result = $koneksi->query("SELECT * FROM nilai_siswa ORDER BY id ASC");
        if ($result->num_rows > 0) {
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>$no</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['bindo']}</td>
                        <td>{$row['bing']}</td>
                        <td>{$row['mtk']}</td>
                        <td>{$row['kejuruan']}</td>
                        <td>{$row['rata_rata']}</td>
                        <td>{$row['predikat']}</td>
                      </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='8'>Belum ada data nilai</td></tr>";
        }
        ?>
    </table>
    <br>
</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const tableContainer = document.querySelector(".table-container");
    tableContainer.addEventListener("wheel", function (e) {
        if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
            e.preventDefault();
            tableContainer.scrollLeft += e.deltaY;
        }
    });
});
</script>
</body>
</html>
