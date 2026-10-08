<?php

class LoginModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserByUsername($tenDangNhap)
    {
        $sql = "SELECT *
                FROM NguoiDung
                WHERE TenDangNhap = :u
                LIMIT 1";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([
            'u' => $tenDangNhap
        ]);

        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function updateLoginHistory($maNguoiDung)
    {
        $sql = "UPDATE NguoiDung
                SET LichSuDangNhap = NOW()
                WHERE MaNguoiDung = :id";

        $stm = $this->pdo->prepare($sql);

        return $stm->execute([
            'id' => $maNguoiDung
        ]);
    }
}