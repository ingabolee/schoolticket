<?php 
include 'config.php';

if(isset($_POST['submit'])){
    $User_firstname = $_POST['User_firstname'];
    $User_middlename = $_POST['User_middlename'];
    $User_lastname = $_POST['User_lastname'];
    $User_email = $_POST['User_email'];
	$User_phone = $_POST['User_phone'];


	$sql = "SELECT * FROM user WHERE User_phone = '$User_phone'";
	$result = mysqli_query($conn, $sql);
	if ($result -> num_rows > 0){
		echo "<p>Phone number already exists</p>";
	}
	else{
		//login table
		$sql = "INSERT INTO user (User_firstname, User_middlename, User_lastname, User_email, User_phone, Role_id) 
		VALUES ('$User_firstname', '$User_middlename', '$User_lastname', '$User_email', '$User_phone', '2')";
		echo $sql;
		$result = mysqli_query($conn, $sql);

		echo $result;
                
		if(! $result){
			echo "<p>Registration not succesful</p>";
		}
		else {
			header ("Location: signin.php?status=success");
		}
	}
}



?>





<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rukada/demo/horizontal/authentication-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jul 2022 05:32:16 GMT -->
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
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign Up</h3>
										<p>Already have an account? <a href="signin.php">Sign in here</a>
										</p>
									</div>
									
									<div class="login-separater text-center mb-4"> <span>SIGN UP WITH EMAIL</span>
										<hr/>
									</div>
									<div class="form-body">
										<form class="row g-3"  method="post" action="">
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label">First Name</label>
												<input type="text" class="form-control" id="inputFirstName" name="User_firstname" required>
											</div>
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label">Middle Name</label>
												<input type="text" class="form-control" id="inputFirstName" name="User_middlename" required>
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">Last Name</label>
												<input type="text" class="form-control" id="inputLastName" name="User_lastname" required>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com" name="User_email" required>
											</div>

											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Phone Number</label>
												<input type="tel" class="form-control" id="inputEmailAddress" placeholder="+254XXXXXXXXX" name="User_phone" required>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="submit" class="btn btn-primary"><i class='bx bx-user'></i>Sign up</button>
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


<!-- Mirrored from codervent.com/rukada/demo/horizontal/authentication-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jul 2022 05:32:16 GMT -->
</html>