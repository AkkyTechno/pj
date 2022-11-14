
<?php
session_start();
$con=mysqli_connect('localhost','root','','shopping');
if(isset($_POST['login']))
{
	if($_POST['email']=="" && $_POST['pass']=="")
	{
		//echo "not blank";
		header("location:index.php?empty=Please Fill In The Blank");
	}
	else
	{
			$qry="SELECT * FROM `user_info` WHERE  email='".$_POST['email']."' and password='".$_POST['pass']."'";
		$run=mysqli_query($con,$qry);
		
			if($data=mysqli_fetch_array($run))
			{
			$_SESSION['uid']=$data['uid'];
			header('location:home.php');
			}
			else
			{
			//echo "fetch error";
			$_SESSION['email']=$_POST['email'];
			header("location:index.php?invalid=Please Enter Correct E-mail and Password");
			}

	}

}
else
{
echo"not working";
}	

?>
