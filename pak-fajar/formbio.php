<?php
// formbio.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Biodata Aldi</title>
    <style>
    /* Responsive layout */
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
    .container { display: flex; justify-content: center; align-items: center; padding: 40px 20px; flex-direction: column; }
    form, .result, .table-container {
        background: #fff; color: #333; padding: 25px; border-radius: 12px;
        width: 100%; max-width: 700px; box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
        margin-bottom: 20px; box-sizing: border-box;
    }
    h2 { margin-top: 0; color: #2a5298; text-align: center; }
    label { display: block; margin: 10px 0 5px; font-weight: bold; }
    input { width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #aaa; box-sizing: border-box; }
    button {
        margin-top: 15px; width: 100%; padding: 12px; border: none; border-radius: 6px;
        background: #2a5298; color: #fff; font-weight: bold; cursor: pointer; transition: 0.3s;
    }
    button:hover { background: #0051e9ff; }
    .back {
        margin-top: 10px; display: inline-block; padding: 10px 15px; border-radius: 6px;
        color: #2a5298; font-weight: bold; text-decoration: none; transition: 0.3s;
    }
    table { width: 100%; border-collapse: collapse; margin-top: 15px; }
    th, td { border: 1px solid #aaa; padding: 10px; text-align: center; }
    th { background: #2a5298; color: #fff; }
    tr:nth-child(even) { background: #f9f9f9; }
    </style>
</head>
<body>
    <header>
        <h1>Form Biodata</h1>
        <p>Oleh: Moh.Novrialdi Pratama</p>
    </header>

    <div class="container">
        <?php
        // Koneksi ke database
        $koneksi = new mysqli("sql102.infinityfree.com", "if0_39908296", "pantoloan87", "if0_39908296_bio");
        if ($koneksi->connect_error) { die("Koneksi gagal: " . $koneksi->connect_error); }

        // Simpan data
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['proses'])) {
            $jumlah = $_POST['jumlah'];
            $error = "";

            $nisnList = [];
            for ($i = 1; $i <= $jumlah; $i++) {
                $nisn = $koneksi->real_escape_string($_POST["nisn_$i"]);
                $nisnList[] = $nisn;
            }

            // Cek duplikat
            if (count($nisnList) !== count(array_unique($nisnList))) {
                $error = "❌ Terdapat NISN yang sama pada input!";
            } else {
                $inClause = "'" . implode("','", $nisnList) . "'";
                $cek = $koneksi->query("SELECT nisn FROM biodata WHERE nisn IN ($inClause)");
                if ($cek->num_rows > 0) { $error = "❌ Salah satu NISN sudah terdaftar di database!"; }
            }

            if (!empty($error)) {
                echo '<div class="result" style="background:#ffe5e5; border:1px solid red; color:red;">
                        <h2>'.$error.'</h2>
                        <a href="formbio.php" class="back">← Kembali Isi Data</a>
                      </div>';
            } else {
                for ($i = 1; $i <= $jumlah; $i++) {
                    $nisn = $koneksi->real_escape_string($_POST["nisn_$i"]);
                    $namaLengkap = $koneksi->real_escape_string($_POST["nama_lengkap_$i"]);
                    $namaPanggilan = $koneksi->real_escape_string($_POST["nama_panggilan_$i"]);
                    $email = $koneksi->real_escape_string($_POST["email_$i"]);
                    $umur = (int) $_POST["umur_$i"];

                    $sql = "INSERT INTO biodata (nisn, nama_lengkap, nama_panggilan, email, umur) 
                            VALUES ('$nisn', '$namaLengkap', '$namaPanggilan', '$email', '$umur')";
                    $koneksi->query($sql);
                }
                echo '<div class="result"><h2>✅ Data berhasil disimpan!</h2>
                      <a href="formbio.php" class="back">← Tambah Biodata Baru</a><br>
                      <a href="index.php" class="back">← Kembali ke Daftar Tugas</a></div>';
            }

        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lanjut'])) {
            $jumlah = $_POST['jumlah'];
            ?>
            <form action="formbio.php" method="post">
                <h2>Isi Biodata</h2>
                <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
                <?php for ($i = 1; $i <= $jumlah; $i++): ?>
                    <fieldset style="margin-bottom:15px; border:1px solid #aaa; border-radius:8px; padding:15px;">
                        <legend><strong><?= ($jumlah==1) ? "Biodata" : "Orang $i" ?></strong></legend>

                        <label for="nisn_<?= $i ?>">NISN:</label>
                        <input type="text" name="nisn_<?= $i ?>" id="nisn_<?= $i ?>" 
                               required inputmode="numeric" pattern="[0-9]+"
                               oninput="this.value=this.value.replace(/[^0-9]/g,'')">

                        <label for="nama_lengkap_<?= $i ?>">Nama Lengkap:</label>
                        <input type="text" name="nama_lengkap_<?= $i ?>" id="nama_lengkap_<?= $i ?>" 
                               required pattern="[A-Za-z\s\.]+"
                               oninput="this.value=this.value.replace(/[^A-Za-z\s\.]/g,'')">

                        <label for="nama_panggilan_<?= $i ?>">Nama Panggilan:</label>
                        <input type="text" name="nama_panggilan_<?= $i ?>" id="nama_panggilan_<?= $i ?>" 
                               required pattern="[A-Za-z\s\.]+"
                               oninput="this.value=this.value.replace(/[^A-Za-z\s\.]/g,'')">

                        <label for="email_<?= $i ?>">Email:</label>
                        <input type="email" name="email_<?= $i ?>" id="email_<?= $i ?>" required>

                        <label for="umur_<?= $i ?>">Umur:</label>
                        <input type="number" name="umur_<?= $i ?>" id="umur_<?= $i ?>" min="1" required
                               oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                    </fieldset>
                <?php endfor; ?>
                <button type="submit" name="proses">Simpan Biodata</button>
                <a href="formbio.php" class="back">← Ubah Jumlah</a><br>
                <a href="../index.php" class="back">← Kembali ke Daftar Tugas</a>
            </form>
        <?php } else { ?>
            <form action="formbio.php" method="post">
                <h2>Jumlah Orang</h2>
                <label for="jumlah">Masukkan jumlah orang:</label>
                <input type="number" name="jumlah" id="jumlah" min="1" required>
                <button type="submit" name="lanjut">Lanjut</button>
                <a href="../index.php" class="back">← Kembali ke Daftar Tugas</a>
            </form>
        <?php } ?>

        <!-- Tabel Data -->
        <div class="table-container">
            <h2>Daftar Biodata</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Panggilan</th>
                    <th>Email</th>
                    <th>Umur</th>
                </tr>
                <?php
                $result = $koneksi->query("SELECT * FROM biodata ORDER BY id ASC");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nisn']}</td>
                                <td>{$row['nama_lengkap']}</td>
                                <td>{$row['nama_panggilan']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['umur']} tahun</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Belum ada data biodata</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Script agar scroll mouse horizontal di tabel -->
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
