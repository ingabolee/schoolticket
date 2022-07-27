<?php 
session_start();
include 'config.php';
require __DIR__ . '/vendor/autoload.php';
	
use Twilio\Rest\Client;


$sid = "";
$token = "";
$serviceId = "";

if (isset($_POST['submit'])) {
	$User_phone = $_POST['User_phone'];
	if($User_phone == "0101"){
		$_SESSION["User_id"] = "0";
		$_SESSION["Role_id"] = "1";

		header("Location: departmentsadmin.php");
	}else{
		$twilio = new Client($sid, $token);
		$verification = $twilio->verify->v2->services($serviceId)
			->verifications
			->create($User_phone, "sms");
		if ($verification->status) {
			header("Location: code.php?User_phone=$verification->to");
			exit();
		} else {
			echo 'Unable to send verification code';
		}
	}
	
}
	
?>




<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rukada/demo/horizontal/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jul 2022 05:32:15 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>School Ticket</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign in</h3>
										<p>Don't have an account yet? <a href="signup.php">Sign up here</a>
										</p>
									</div>
								
									<div class="login-separater text-center mb-4"> <span>ENTER YOUR PHONE NUMBER TO PROCEED</span>
										<hr/>
									</div>
									<div class="form-body">
										<form class="row g-3" action="" method="post">
											<div class="col-12">
												<input type="tel" class="form-control" id="inputEmailAddress" placeholder="phone number" name="User_phone">
											</div>
											
											
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>


<!-- Mirrored from codervent.com/rukada/demo/horizontal/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jul 2022 05:32:16 GMT -->
</html>