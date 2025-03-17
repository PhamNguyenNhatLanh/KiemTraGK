<!DOCTYPE html>
<html>
<head>
    <title>Đăng Ký Học Phần</title>
</head>
<body>
    <h2>Đăng Ký Học Phần</h2>
    <form method="POST" action="">
        <label>Mã Sinh Viên:</label> <input type="text" name="MaSV" required><br>
        <label>Chọn Học Phần:</label><br>
        <?php foreach ($hocphans as $hp) { ?>
            <input type="checkbox" name="MaHP[]" value="<?= $hp['MaHP'] ?>"> <?= $hp['TenHP'] ?> (<?= $hp['SoTinChi'] ?> tín chỉ)<br>
        <?php } ?>
        <button type="submit">Đăng Ký</button>
    </form>
</body>
</html>
