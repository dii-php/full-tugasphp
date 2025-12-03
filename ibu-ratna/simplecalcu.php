<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
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
        .back {
            margin-top: 10px;
            display: inline-block;
            padding: 10px 15px;
            border-radius: 6px;
            color: #2a5298;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
        }
        .note {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #d9534f;
            font-style: italic;
        }
    </style>
</head>
<body>
    <header>
        <h1>Calculator</h1>
        <p>Oleh: Moh.Novrialdi Pratama</p>
    </header>

    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = floatval($_POST['num1']);
            $num2 = floatval($_POST['num2']);
            $operation = $_POST['kalku'];
            $result = 0;

            switch ($operation) {
                case '+':
                    $result = $num1 + $num2;
                    break;
                case '-':
                    $result = $num1 - $num2;
                    break;
                case 'x':
                    $result = $num1 * $num2;
                    break;
                case '^':
                    $result = pow($num1, $num2);
                    break;
                case '÷':
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "Error: Division by zero.";
                    }
                    break;
                default:
                    $result = "Invalid operation.";
            }
            ?>
            <div class="result">
                <h2>Hasil Perhitungan</h2>
                <p><strong>Hasil dari <?= htmlspecialchars($num1) ?> <?= htmlspecialchars($operation) ?> <?= htmlspecialchars($num2) ?> = <?= htmlspecialchars($result) ?></strong></p>
                <a href="simplecalcu.php" class="back">← Hitung Lagi</a><br>
                <a href="../index.php" class="back">← Home</a>
            </div>
        <?php } else { ?>
            <form action="simplecalcu.php" method="post">
                <h2>Form Kalkulator</h2>
                <label for="num1">Masukkan angka pertama:</label>
                <input type="number" name="num1" id="num1" step="any" required placeholder="Masukkan angka pertama">
                
                <label for="num2">Masukkan angka kedua:</label>
                <input type="number" name="num2" id="num2" step="any" required placeholder="Masukkan angka kedua">
                
                <label for="kalku">Pilih operasi:</label>
                <select name="kalku" id="kalku" required>
                    <option value="+">Tambah (+)</option>
                    <option value="-">Kurang (-)</option>
                    <option value="x">Kali (x)</option>
                    <option value="÷">Bagi (÷)</option>
                    <option value="^">Pangkat (^)</option>
                </select>
                <button type="submit">Calculate</button>
                <a href="../index.php" class="back">← Back</a>
            </form>
        <?php } ?>
    </div>
</body>
</html>
