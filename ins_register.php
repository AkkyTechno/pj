<?php
session_start();

if(isset($_POST['Register']))
{	
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$confo_pass=$_POST['confo_pass'];
	$mobile=$_POST['mobile'];
	$address1=$_POST['address1'];
	$address2=$_POST['address2'];
	
	//image
	$filename=$_FILES['file']['name'];//returns the name of selected file..
	$source=$_FILES['file']['tmp_name'];
	$destination="upload/".$filename;//location
	move_uploaded_file($source,$destination);
	
	$con=mysqli_connect('localhost','root','','shopping');
	$qry1="SELECT * FROM `user_info` WHERE  `email`='".$email."' and `mobile`='".$mobile."' ";
	$run1=mysqli_query($con,$qry1);
		// product not same 
	$row=mysqli_num_rows($run1);
	if($row=='0')
	{
		if($first_name!="" && $last_name!="" && $email!="" && $password!="" && $mobile!="" && $address1!="" && $address2!="")
	{
		if(!preg_match("/^[a-zA-Z\s]+$/",$_POST['first_name'])&!preg_match("/^[a-zA-Z\s]+$/",$_POST['last_name']))
		{
		$_SESSION['first_name']=$_POST['first_name'];
		$_SESSION['last_name']=$_POST['last_name'];
		$_SESSION['email']=$_POST['email'];
		$_SESSION['password']=$_POST['password'];
		$_SESSION['confo_pass']=$_POST['confo_pass'];
		$_SESSION['mobile']=$_POST['mobile'];
		$_SESSION['address1']=$_POST['address1'];
		$_SESSION['address2']=$_POST['address2'];
		
		header('location:register_form.php?char=Please Enter Only Character In Name Feiled');

		}
		else
		{
			if(!preg_match('/^[0-9]*$/',$_POST['mobile']))
			{
			$_SESSION['first_name']=$_POST['first_name'];
		$_SESSION['last_name']=$_POST['last_name'];
		$_SESSION['email']=$_POST['email'];
		$_SESSION['password']=$_POST['password'];
		$_SESSION['confo_pass']=$_POST['confo_pass'];
		$_SESSION['mobile']=$_POST['mobile'];
		$_SESSION['address1']=$_POST['address1'];
		$_SESSION['address2']=$_POST['address2'];
			header('location:register_form.php?num=Please Enter Only Number In Mobile Feild');
			}
			else
			{
				if(strlen($password)<=8)
			{
			$_SESSION['first_name']=$_POST['first_name'];
		$_SESSION['last_name']=$_POST['last_name'];
		$_SESSION['email']=$_POST['email'];
		$_SESSION['password']=$_POST['password'];
		$_SESSION['confo_pass']=$_POST['confo_pass'];
		$_SESSION['mobile']=$_POST['mobile'];
		$_SESSION['address1']=$_POST['address1'];
		$_SESSION['address2']=$_POST['address2'];
			header('location:register_form.php?char=Your Password Must Contain At Least 8 Digits !');
			}
			else
			{
				if(!preg_match("#[0-9]+#",$password))
			{
			$_SESSION['first_name']=$_POST['first_name'];
		$_SESSION['last_name']=$_POST['last_name'];
		$_SESSION['email']=$_POST['email'];
		$_SESSION['password']=$_POST['password'];
		$_SESSION['confo_pass']=$_POST['confo_pass'];
		$_SESSION['mobile']=$_POST['mobile'];
		$_SESSION['address1']=$_POST['address1'];
		$_SESSION['address2']=$_POST['address2'];
			header('location:register_form.php?char=Your Password Must Contain At Least 1 Number !');
			}
			else
			{
				if(!preg_match("#[A-Z]+#",$password))
			{
			$_SESSION['first_name']=$_POST['first_name'];
		$_SESSION['last_name']=$_POST['last_name'];
		$_SESSION['email']=$_POST['email'];
		$_SESSION['password']=$_POST['password'];
		$_SESSION['confo_pass']=$_POST['confo_pass'];
		$_SESSION['mobile']=$_POST['mobile'];
		$_SESSION['address1']=$_POST['address1'];
		$_SESSION['address2']=$_POST['address2'];
			header('location:register_form.php?char=Your Password Must Contain At Least 1 Capital letter!');
			}
			else
			{
				if(!preg_match("#[a-z]+#",$password))
			{
			$_SESSION['first_name']=$_POST['first_name'];
		$_SESSION['last_name']=$_POST['last_name'];
		$_SESSION['email']=$_POST['email'];
		$_SESSION['password']=$_POST['password'];
		$_SESSION['confo_pass']=$_POST['confo_pass'];
		$_SESSION['mobile']=$_POST['mobile'];
		$_SESSION['address1']=$_POST['address1'];
		$_SESSION['address2']=$_POST['address2'];
			header('location:register_form.php?char=Your Password Must Contain At Least 1 Lowercase Letter !');
			}
			else
			{
				if(!preg_match('/[\'^$%&*()}{@#~?><>,|=_+-]/',$password))
			{
			$_SESSION['first_name']=$_POST['first_name'];
		$_SESSION['last_name']=$_POST['last_name'];
		$_SESSION['email']=$_POST['email'];
		$_SESSION['password']=$_POST['password'];
		$_SESSION['confo_pass']=$_POST['confo_pass'];
		$_SESSION['mobile']=$_POST['mobile'];
		$_SESSION['address1']=$_POST['address1'];
		$_SESSION['address2']=$_POST['address2'];
			header('location:register_form.php?char=Your Password Must Contain At Least 1 Special Character !');
			}
			else
			{
					if($password==$confo_pass)
			{
			
			
			$qry="INSERT INTO `user_info`(`first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`, `profile`) VALUES ('$first_name','$last_name','$email','$password','$mobile','$address1','$address2','$destination')";
			mysqli_query($con,$qry);
			header('location:index.php');
			}
			}
			}
			}
			}
			}
			}

		}
	}
	else
	{
	$_SESSION['first_name']=$_POST['first_name'];
		$_SESSION['last_name']=$_POST['last_name'];
		$_SESSION['email']=$_POST['email'];
		$_SESSION['password']=$_POST['password'];
		$_SESSION['confo_pass']=$_POST['confo_pass'];
		$_SESSION['mobile']=$_POST['mobile'];
		$_SESSION['address1']=$_POST['address1'];
		$_SESSION['address2']=$_POST['address2'];
	header('location:register_form.php?empty=Please Fill In The Blank');
	}

	}
	
	else
	{
	$_SESSION['first_name']=$_POST['first_name'];
		$_SESSION['last_name']=$_POST['last_name'];
		$_SESSION['email']=$_POST['email'];
		$_SESSION['password']=$_POST['password'];
		$_SESSION['confo_pass']=$_POST['confo_pass'];
		$_SESSION['mobile']=$_POST['mobile'];
		$_SESSION['address1']=$_POST['address1'];
		$_SESSION['address2']=$_POST['address2'];
	header('location:register_form.php?empty=Phone Number and Email-Id Will Be Uniq');
	}

}

?>