<?php
session_start();
if(!$_SESSION['user'])
{
	$loginError = "You're not logged in.";
	echo $loginError;
	include 'admin.html';
	exit();
}

$user = $_SESSION['user'];
	if(isset($_POST['submit']))
	{

		$target = "upload/".basename($_FILES['img']['name']);
		$tmp_loc = $_FILES['img']['tmp_name'];

		$db = mysqli_connect("localhost","root","","noticeboard");

		$image = $_FILES['img']['name'];
		$txt = $_POST['txt'];

		move_uploaded_file($tmp_loc, $target);

		$sql = "INSERT INTO timeline (txtfield,img) VALUES ('$txt','$image')";
		

		if(mysqli_query($db,$sql)){
			echo "Upload Sucessfully";
			header("Location:admin_home.php");
		}else{
			echo "not uploaded";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Post Notice</title>
	<link rel="stylesheet" type="text/css" href="css/admin_styling.css">
	<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Averia Gruesa Libre' rel='stylesheet'>
	<style type="text/css">
	body{
		    background-image: url("image/bg1.png");
		    background-repeat: no-repeat;
		    background-color: #aaaaaa;
		    background-size: cover;
		    background-attachment: fixed;
		    color: #fff0f5;
		    font-family: 'Averia Gruesa Libre';
		}
		.btnsub{
			float: right;
			height: 40px;
			width: 100px;
			border-radius: 5px;
			background-color: #008000;
			color: white;
			font-family: 'Averia Gruesa Libre';
			font-weight: bold;
			font-size: 20px;
		}
		.btnsub:hover{
			background-color: #005000;
		}
		.btnlog{
			height: 40px;
			width: 100px;
			border-radius: 5px;
			background-color: #880000;
			color: white;
			font-family: 'Averia Gruesa Libre';
			font-weight: bold;
			font-size: 20px;
		}
		.btnlog:hover{
			background-color: red;
		}
		.txting{
			width: 100%;
		}
		.rightdiv{
			float: right;width: 50%;
			height: auto; 
			margin-right: 25%;
			margin-top: 5%;
		}
	</style>
</head>
<body>
	<center><h1>NOTICE BOARD</h1></center>
	<div class="sidediv">
		<form action="ad_logout.php" method="post">
			<ul class="lists" style="list-style-type:none;">
			  <li class="listing" style="background-color: blue;"><a href="admin_home.php" style="text-decoration: none;color: white;">Post a Notice</a></li>
			  <li class="listing"><a href="view_posts.php" style="text-decoration: none;">Manage Posts</a></li>
			  <li class="listing"><a href="manage_users.php" style="text-decoration: none;">Manage Users</a></li>
			  <li class="listing"><a href="update_changes.php" style="text-decoration: none;">Upadte Profile</a></li>
			</ul><br><br><br>
			<center><input class="btnlog" type="submit" name="submit" value="LOGOUT"></center>
		</form>
	</div>
	
		<div class="rightdiv">
			<br><br>
			 <form action="?" method="post" enctype="multipart/form-data">
			 <input type="hidden" name="size" value="1000000">
			<textarea name="txt" class="txting" cols="70" rows="7" placeholder="Enter Text (maximum 200 word)"></textarea><br><br>
			<h3>Post Image :</h3>
			<input type="file" name="img" class="uploadfile" /><br><br>
			<br>
			<input type="submit" name="submit" value="POST" class="btnsub"><br><br>
			</form>
		</div>
	
</body>
</html>