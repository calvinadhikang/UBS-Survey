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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Document</title>
	<style>
		.gradient-custom-2 {
			/* fallback for old browsers */
			background: #fccb90;

			/* Chrome 10-25, Safari 5.1-6 */
			background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

			/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
			background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
			}
		
		body {
			background: linear-gradient(-45deg, #7CB9E8, #00308F, #89CFF0, #007FFF, #5072A7);
			background-size: 400% 400%;
			animation: gradient 7s ease infinite;
			height: 100vh;
		}
		@keyframes gradient {
			0% {
				background-position: 0% 50%;
			}
			50% {
				background-position: 100% 50%;
			}
			100% {
				background-position: 0% 50%;
			}
		}
	</style>
</head>

<body>
	<div class="d-flex flex-column justify-content-center w-100 h-100">
		<div class="d-flex flex-column justify-content-center align-items-center">
			<div class="container py-5 h-100">
				<div class="row d-flex justify-content-center align-items-center h-100">
					<div class="col-xl-10">
						<div class="card rounded-3 text-black">
							<div class="row g-0">
								<div class="col-lg-6">
									<div class="card-body p-md-5 mx-md-4">
										<div class="text-center">
											<img src="assets/img/logoubsnew.png" class="rounded" width="185px" alt="fotoubs">
										</div>
										<br><br><br>
										<h3>Sign In</h3>
										<div class="form-group first">
											<?php echo validation_errors(); ?>
											<?php echo form_open('login/action'); ?>
											<label for="username">Username</label>
											<input type="text" class="form-control" placeholder="Enter Your Username" name="username"
												style="border: 1px solid black;">
											<br>
											<label for="username">Password</label>
											<input type="text" class="form-control" placeholder="Enter Your Password" name="password"
												style="border: 1px solid black;">
											<br>
											<button type="submit" class="btn btn-block btn-primary">Login</button>
										</div>
										<br><br><br><br><br>
									</div>
								</div>
								<div class="col-lg-6 d-flex align-items-center" style="background-color: #0a2fb6; border-radius:5px;">
									<img src="assets/img/LogoUbs2.jpg" class="rounded" width="385px" height="400px" alt="fotoubs" style="margin-left: -8%;">
								</div>
							</div>
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
