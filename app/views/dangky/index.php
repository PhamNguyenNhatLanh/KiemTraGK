<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Đăng Ký</title>
</head>
<body>
    <h2>Danh sách Đăng Ký</h2>
    <table border="1">
        <tr>
            <th>Mã ĐK</th>
            <th>Ngày Đăng Ký</th>
            <th>Mã Sinh Viên</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($list as $dk) { ?>
        <tr>
            <td><?= $dk['MaDK'] ?></td>
            <td><?= $dk['NgayDK'] ?></td>
            <td><?= $dk['MaSV'] ?></td>
            <td>
                <a href="index.php?controller=dangky&action=detail&MaDK=<?= $dk['MaDK'] ?>">Xem chi tiết</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
