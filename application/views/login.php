<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Login</h1>
	<?php echo validation_errors(); ?>
	<?php echo form_open('login/action'); ?>
		Username : <input type="text" name="username">
		<button>Login</button>
	</form>
</body>
</html>
