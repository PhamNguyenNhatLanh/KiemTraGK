<?php
require_once __DIR__ . '/../models/SinhVien.php';
session_start();

class AuthController {
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $MaSV = $_POST["MaSV"];
            $sinhvien = new SinhVien();
            $sinhvienInfo = $sinhvien->getById($MaSV);

            if ($sinhvienInfo) {
                $_SESSION['MaSV'] = $sinhvienInfo['MaSV'];
                $_SESSION['HoTen'] = $sinhvienInfo['HoTen'];
                header("Location: index.php");
                exit();
            } else {
                $error = "Mã sinh viên không tồn tại!";
            }
        }
        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
    }
}
?>
