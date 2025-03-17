<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .file-upload {
            display: flex;
            align-items: center;
        }
        .file-upload input[type="file"] {
            flex: 1;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn {
            width: 100%;
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background: #218838;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>THÊM SINH VIÊN</h2>
        <form action="index.php?controller=sinhvien&action=create" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="MaSV">Mã SV:</label>
                <input type="text" id="MaSV" name="MaSV" required>
            </div>

            <div class="form-group">
                <label for="HoTen">Họ Tên:</label>
                <input type="text" id="HoTen" name="HoTen" required>
            </div>

            <div class="form-group">
                <label for="GioiTinh">Giới Tính:</label>
                <select id="GioiTinh" name="GioiTinh" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="NgaySinh">Ngày Sinh:</label>
                <input type="date" id="NgaySinh" name="NgaySinh" required>
            </div>

            <div class="form-group file-upload">
                <label for="Hinh">Hình:</label>
                <input type="file" id="Hinh" name="Hinh" accept="image/*">
            </div>

            <div class="form-group">
                <label for="MaNganh">Mã Ngành:</label>
                <input type="text" id="MaNganh" name="MaNganh" required>
            </div>

            <button type="submit" class="btn">Create</button>
        </form>
        <a href="index.php?controller=sinhvien&action=index" class="back-link">⬅ Back to List</a>
    </div>
</body>
</html>
