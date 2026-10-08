<?php

class UserModel
{
    public function __construct(private $pdo) {}

    public function getAll()
    {
        return $this->pdo->query("SELECT * FROM NguoiDung ORDER BY MaNguoiDung DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM NguoiDung WHERE MaNguoiDung = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($d)
    {
        $sql = "INSERT INTO NguoiDung
        (TenDangNhap,MatKhau,Email,TenHienThi,VaiTro,SoDienThoai,DiaChi,NgayDangKy,TrangThai)
        VALUES (?,?,?,?,?,?,?,NOW(),?)";

        return $this->pdo->prepare($sql)->execute([
            $d['ten_dang_nhap'],
            $d['mat_khau'],
            $d['email'],
            $d['ten_hien_thi'],
            $d['vai_tro'],
            $d['so_dien_thoai'],
            $d['dia_chi'],
            $d['trang_thai']
        ]);
    }

    public function update($id, $d)
    {
        if ($d['mat_khau_moi']) {
            $sql = "UPDATE NguoiDung SET Email=?,TenHienThi=?,VaiTro=?,SoDienThoai=?,DiaChi=?,TrangThai=?,MatKhau=? WHERE MaNguoiDung=?";
            $data = [
                $d['email'],
                $d['ten_hien_thi'],
                $d['vai_tro'],
                $d['so_dien_thoai'],
                $d['dia_chi'],
                $d['trang_thai'],
                $d['mat_khau_moi'],
                $id
            ];
        } else {
            $sql = "UPDATE NguoiDung SET Email=?,TenHienThi=?,VaiTro=?,SoDienThoai=?,DiaChi=?,TrangThai=? WHERE MaNguoiDung=?";
            $data = [
                $d['email'],
                $d['ten_hien_thi'],
                $d['vai_tro'],
                $d['so_dien_thoai'],
                $d['dia_chi'],
                $d['trang_thai'],
                $id
            ];
        }

        return $this->pdo->prepare($sql)->execute($data);
    }

    public function delete($id)
    {
        return $this->pdo->prepare("DELETE FROM NguoiDung WHERE MaNguoiDung=?")->execute([$id]);
    }
}