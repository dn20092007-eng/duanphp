<?php

class UserModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM NguoiDung ORDER BY MaNguoiDung DESC";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO NguoiDung
                (TenDangNhap, MatKhau, Email, TenHienThi, VaiTro, SoDienThoai, DiaChi, NgayDangKy, TrangThai)
                VALUES
                (:u, :p, :e, :ht, :vt, :sdt, :dc, NOW(), :tt)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'u' => $data['ten_dang_nhap'],
            'p' => $data['mat_khau'],
            'e' => $data['email'],
            'ht' => $data['ten_hien_thi'],
            'vt' => $data['vai_tro'],
            'sdt' => $data['so_dien_thoai'],
            'dc' => $data['dia_chi'],
            'tt' => $data['trang_thai']
        ]);
    }
}