<?php
class SanPhamModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        return $this->pdo->query("SELECT * FROM san_pham ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($ten_sp, $gia)
    {
        $stmt = $this->pdo->prepare("INSERT INTO san_pham (ten_sp, gia) VALUES (?, ?)");
        return $stmt->execute([$ten_sp, $gia]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM san_pham WHERE id = ?");
        return $stmt->execute([$id]);
    }
}