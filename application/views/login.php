<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

	<!-- <link rel="stylesheet" href="fonts/icomoon/style.css"> -->

	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Style -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Document</title>
</head>

<body>
	<div class="d-lg-flex half">
		<div class="bg order-1 order-md-2" style="background-color: rgb(10,47,182);">
			<div style="margin-left: -30px; margin-top: 130px;">
				<img src="assets/img/LogoUbs2.jpg" class="rounded" width="350px" height="400px">
			</div>
		</div>

		<div class="contents order-2 order-md-1">
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-md-7">
						<div style="margin-left: -150px; margin-top: -160px">
							<img src="assets/img/LogoUbs.png" width="220px" height="100px">
						</div>

						<br><br><br><br><br><br>
						
                        <h3>Sign In</h3>
						
                        <br><br>
						
                        <div class="form-group first">
							<?php echo validation_errors(); ?>
							<?php echo form_open('login/action'); ?>
							<label for="username">Username</label>
							<input type="text" class="form-control" placeholder="Enter Your Username" name="username"
								style="border: 1px solid black;">
							<br>
							<button type="submit" class="btn btn-block btn-primary">Login</button>
						</div>
                        
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
</body>

</html>
