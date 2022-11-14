<?php
session_start();
?>

<html>

<head lang="en" dir="ltr">
	<meta charset="utf-8">
	<title>login page</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
</head>




<body>
	<div class=" container" style="width:600px">
		<h2>Login</h2>
		<form action="login_chk.php" method="post">
			<div class="user-box">
				<label>Email</label>
				<input type="text"class="form-control" name="email" required="" autocomplete="off">
				
			</div>
			<div class="user-box">
			<label>Password</label>
				<input type="password" name="pass" class=form-control required="">
			</div>
			<div id="login"><br>
				<button type="submit" name="login" value="login" class="btn btn-info form-control">Log In</button>
</div>
			 <br>
		<a href="register_form.php" class="form-control btn btn-info">New User</a></p>
		
		</form>
	</div>
</body>

</html>