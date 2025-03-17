<!DOCTYPE html>
<html>
<head>
    <title>Giỏ Đăng Ký Học Phần</title>
</head>
<body>
    <h2>Giỏ Đăng Ký Học Phần</h2>
    <table border="1">
        <tr>
            <th>Mã HP</th>
            <th>Tên Học Phần</th>
            <th>Số Tín Chỉ</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($hocphans as $hp) { ?>
        <tr>
            <td><?= $hp['MaHP'] ?></td>
            <td><?= $hp['TenHP'] ?></td>
            <td><?= $hp['SoTinChi'] ?></td>
            <td>
                <a href="index.php?controller=dangky&action=removeFromCart&MaHP=<?= $hp['MaHP'] ?>">Xóa</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <a href="index.php?controller=dangky&action=checkout">Xác Nhận Đăng Ký</a>
</body>
</html>
