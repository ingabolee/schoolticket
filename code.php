<?php 
session_start();
include 'config.php';
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;


$User_phone = (isset($_GET['User_phone'])) ? $_GET['User_phone'] : '+000000';
$User_phone = str_replace(' ', '', $User_phone);

$sid = "";
$token = "";
$serviceId = "";

$twilio = new Client($sid, $token);

if (isset($_POST['submit'])) {

    $vCode = $_POST['code'];

    $verification_check = $twilio->verify->v2->services($serviceId)->verificationChecks->create(
            array(
                "code"=>$vCode,
                "To" => "+".$User_phone
            ),
            
        );
    if ($verification_check->status == 'approved') {
        // checks if the user already exist in db
        $query = "SELECT * FROM user WHERE User_phone = $User_phone";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['Role_id'] = $row['Role_id'];
			$_SESSION['User_id'] = $row['User_id'];

			if ($row['Role_id'] == "1"){
				header("Location: createdepartment.php");
			} elseif($row['Role_id'] == "2"){
				header("Location: ticket.php");
			}elseif($row['Role_id'] == "3"){
				header("Location: departmentticket.php");
			}else{
				header("Location: signup.php");
			}
			
        } else {
            // add new user to db
            header("Location: signup.php");
        }
    } else {
		header("Location: signup.php");
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
										<h4 class="">ENTER CONFIRMATION CODE</h4>
										<p>Don't have an account yet? <a href="signup.php">Sign up here</a>
										</p>
									</div>
								

									<div class="form-body">
										<form class="row g-3" action="" method="post">
											<div class="col-12">
												<input type="text" class="form-control" id="inputEmailAddress" placeholder="code" name="code">
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