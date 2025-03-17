<?php
require_once __DIR__ . '/../models/HocPhan.php';

class HocPhanController {
    public function index() {
        $hocphan = new HocPhan();
        $list = $hocphan->getAll();
        require_once __DIR__ . '/../views/hocphan/index.php';
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $hocphan = new HocPhan();
            $hocphan->MaHP = $_POST["MaHP"];
            $hocphan->TenHP = $_POST["TenHP"];
            $hocphan->SoTinChi = $_POST["SoTinChi"];
            $hocphan->create();
            header("Location: index.php?controller=hocphan&action=index");
        }
        require_once __DIR__ . '/../views/hocphan/create.php';
    }

    public function delete() {
        if (isset($_GET["MaHP"])) {
            $hocphan = new HocPhan();
            $hocphan->delete($_GET["MaHP"]);
            header("Location: index.php?controller=hocphan&action=index");
        }
    }
}
?>
