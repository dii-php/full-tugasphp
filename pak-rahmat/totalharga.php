<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PandaShop</title>
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
            max-width: 550px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
            margin: 0 auto 20px auto;
            box-sizing: border-box;
        }
        h2 {
            margin-top: 0;
            color: #2a5298;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 6px;
        }
        th {
            background: #2a5298;
            color: #fff;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        tr:nth-child(odd) {
            background: #ffffff;
        }
        input[type="number"] {
            width: 60px;
            padding: 5px;
            border-radius: 6px;
            border: 1px solid #aaa;
            text-align: center;
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
        a.back {
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
        a.back:hover {
            background: #ddd;
        }
        .center {
            text-align: center;
        }
        hr {
            border: none;
            border-top: 1px solid #ccc;
        }
        @media (max-width: 600px) {
            header {
                padding: 20px 10px;
            }
            header h1 {
                font-size: 1.6rem;
            }
            .container {
                padding: 20px 10px;
            }
            form, .result {
                padding: 18px;
                max-width: 100%;
            }
            h2 {
                font-size: 1.2rem;
            }
            th, td {
                font-size: 0.9rem;
            }
            button, a.back {
                font-size: 0.9rem;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<header>
    <h1>Program Total Harga dan Diskon</h1>
    <p>Oleh: Moh.Novrialdi Pratama</p>
</header>

<div class="container">

<?php
// Definisi Data Barang dan function
$daftar_stok = [
    "SUSU_KOTAK" => ["nama" => "Susu Kotak", "harga" => 7500],
    "ROTI_TAWAR" => ["nama" => "Roti Tawar", "harga" => 15000],
    "TELUR" => ["nama" => "Telur Ayam", "harga" => 2000],
    "MIE_INSTAN" => ["nama" => "Mie Instan", "harga" => 3500],
    "KOPI_SACHET" => ["nama" => "Kopi Sachet", "harga" => 10000],
    "AIR_MINERAL" => ["nama" => "Air Mineral", "harga" => 6000],
    "GULA" => ["nama" => "Gula Pasir (1kg)", "harga" => 18000],
    "SABUN" => ["nama" => "Sabun Mandi", "harga" => 5000],
    "SIKAT" => ["nama" => "Sikat Gigi", "harga" => 8000],
    "PASTA" => ["nama" => "Pasta Gigi", "harga" => 11000]
];

function format_rupiah($angka) {
    return "Rp " . number_format((int)$angka, 0, ',', '.');
}

// Proses Form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['qty'])) {
    $barang_dibeli = [];
    $total_belanja_awal = 0;

    foreach ($_POST['qty'] as $kode_item => $kuantitas) {
        $kuantitas = (int)$kuantitas;
        if ($kuantitas > 0 && isset($daftar_stok[$kode_item])) {
            $item_data = $daftar_stok[$kode_item];
            $subtotal = $item_data['harga'] * $kuantitas;
            $total_belanja_awal += $subtotal;
            $barang_dibeli[] = [
                "nama" => $item_data['nama'],
                "harga_satuan" => $item_data['harga'],
                "qty" => $kuantitas,
                "subtotal" => $subtotal
            ];
        }
    }

    if (empty($barang_dibeli)) {
        echo '<div class="result"><p class="center">❌ Anda belum memilih barang. <br><br><a href="' . $_SERVER['PHP_SELF'] . '" class="back">Kembali ke Halaman Belanja</a></p></div>';
        exit;
    }

    $diskon_persentase = 0;
    if ($total_belanja_awal >= 30000) {
        $diskon_persentase = 0.10;
    } 

    $jumlah_diskon = $total_belanja_awal * $diskon_persentase;
    $total_bayar_akhir = $total_belanja_awal - $jumlah_diskon;
    ?>

    <div class="result">
        <h2>Struk Belanja</h2>
        <p class="center">Tanggal: <?= date("d-m-Y H:i:s") ?></p>
        <hr>

        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barang_dibeli as $item): ?>
                    <tr>
                        <td><?= $item['nama'] ?></td>
                        <td class="center"><?= $item['qty'] ?></td>
                        <td align="right"><?= format_rupiah($item['harga_satuan']) ?></td>
                        <td align="right"><?= format_rupiah($item['subtotal']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <hr>
        <p><strong>Total Belanja Awal:</strong> <?= format_rupiah($total_belanja_awal) ?></p>
        <p><strong>Diskon (<?= $diskon_persentase * 100 ?>%):</strong> -<?= format_rupiah($jumlah_diskon) ?></p>
        <hr>
        <p><strong>Total Bayar Akhir:</strong> <?= format_rupiah($total_bayar_akhir) ?></p>
        <hr>
        <p class="center">TERIMA KASIH ATAS KUNJUNGAN ANDA!</p>
        <div class="center">
            <a href="<?= $_SERVER['PHP_SELF'] ?>" class="back">← Belanja Lagi</a>
        </div>
    </div>

    <?php
    exit;
}
?>

<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <h2>Daftar Barang PandaShop</h2>
    <p class="center">Silakan pilih barang yang ingin Anda beli</p>
    <table>
        <thead>
            <tr>
                <th>Qty</th>
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($daftar_stok as $kode => $data): ?>
                <tr>
                    <td class="center">
                        <input type="number" name="qty[<?= $kode ?>]" value="0" min="0" required>
                    </td>
                    <td><?= $data['nama'] ?></td>
                    <td align="right"><?= format_rupiah($data['harga']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit" name="proses_bayar">Bayar Sekarang</button>
    <div class="center">
        <a href="../index.php" class="back">← Kembali ke Daftar Tugas</a>
    </div>
</form>

</div>
</body>
</html>
