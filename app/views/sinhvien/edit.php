<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiệu Chỉnh Thông Tin Sinh Viên</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container {
            max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd;
            border-radius: 10px; background: #f9f9f9; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 { text-align: center; color: #333; }
        label { font-weight: bold; }
        input[type="text"], input[type="date"], select {
            width: 100%; padding: 8px; margin: 8px 0; border: 1px solid #ddd; border-radius: 5px;
        }
        .file-upload { display: flex; align-items: center; }
        .file-upload input[type="file"] { flex: 1; }
        .form-group { margin-bottom: 15px; }
        .btn {
            width: 100%; background: #28a745; color: white; padding: 10px; border: none;
            border-radius: 5px; cursor: pointer;
        }
        .btn:hover { background: #218838; }
        .back-link { display: block; text-align: center; margin-top: 10px; color: blue; }
        img { width: 150px; height: auto; border-radius: 10px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>HIỆU CHỈNH THÔNG TIN SINH VIÊN</h2>
        <form action="index.php?controller=sinhvien&action=edit&MaSV=<?= $sinhvienInfo['MaSV'] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="MaSV">Mã SV:</label>
                <input type="text" id="MaSV" name="MaSV" value="<?= $sinhvienInfo['MaSV'] ?>" readonly>
            </div>

            <div class="form-group">
                <label for="HoTen">Họ Tên:</label>
                <input type="text" id="HoTen" name="HoTen" value="<?= $sinhvienInfo['HoTen'] ?>" required>
            </div>

            <div class="form-group">
                <label for="GioiTinh">Giới Tính:</label>
                <select id="GioiTinh" name="GioiTinh" required>
                    <option value="Nam" <?= $sinhvienInfo['GioiTinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                    <option value="Nữ" <?= $sinhvienInfo['GioiTinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="NgaySinh">Ngày Sinh:</label>
                <input type="date" id="NgaySinh" name="NgaySinh" value="<?= $sinhvienInfo['NgaySinh'] ?>" required>
            </div>

            <div class="form-group">
    <label>Hình Hiện Tại:</label><br>
    <img src="<?= $sinhvienInfo['Hinh'] ?>" 
     onerror="this.onerror=null; this.src='/web_dangkyhocphan/public/Content/images/default.jpg';">

<div class="form-group file-upload">
    <label for="Hinh">Chọn Ảnh Mới:</label>
    <input type="file" id="Hinh" name="Hinh" accept="image/*">
</div>

<!-- Trường ẩn giữ đường dẫn ảnh cũ -->
<input type="hidden" name="HinhCu" value="<?= $sinhvienInfo['Hinh'] ?>">


            <div class="form-group">
                <label for="MaNganh">Mã Ngành:</label>
                <input type="text" id="MaNganh" name="MaNganh" value="<?= $sinhvienInfo['MaNganh'] ?>" required>
            </div>

            <button type="submit" class="btn">Save</button>
        </form>
        <a href="index.php?controller=sinhvien&action=index" class="back-link">⬅ Back to List</a>
    </div>
</body>
</html>
