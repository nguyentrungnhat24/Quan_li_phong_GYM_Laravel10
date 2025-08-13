<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nền tảng - Kiến thức cơ bản về WEB | Bảng tin</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="../css/bootstrap/font-awesome.min.css" type="text/css">

    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="../css/app.css" type="text/css">
</head>

<body>
    <!-- header -->

    <!-- end header -->

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <form class="needs-validation" name="frmthanhtoan" method="post" action="">
                <input type="hidden" name="kh_tendangnhap" value="dnpcuong">

                <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                    <h2>Thanh toán</h2>
                    <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
                </div>

                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Giỏ hàng</span>
                            <span class="badge badge-secondary badge-pill">2</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php
                            $tong = 0;

                            // echo var_dump($_SESSION['id']);
                            foreach ($_SESSION['id'] as $value) {
                                $item[] = $value;
                            }
                            $str = implode(",", $item);
                            $conn = mysqli_connect("localhost", "root", "", "databasegym");

                            // Truy vấn
                            $sql = "SELECT * FROM tb_danhmucloptap WHERE id in ($str)";

                            $kq = mysqli_query($conn, $sql);
                            if (!$kq) {
                                die("Lỗi SQL: " . mysqli_error($conn));
                            } else {
                                while ($row = mysqli_fetch_array($kq)) {
                                    // Calculate the subtotal for the item and add it to $tong
                                    $s = $row['gia'] * $_SESSION['cart'][$row['id']];
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">
                                                <?php echo $row['tenloptap']; ?>
                                            </h6>
                                            <small class="text-muted">
                                                <?php echo number_format($row['gia'], 0) . 'VND'; ?>
                                            </small>
                                        </div>
                                        <span class="text-muted">
                                            <?php echo number_format($s, 0) . "VND"; ?>
                                        </span>
                                    </li>
                                    <?php
                                    $tong += $s;
                                    if (isset($_POST['btnMuaGoi'])){
                                   
                                        themloptap($_SESSION['iduser'], $row["tenloptap"], $row["gia"], $_SESSION['cart'][$row['id']], $row["thoigian"], $_POST["kh_ten"] , $_POST["kh_diachi"], $_POST["kh_dienthoai"] , $_POST["kh_email"] );
                                        
                                }
                                
                               }  
                                
                            }
                            ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tổng thành tiền</span>
                                <strong>
                                    <?php echo number_format($tong, 0) . "VND"; ?>
                                </strong>
                            </li>
                        </ul>

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Mã khuyến mãi">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Thông tin khách hàng</h4>
                        <?php
                        // Truy vấn
                        $sql1 = "SELECT * FROM user WHERE id = " . $_SESSION['idUser'];

                        $kq1 = mysqli_query($conn, $sql1);

                        if (!$kq1) {
                            die("Lỗi SQL: " . mysqli_error($conn));
                        } else
                            if ($row = mysqli_fetch_array($kq1)) {
                                
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="kh_ten">Họ tên</label>
                                        <input type="text" class="form-control" name="kh_ten" id="kh_ten"
                                            value="<?php echo $row['namee']; ?>">

                                    </div>
                                    <div class="col-md-12">
                                        <label for="kh_diachi">Địa chỉ</label>
                                        <input type="text" class="form-control" name="kh_diachi" id="kh_diachi"
                                            value="<?php echo $row['addresss']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="kh_dienthoai">Điện thoại</label>
                                        <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai"
                                            value="0<?php echo $row['phone_number']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="kh_email">Email</label>
                                        <input type="text" class="form-control" name="kh_email" id="kh_dienemail"
                                            value="<?php echo $row['email']; ?>">
                                    </div>
                                </div>
                            <?php } ?>
                        <h4 class="mb-3">Hình thức thanh toán</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="httt-1" name="httt_ma" type="radio" class="custom-control-input" required=""
                                    value="1">
                                <label class="custom-control-label" for="httt-1">Tiền mặt</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="httt-2" name="httt_ma" type="radio" class="custom-control-input" required=""
                                    value="2">
                                <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnMuaGoi">Mua gói</button>
                    </div>
                </div>
            </form>
        </div>
            

        <!-- End block content -->
    </main>

    <!-- footer -->
    <footer class="footer mt-auto py-3">
        <div class="container">
            <span>Bản quyền © bởi <a href="https://nentang.vn">Nền Tảng</a> -
                <script>document.write(new Date().getFullYear());</script>.
            </span>
            <span class="text-muted">Hành trang tới Tương lai</span>

            <p class="float-right">
                <a href="#">Về đầu trang</a>
            </p>
        </div>
    </footer>
    <!-- end footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popperjs/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom script - Các file js do mình tự viết -->
    <script src="assets/js/app.js"></script>

</body>

</html>