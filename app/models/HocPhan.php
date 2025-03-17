<?php
require_once __DIR__ . '/../config/database.php';

class HocPhan {
    private $conn;
    private $table_name = "hocphan";

    public $MaHP;
    public $TenHP;
    public $SoTinChi;

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

    public function getById($MaHP) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaHP = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$MaHP]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (MaHP, TenHP, SoTinChi) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->MaHP, $this->TenHP, $this->SoTinChi]);
    }

    public function delete($MaHP) {
        $query = "DELETE FROM " . $this->table_name . " WHERE MaHP=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$MaHP]);
    }
}
?>
