<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi Input PIN</title>
    
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
        .kop {
            text-align: center;
            border-bottom: 2px dashed #2a5298;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .kop h2 {
            margin: 0;
            color: #2a5298;
            font-size: 1.6rem;
        }
        .kop p {
            margin: 3px 0;
            font-size: 0.9rem;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #2a5298;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }
        .btn:hover {
            background: #1e3c72;
        }
        .error {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
        .success {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }
        .thanks {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
            color: #555;
        }
        .back-btn {
            display: block;
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            color: #fff;
            background: #2a5298;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }
        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 18px;
                max-width: 100%;
            }
            .kop h2 {
                font-size: 1.3rem;
            }
        }
</style>
<script>
    function validateInput(event) {
        const input = event.target;
        // Hanya izinkan angka
        input.value = input.value.replace(/[^0-9]/g, '');
    }
</script>
</head>

<body>
<?php
    $error = '';
    $success = '';
    $pin = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pin = $_POST['pin'] ?? '';
        if (strlen($pin) != 6) {
            $error = 'PIN harus tepat 6 digit!';
        } else {
            $success = 'PIN valid: ' . $pin;
        }
    }
?>
<div class="container">

    <div class="kop">
        <h2>Validasi Input PIN</h2>
        <p>Form Input PIN 6 Digit</p>
        <p>==============================</p>
        <p><b>Masukkan PIN Anda</b></p>
    </div>

    <form method="POST" action="">
        <div class="form-group">
            <label for="pin">PIN (6 digit):</label>
            <input type="text" id="pin" name="pin" maxlength="6" value="<?php echo htmlspecialchars($pin); ?>" oninput="validateInput(event)" required>
        </div>
        <button type="submit" class="btn">Validasi PIN</button>
    </form>

    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success"><?php echo $success; ?></div>
    <?php endif; ?>

    <a href="../index.php" class="back-btn">← Kembali</a>

</div>
</body>
</html>
