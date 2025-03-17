<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Sinh Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .navbar {
            background-color: #333;
            padding: 15px;
            text-align: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 5px;
            display: inline-block;
        }
        .navbar a:hover {
            background-color: #575757;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        img {
            width: 100px;
            height: auto;
            border-radius: 10px;
        }
        .container {
            max-width: 900px;
            margin: auto;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        a {
            text-decoration: none;
            color: blue;
            margin-right: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
        .add-student {
            text-align: right;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="index.php">🏠 Trang Chủ</a>
        <a href="index.php?controller=sinhvien&action=index">👨‍🎓 Quản lý Sinh Viên</a>
        <a href="index.php?controller=hocphan&action=index">📚 Quản lý Học Phần</a>
        <a href="index.php?controller=dangky&action=index">📝 Đăng Ký Học Phần</a>
        <a href="index.php?controller=login&action=logout">🚪 Đăng Xuất</a>
    </div>

    <div class="container">
        <h2>TRANG SINH VIÊN</h2>
        <div class="add-student">
            <a href="index.php?controller=sinhvien&action=create">➕ Add Student</a>
        </div>
        <table>
            <tr>
                <th>Mã SV</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
                <th>Ngày Sinh</th>
                <th>Hình</th>
                <th>Mã Ngành</th>
                <th>Hành Động</th>
            </tr>
            <?php foreach ($list as $sv) { ?>
            <tr>
                <td><?= $sv['MaSV'] ?></td>
                <td><?= $sv['HoTen'] ?></td>
                <td><?= $sv['GioiTinh'] ?></td>
                <td><?= date("d/m/Y", strtotime($sv['NgaySinh'])) ?></td>
                <td>
                <img src="<?= '/web_dangkyhocphan/public' . $sv['Hinh'] ?>" alt="Ảnh Sinh Viên"
     onerror="this.onerror=null; this.src='/web_dangkyhocphan/public/Content/images/default.jpg';"
     style="width:100px; height:auto; border-radius:10px;">

                </td>
                <td><?= $sv['MaNganh'] ?></td>
                <td>
                    <a href="index.php?controller=sinhvien&action=edit&MaSV=<?= $sv['MaSV'] ?>">✏️ Edit</a>
                    <a href="index.php?controller=sinhvien&action=detail&MaSV=<?= $sv['MaSV'] ?>">📄 Details</a>
                    <a href="index.php?controller=sinhvien&action=delete&MaSV=<?= $sv['MaSV'] ?>" >❌ Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>
