<?php
require_once '../app/controllers/SinhVienController.php';
require_once '../app/controllers/HocPhanController.php';
require_once '../app/controllers/DangKyController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'sinhvien';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'sinhvien':
        $ctrl = new SinhVienController();
        break;
    case 'hocphan':
        $ctrl = new HocPhanController();
        break;
    case 'dangky':
        $ctrl = new DangKyController();
        break;
    default:
        echo "Không tìm thấy controller!";
        exit;
}

if (method_exists($ctrl, $action)) {
    $ctrl->$action();
} else {
    echo "Không tìm thấy action!";
}
?>
