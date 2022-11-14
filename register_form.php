<?php session_start(); ?>
<html>
		<head lang="en" dir="ltr">
		<meta charset="utf-8">	
		<title>User Register</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="../font/fontawesome-free-5.11.2-web/css/all.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">

		</head>
		<script>
		
function lettersonly(input){
var regex= /[^a-z]/gi;
input.value=input.value.replace(regex, "");
}
function isInputNumber(evt)
{
var ch=String.fromCharCode(evt.which);
if(!(/[0-9]/.test(ch)))
{
evt.preventDefault();
}
}

		</script>
	<style>
		.bg-model{
	width:100%;
	
	background-color:rgba(0,0,0,0.7);
	position:absolute;
	top:0;
	display:flex;
	justify-content:center;
	align-items:center;
	
}
.model-content{
	width:70%;
	height:80%;
	background-color:white;
	border-radius:4px;
	padding:20px;
	position:relative;
}
input{
	width:50%;
	display:block;
	margin:15px auto;
	}
	
		</style>

		 <body>
		
		 <div class="panel-body">
		  <div class="bg-model">
		 <div class="model-content">
		<form class="box" name="formname" autocomplete="off" action="ins_register.php" method="post" enctype="multipart/form-data">
		
		<h1 align="center" class="alert alert-info">Register </h1>
		<?php
			if(@isset($_GET['empty']))
			{
		?>
	<div class="alert alert-warning" align="center" ><b><?php echo $_GET['empty'] ?> </b></div>
		<?php
			}
		?>	
		<?php
			if(@isset($_GET['char']))
			{
		?>
	<div class="alert alert-warning" align="center" ><b><?php echo $_GET['char'] ?> </b></div>
		<?php
			}
		?>	
		<?php
			if(@isset($_GET['num']))
			{
		?>
	<div class="alert alert-warning" align="center" ><b><?php echo $_GET['num'] ?> </b></div>
		<?php
			}
		?>	
		<i class='fas fa-address-book' style='font-size:24px'></i>
		<label>First Name</label>
		<input type="text" name="first_name" onKeyUp="lettersonly(this)"  placeholder="first_name" class="form-control" maxlength="15"  value="<?php if(@isset($_SESSION['first_name']))
						echo $_SESSION['first_name'];  ?>">
						
			<i class='fas fa-address-book' style='font-size:24px'></i>
			<label>Last Name</label>
		<input type="text" name="last_name" onKeyUp="lettersonly(this)"  placeholder="last_name" class="form-control" maxlength="15"  value="<?php if(@isset($_SESSION['last_name']))
						echo $_SESSION['last_name'];  ?>">
						
		<i class="fa fa-envelope" aria-hidden="true"></i>
		<label>Email</label>
		<input type="email" id="email" name="email" placeholder="email" class="form-control"  value="<?php if(@isset($_SESSION['email']))
						echo $_SESSION['email'];  ?>">
						
		<i class="fa fa-unlock-alt" aria-hidden="true"></i>
		<label>Password</label>
		<input type="password" id="pass" name="password" placeholder="Password" class="form-control" maxlength="10"  value="<?php if(@isset($_SESSION['password']))
						echo $_SESSION['password'];  ?>">
						
		<i class="fa fa-unlock-alt" aria-hidden="true"></i>
		<label>Confirm-Password</label>
		<input type="password" id="pass" name="confo_pass" placeholder="Password" class="form-control" maxlength="10"  value="<?php if(@isset($_SESSION['confo_pass']))
						echo $_SESSION['confo_pass'];  ?>">
						
		<i class="fa fa-mobile" aria-hidden="true"></i>
		<label >Mobile</label>
		<input type="text" name="mobile" onKeyPress="isInputNumber(event)" placeholder="mobile" maxlength="10"class="form-control"  value="<?php if(@isset($_SESSION['mobile']))
						echo $_SESSION['mobile'];  ?>">
						
		<label >Address1</label>
		<input type="text" name="address1" placeholder="address1" class="form-control" maxlength="30"  value="<?php if(@isset($_SESSION['address1']))
						echo $_SESSION['address1'];  ?>">
		<label >Address2</label>
		<input type="text" id="address2" name="address2" placeholder="address2" class="form-control" maxlength="30"  value="<?php if(@isset($_SESSION['address2']))
						echo $_SESSION['address2'];  ?>">
						
		
		<br>
		
		<input type="submit" name="Register" value="register" class="btn btn-success form">
		<h4>Not Yet ? &nbsp;&nbsp;<a href="index.php">Sign Up Now </a></h4>
		</form>
		</div>
		</div>
		</div>
		</body>
		</html>
	