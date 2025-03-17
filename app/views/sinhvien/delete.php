<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa Thông Tin Sinh Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            text-align: center;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        img {
            width: 150px;
            height: auto;
            border-radius: 10px;
            margin-top: 10px;
        }
        .buttons {
            margin-top: 20px;
        }
        .buttons button, .buttons a {
            padding: 10px 15px;
            margin: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        .delete-btn {
            background-color: red;
            color: white;
        }
        .delete-btn:hover {
            background-color: darkred;
        }
        .cancel-btn {
            background-color: gray;
            color: white;
            text-decoration: none;
            display: inline-block;
        }
        .cancel-btn:hover {
            background-color: darkgray;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>XÓA THÔNG TIN</h2>
        <p>Are you sure you want to delete this?</p>

        <p><strong>Họ Tên:</strong> <?= $sinhvienInfo['HoTen'] ?></p>
        <p><strong>Giới Tính:</strong> <?= $sinhvienInfo['GioiTinh'] ?></p>
        <p><strong>Ngày Sinh:</strong> <?= date("d/m/Y", strtotime($sinhvienInfo['NgaySinh'])) ?></p>
        <p><strong>Mã Ngành:</strong> <?= $sinhvienInfo['MaNganh'] ?></p>

        <img src="<?= '/web_dangkyhocphan/public' . $sinhvienInfo['Hinh'] ?>" 
             onerror="this.onerror=null; this.src='/web_dangkyhocphan/public/Content/images/default.jpg';">

        <div class="buttons">
            <form method="POST" action="index.php?controller=sinhvien&action=delete&MaSV=<?= $sinhvienInfo['MaSV'] ?>">
                <input type="hidden" name="confirm_delete" value="1">
                <button type="submit" class="delete-btn">❌ Delete</button>
            </form>
            <a href="index.php?controller=sinhvien&action=index" class="cancel-btn">🔙 Back to List</a>
        </div>
    </div>
</body>
</html>
