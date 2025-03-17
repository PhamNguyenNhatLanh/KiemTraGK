<?php
require_once __DIR__ . '/../config/database.php';

class ChiTietDangKy {
    private $conn;
    private $table_name = "chitietdangky";

    public $MaDK;
    public $MaHP;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (MaDK, MaHP) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->MaDK, $this->MaHP]);
    }

    public function getByMaDK($MaDK) {
        $query = "SELECT hocphan.* FROM " . $this->table_name . " 
                  JOIN hocphan ON chitietdangky.MaHP = hocphan.MaHP 
                  WHERE MaDK = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$MaDK]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
