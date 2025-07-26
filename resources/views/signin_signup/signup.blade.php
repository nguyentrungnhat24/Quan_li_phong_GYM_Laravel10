<?php
include_once('../../model/Functionkhachhang.php');
include_once('../../model/db.php');
$userErr = $passErr = $repassErr = $nameErr =$phone_numberErr ="";
$user = $pass = $ThongBao = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone_number = $_POST['sdt'];
	$email = $_POST['email'];
	$repassword = $_POST['repassword'];
	$pass = $_POST['password'];


	if (empty($_POST['username'])) {
		$userErr = "Yêu cầu nhập tài khoản";
	} else {
		$user = $_POST['username'];
	}

	if ($pass != $repassword){
		$repassErr = 'Mật khẩu không trùng nhau !';
	}

	
	if (empty($_POST['password'])) {
		$passErr = "Yêu cầu nhập mật khẩu";
	} else {
		

		// Kết nối đến cơ sở dữ liệu
		$conn = mysqli_connect("localhost", "root", "", "databasegym");

		if (!$conn) {
			die("Lỗi kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
		}

		// Xử lý và xác thực tài khoản và mật khẩu
		$user = mysqli_real_escape_string($conn, $user); // Tránh SQL Injection

		
		$stmt = $conn->prepare("INSERT INTO user (user, pass, namee, addresss, phone_number, email) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssis", $user, $pass, $name, $address, $phone_number, $email);
		$result = $stmt->execute();

		

		if (!$result) {
			die("Lỗi truy vấn cơ sở dữ liệu: " . mysqli_error($conn));
		} else {
			$ThongBao = 'Đăng kí thành công!';

			themkhdk($name, $phone_number, $email, $address);
		}

		mysqli_close($conn);
	}
}
?>



<!doctype html>
<html lang="en">

<head>
	<title>Login 07</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<!-- <h2 class="heading-section bg-body-secondary">Sign Up #07</h2> -->
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							
							<div class="text w-100">
								<h2>Chào mừng đến với đăng kí</h2>
								<p>Bạn đã có tài khoản?</p>
								<a href="../" class="btn btn-white btn-outline-white">Đăng nhập</a>
							</div>
						</div>
						<div class="login-wrap p-4 p-lg-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Đăng kí</h3>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#"
											class="social-icon d-flex align-items-center justify-content-center"><span
												class="fa fa-facebook"></span></a>
										<a href="#"
											class="social-icon d-flex align-items-center justify-content-center"><span
												class="fa fa-twitter"></span></a>
									</p>
								</div>
							</div>
							<form action="" class="signin-form" method="POST">
								<div class="form-group mb-3">
									<label class="label" for="name">Họ và tên</label>
									<input type="text" name="name" class="form-control"
										required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="username">Tài khoản</label>
									<input type="text" name="username" class="form-control"
										required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password">Mật khẩu</label>
									<input type="password" name="password" class="form-control"
										required>
									<span class="text-warning">
										<?php echo $passErr ?>
									</span>
								</div>	
								<div class="form-group mb-3">
									<label class="label" for="repassword">nhâp lại mật khẩu</label>
									<input type="password" name="repassword" class="form-control"
										required>
									<span class="text-warning">
										<?php echo $repassErr ?>
									</span>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="address">Địa chỉ</label>
									<input type="text" name="address" class="form-control"
										required>
								</div>	
								<div class="form-group mb-3">
									<label class="label" for="sdt">Số điện thoại</label>
									<input type="number" name="sdt" class="form-control"
										required>
								</div>						
								<div class="form-group mb-3">
									<label class="label" for="email">Email</label>
									<input type="text" name="email" class="form-control" placeholder="Email" id="txtEmail" aria-describedby="msgEmail"
										required>
									<span class="text-warning">
										<p id="msgEmail"></p>
									</span>
									<span class="text-warning">
										<?php echo $ThongBao ?>
									</span>
								</div>
								<div class="form-group">
									<button type="submit" name="submit" onclick="return ktEmail('txtEmail','msgEmail','Sai định dạng Email !')"
										class="form-control btn btn-primary submit px-3">Sign Up</button>
								</div>
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
											<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
            function ktEmail(idTag, idMsg, msg) {
              var idTag = document.getElementById(idTag);
              var idMsg = document.getElementById(idMsg);
              var valueInput = idTag.value;
              var redExr = /^^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
              if (!redExr.test(valueInput) != "") {
                idMsg.style.display = "block";
                idMsg.innerHTML = msg;
                return false;
              } else {
                idMsg.style.display = "none";
                return true;
              }
            }
          </script>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>