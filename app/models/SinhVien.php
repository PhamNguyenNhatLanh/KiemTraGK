<?php
require_once __DIR__ . '/../config/database.php';

class SinhVien {
    private $conn;
    private $table_name = "sinhvien";

    public $MaSV;
    public $HoTen;
    public $GioiTinh;
    public $NgaySinh;
    public $Hinh;
    public $MaNganh;

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

    public function getById($MaSV) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaSV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$MaSV]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->MaSV, $this->HoTen, $this->GioiTinh, $this->NgaySinh, $this->Hinh, $this->MaNganh]);
    }
    

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET HoTen=?, GioiTinh=?, NgaySinh=?, Hinh=?, MaNganh=? WHERE MaSV=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->HoTen, $this->GioiTinh, $this->NgaySinh, $this->Hinh, $this->MaNganh, $this->MaSV]);
    }

    public function delete($MaSV) {
        $sql = "DELETE FROM sinhvien WHERE MaSV = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$MaSV]);
    }
    
}
?>
