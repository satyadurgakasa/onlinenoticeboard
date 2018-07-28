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

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin profile</title>
	<link rel="stylesheet" type="text/css" href="css/admin_styling.css">
	<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
	<style type="text/css">
	body{
    	background-image: url("image/bg1.png");
   		 background-repeat: no-repeat;
    	 background-size: cover;
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


	</style>
</head>
<body>
	<div class="topdiv">
		<center><h1>ADMIN PROFILE</h1></center>
	</div>
	<div class="sidediv">
		<form action="ad_logout.php" method="post">
			<ul class="lists" style="list-style-type:none;">
			  <li class="listing"><a href="admin_home.php" style="text-decoration: none;">Post a Notice</a></li>
			  <li class="listing"><a href="view_posts.php" style="text-decoration: none;">Manage Posts</a></li>
			  <li class="listing"><a href="manage_users.php" style="text-decoration: none;">Manage Users</a></li>
			  <li class="listing" style="background-color: blue;"><a href="update_changes.php" style="text-decoration: none;color: white;">Upadte Profile</a></li>
			</ul><br><br><br>
			<center><input class="btnlog" type="submit" name="submit" value="LOGOUT"></center>
		</form>
		
	</div>
</body>
</html>