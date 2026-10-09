<?php
class DonHangModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        return $this->pdo->query("SELECT * FROM don_hang ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($ten_khach_hang, $tong_tien, $trang_thai)
    {
        $stmt = $this->pdo->prepare("INSERT INTO don_hang (ten_khach_hang, tong_tien, trang_thai) VALUES (?, ?, ?)");
        return $stmt->execute([$ten_khach_hang, $tong_tien, $trang_thai]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM don_hang WHERE id = ?");
        return $stmt->execute([$id]);
    }
}