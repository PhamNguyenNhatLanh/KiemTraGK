<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Chi Tiết</title>
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
        }
        img {
            width: 150px;
            height: auto;
            border-radius: 10px;
            margin-top: 10px;
        }
        .info {
            text-align: left;
            margin-top: 20px;
        }
        .info p {
            font-size: 16px;
            margin: 5px 0;
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
        .edit-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .edit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thông tin chi tiết</h2>
        <h3>SinhVien</h3>
        <div class="info">
            <p><strong>Họ Tên:</strong> <?= $sinhvienInfo['HoTen'] ?></p>
            <p><strong>Giới Tính:</strong> <?= $sinhvienInfo['GioiTinh'] ?></p>
            <p><strong>Ngày Sinh:</strong> <?= date("d/m/Y", strtotime($sinhvienInfo['NgaySinh'])) ?></p>
            <p><strong>Mã Ngành:</strong> <?= $sinhvienInfo['MaNganh'] ?></p>
            <p><strong>Hình:</strong></p>
            <img src="<?= '/web_dangkyhocphan/public' . $sinhvienInfo['Hinh'] ?>" 
                 onerror="this.onerror=null; this.src='/web_dangkyhocphan/public/Content/images/default.jpg';">
        </div>
        
        <!-- Nút sửa thông tin -->
        <a class="edit-btn" href="index.php?controller=sinhvien&action=edit&MaSV=<?= $sinhvienInfo['MaSV'] ?>">✏️ Chỉnh sửa</a>
        
        <!-- Nút quay lại danh sách -->
        <a class="back-link" href="index.php?controller=sinhvien&action=index">🔙 Back to List</a>
    </div>
</body>
</html>
