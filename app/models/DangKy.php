<?php
require_once __DIR__ . '/../config/database.php';

class DangKy {
    private $conn;
    private $table_name = "dangky";

    public $MaDK;
    public $NgayDK;
    public $MaSV;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByMaSV($MaSV) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaSV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$MaSV]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (NgayDK, MaSV) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->NgayDK, $this->MaSV]);
        return $this->conn->lastInsertId(); // Lấy ID đăng ký vừa tạo
    }
    public function getById($MaDK) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaDK = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$MaDK]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($MaDK) {
        $query = "DELETE FROM " . $this->table_name . " WHERE MaDK=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$MaDK]);
    }
    
}
?>
