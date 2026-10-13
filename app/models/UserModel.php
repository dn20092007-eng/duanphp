
<?php

class UserModel
{
    public function __construct(private $pdo)
    {
    }

    public function getAll()
    {
        $sql = "SELECT * FROM NguoiDung ORDER BY MaNguoiDung DESC";

        return $this->pdo
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM NguoiDung WHERE MaNguoiDung = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($d)
    {
        // Tìm mã trống nhỏ nhất, bắt đầu từ 1.
        // Ví dụ: 1, 2, 3, 5 thì mã trống là 4.
        $sqlId = "
            SELECT MIN(t.MaNguoiDung + 1) AS MaTrong
            FROM NguoiDung t
            LEFT JOIN NguoiDung next_user
                ON next_user.MaNguoiDung = t.MaNguoiDung + 1
            WHERE next_user.MaNguoiDung IS NULL
        ";

        // Tìm mã trống đầu tiên trong dãy từ 1.
        $sqlId = "
            SELECT MIN(n.MaNguoiDung + 1)
            FROM NguoiDung n
            LEFT JOIN NguoiDung n2
                ON n2.MaNguoiDung = n.MaNguoiDung + 1
            WHERE n2.MaNguoiDung IS NULL
              AND n.MaNguoiDung >= 0
        ";

        $maTrong = (int) $this->pdo->query($sqlId)->fetchColumn();

        // Nếu bảng rỗng hoặc mã tìm được không hợp lệ, dùng mã 1.
        if ($maTrong < 1) {
            $maTrong = 1;
        }

        // Nếu bảng có mã 1, 2, 3... và mã trống nằm giữa,
        // truy vấn trên sẽ tìm mã kế tiếp sau một mã đang có.
        // Kiểm tra mã 1 trước để bảo đảm lấy mã trống nhỏ nhất.
        $sqlFirst = "
            SELECT MIN(a.MaNguoiDung + 1)
            FROM NguoiDung a
            LEFT JOIN NguoiDung b
                ON b.MaNguoiDung = a.MaNguoiDung + 1
            WHERE b.MaNguoiDung IS NULL
        ";

        $maTrong = (int) $this->pdo->query($sqlFirst)->fetchColumn();

        // Lấy mã trống nhỏ nhất chính xác, kể cả khi mã 1 bị khuyết.
        $allIds = $this->pdo
            ->query("SELECT MaNguoiDung FROM NguoiDung ORDER BY MaNguoiDung")
            ->fetchAll(PDO::FETCH_COLUMN);

        $used = array_fill_keys(array_map('intval', $allIds), true);
        $maTrong = 1;

        while (isset($used[$maTrong])) {
            $maTrong++;
        }

        $sql = "INSERT INTO NguoiDung
            (
                MaNguoiDung,
                TenDangNhap,
                MatKhau,
                Email,
                TenHienThi,
                VaiTro,
                SoDienThoai,
                DiaChi,
                NgayDangKy,
                TrangThai
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $maTrong,
            trim($d['ten_dang_nhap']),
            $d['mat_khau'],
            trim($d['email']),
            trim($d['ten_hien_thi']),
            $d['vai_tro'],
            !empty($d['so_dien_thoai'])
                ? trim($d['so_dien_thoai'])
                : null,
            !empty($d['dia_chi'])
                ? trim($d['dia_chi'])
                : null,
            $d['trang_thai']
        ]);
    }

    public function update($id, $d)
    {
        $matKhauMoi = trim($d['mat_khau_moi'] ?? '');

        if ($matKhauMoi !== '') {
            $sql = "UPDATE NguoiDung
                    SET Email = ?,
                        TenHienThi = ?,
                        VaiTro = ?,
                        SoDienThoai = ?,
                        DiaChi = ?,
                        TrangThai = ?,
                        MatKhau = ?
                    WHERE MaNguoiDung = ?";

            $data = [
                trim($d['email']),
                trim($d['ten_hien_thi']),
                $d['vai_tro'],
                !empty($d['so_dien_thoai'])
                    ? trim($d['so_dien_thoai'])
                    : null,
                !empty($d['dia_chi'])
                    ? trim($d['dia_chi'])
                    : null,
                $d['trang_thai'],
                $matKhauMoi,
                $id
            ];
        } else {
            $sql = "UPDATE NguoiDung
                    SET Email = ?,
                        TenHienThi = ?,
                        VaiTro = ?,
                        SoDienThoai = ?,
                        DiaChi = ?,
                        TrangThai = ?
                    WHERE MaNguoiDung = ?";

            $data = [
                trim($d['email']),
                trim($d['ten_hien_thi']),
                $d['vai_tro'],
                !empty($d['so_dien_thoai'])
                    ? trim($d['so_dien_thoai'])
                    : null,
                !empty($d['dia_chi'])
                    ? trim($d['dia_chi'])
                    : null,
                $d['trang_thai'],
                $id
            ];
        }

        return $this->pdo->prepare($sql)->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM NguoiDung WHERE MaNguoiDung = ?"
        );

        return $stmt->execute([$id]);
    }
}
