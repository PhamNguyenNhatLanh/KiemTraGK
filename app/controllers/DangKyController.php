<?php
require_once __DIR__ . '/../models/DangKy.php';
require_once __DIR__ . '/../models/ChiTietDangKy.php';
require_once __DIR__ . '/../models/SinhVien.php';

class DangKyController {
    public function index() {
        $dangky = new DangKy();
        $list = $dangky->getAll();
        require_once __DIR__ . '/../views/dangky/index.php';
    }

    public function detail() {
        if (isset($_GET['MaDK'])) {
            $dangky = new DangKy();
            $sinhvien = new SinhVien();
            $chiTietDangKy = new ChiTietDangKy();

            $MaDK = $_GET['MaDK'];
            $dangkyInfo = $dangky->getById($MaDK);
            $sinhvienInfo = $sinhvien->getById($dangkyInfo['MaSV']);
            $hocphans = $chiTietDangKy->getByMaDK($MaDK);

            require_once __DIR__ . '/../views/dangky/detail.php';
        }
    }
    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dangky = new DangKy();
            $dangky->NgayDK = date("Y-m-d");
            $dangky->MaSV = $_POST["MaSV"];
            $MaDK = $dangky->create();
    
            // Lưu học phần vào bảng ChiTietDangKy
            $chiTietDangKy = new ChiTietDangKy();
            foreach ($_POST["MaHP"] as $MaHP) {
                $chiTietDangKy->MaDK = $MaDK;
                $chiTietDangKy->MaHP = $MaHP;
                $chiTietDangKy->create();
            }
    
            header("Location: index.php?controller=dangky&action=index");
        }
        require_once __DIR__ . '/../views/dangky/create.php';
    }
    public function delete() {
        if (isset($_GET["MaDK"])) {
            $MaDK = $_GET["MaDK"];
            $dangky = new DangKy();
            $dangky->delete($MaDK);
            header("Location: index.php?controller=dangky&action=index");
        }
    }
    
}
?>
