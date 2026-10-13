
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng Nhập</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <h3 class="text-center mb-4">
                Đăng Nhập
            </h3>

            <?php if (!empty($thongBao)): ?>

                <div class="alert alert-danger">
                    <?= htmlspecialchars($thongBao, ENT_QUOTES, 'UTF-8') ?>
                </div>

            <?php endif; ?>

            <form
                method="POST"
                action="index.php?modun=auth&action=login"
                class="border p-4"
            >

                <div class="mb-3">

                    <label for="ten_dang_nhap" class="form-label">
                        Tên Đăng Nhập
                    </label>

                    <input
                        type="text"
                        id="ten_dang_nhap"
                        name="ten_dang_nhap"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label for="mat_khau" class="form-label">
                        Mật Khẩu
                    </label>

                    <input
                        type="password"
                        id="mat_khau"
                        name="mat_khau"
                        class="form-control"
                        required
                    >

                </div>

                <button
                    type="submit"
                    class="btn btn-primary w-100"
                >
                    Đăng Nhập
                </button>

            </form>

        </div>

    </div>

</div>

</body>

</html>