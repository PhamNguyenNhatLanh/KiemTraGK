<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Học Phần</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn-register {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-register:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>DANH SÁCH HỌC PHẦN</h2>
        <table>
            <tr>
                <th>Mã Học Phần</th>
                <th>Tên Học Phần</th>
                <th>Số Tín Chỉ</th>
                <th>Đăng Ký</th>
            </tr>
            <?php foreach ($list as $hocphan) { ?>
            <tr>
                <td><?= $hocphan['MaHP'] ?></td>
                <td><?= $hocphan['TenHP'] ?></td>
                <td><?= $hocphan['SoTinChi'] ?></td>
                <td>
                    <a class="btn-register" href="index.php?controller=dangky&action=register&MaHP=<?= $hocphan['MaHP'] ?>">Đăng Kí</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
