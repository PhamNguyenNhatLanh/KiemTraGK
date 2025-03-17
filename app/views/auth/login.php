<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        .container {
            max-width: 400px;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-link {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: blue;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>ĐĂNG NHẬP</h2>
        <?php if (isset($error)) { ?>
            <p style="color: red;"><?= $error ?></p>
        <?php } ?>
        <form method="POST" action="index.php?controller=auth&action=login">
            <label for="MaSV"><strong>MãSV</strong></label>
            <input type="text" name="MaSV" required placeholder="Nhập mã sinh viên">
            <button type="submit">Đăng Nhập</button>
        </form>
        <a class="back-link" href="index.php">🔙 Back to List</a>
    </div>
</body>
</html>
