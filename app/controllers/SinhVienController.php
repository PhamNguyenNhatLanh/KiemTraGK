<?php
require_once __DIR__ . '/../models/SinhVien.php';

class SinhVienController {
    public function index() {
        $sinhvien = new SinhVien();
        $list = $sinhvien->getAll();
        require_once __DIR__ . '/../views/sinhvien/index.php';
    }

    public function detail() {
        if (isset($_GET['MaSV'])) {
            $sinhvien = new SinhVien();
            $MaSV = $_GET['MaSV'];
            $sinhvienInfo = $sinhvien->getById($MaSV);

            if (!$sinhvienInfo) {
                die("Sinh viên không tồn tại.");
            }

            require_once __DIR__ . '/../views/sinhvien/detail.php';
        }
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sinhvien = new SinhVien();
            $sinhvien->MaSV = $_POST["MaSV"];
            $sinhvien->HoTen = $_POST["HoTen"];
            $sinhvien->GioiTinh = $_POST["GioiTinh"];
            $sinhvien->NgaySinh = $_POST["NgaySinh"];
            $sinhvien->MaNganh = $_POST["MaNganh"];
    
            // Xử lý upload ảnh
            if (!empty($_FILES["Hinh"]["name"])) {
                $targetDir = "public/images/";  // Thư mục lưu ảnh
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true); // Tạo thư mục nếu chưa có
                }
    
                $fileName = basename($_FILES["Hinh"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
                // Kiểm tra loại file hợp lệ
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array(strtolower($fileType), $allowTypes)) {
                    if (move_uploaded_file($_FILES["Hinh"]["tmp_name"], $targetFilePath)) {
                        $sinhvien->Hinh = "/" . $targetFilePath; // Lưu đường dẫn ảnh vào database
                    } else {
                        $sinhvien->Hinh = "/public/images/default.jpg"; // Ảnh mặc định nếu upload lỗi
                    }
                } else {
                    die("Chỉ chấp nhận các file ảnh JPG, PNG, JPEG, GIF.");
                }
            } else {
                $sinhvien->Hinh = "/public/images/default.jpg"; // Ảnh mặc định nếu không upload
            }
    
            $sinhvien->create();
            header("Location: index.php?controller=sinhvien&action=index");
            exit();
        }
        require_once __DIR__ . '/../views/sinhvien/create.php';
    }
    

    public function delete() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['confirm_delete'])) {
            if (isset($_GET["MaSV"])) {
                $MaSV = $_GET["MaSV"];
                $sinhvien = new SinhVien();
                $sinhvien->delete($MaSV);
                header("Location: index.php?controller=sinhvien&action=index");
                exit();
            }
        } else {
            if (isset($_GET["MaSV"])) {
                $MaSV = $_GET["MaSV"];
                $sinhvien = new SinhVien();
                $sinhvienInfo = $sinhvien->getById($MaSV);

                if (!$sinhvienInfo) {
                    die("Sinh viên không tồn tại.");
                }

                require_once __DIR__ . '/../views/sinhvien/delete.php';
            }
        }
    }
    public function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sinhvien = new SinhVien();
            $sinhvien->MaSV = $_POST["MaSV"];
            $sinhvien->HoTen = $_POST["HoTen"];
            $sinhvien->GioiTinh = $_POST["GioiTinh"];
            $sinhvien->NgaySinh = $_POST["NgaySinh"];
            $sinhvien->MaNganh = $_POST["MaNganh"];

            // Lấy đường dẫn ảnh cũ
            $currentSinhVien = $sinhvien->getById($_POST["MaSV"]);
            $currentImage = $currentSinhVien['Hinh'];

            // Xử lý upload ảnh mới (nếu có)
            if (!empty($_FILES["Hinh"]["name"])) {
                $targetDir = "web_dangkyhocphan/public/Content/images/";
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }

                $fileName = basename($_FILES["Hinh"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $uploadPath = __DIR__ . "/../../public/Content/images/" . $fileName;

                if (move_uploaded_file($_FILES["Hinh"]["tmp_name"], $uploadPath)) {
                    $sinhvien->Hinh = "/web_dangkyhocphan/public/Content/images/" . $fileName;
                } else {
                    $sinhvien->Hinh = $currentImage;
                }
            } else {
                $sinhvien->Hinh = $currentImage;
            }

            $sinhvien->update();
            header("Location: index.php?controller=sinhvien&action=index");
            exit();
        } else {
            if (isset($_GET["MaSV"])) {
                $MaSV = $_GET["MaSV"];
                $sinhvien = new SinhVien();
                $sinhvienInfo = $sinhvien->getById($MaSV);

                if (!$sinhvienInfo) {
                    die("Sinh viên không tồn tại.");
                }

                require_once __DIR__ . '/../views/sinhvien/edit.php';
            }
        }
    }
    
}
?>
