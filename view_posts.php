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
	<title>Posts</title>
	<link rel="stylesheet" type="text/css" href="css/admin_styling.css">
	<link href='https://fonts.googleapis.com/css?family=Averia Gruesa Libre' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
	<style type="text/css">
	body{
	    background-image: url("image/bg1.png");
	    background-repeat: no-repeat;
	    background-size: cover;
	    background-attachment: fixed;
	    background-color: #aaaaaa;
	    font-family: 'Averia Gruesa Libre';
	    color: #fff0f5;
	}
	.rightdiv{
		float: right;
		width: 50%;
		height: auto; 
		margin-right: 25%;
		margin-top: 5%;
	}
	.txt{
		color: white;
		width: 700px;
	}
	.img{
		width: 700px;
	}
	.btndel{
		background-color: red;
		color: white;
		font-weight: bold; 
		height: 30px;
		width: 100px;
		border: 1px solid red; 
		border-radius: 5px;
	}
	.btndel:hover{
		background-color: #ee0000;
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
	<center><h1>MANAGE POSTS</h1></center>
	<div class="sidediv">
		<form action="ad_logout.php" method="post">
			<ul class="lists" style="list-style-type:none;">
			  <li class="listing"><a href="admin_home.php" style="text-decoration: none;">Post a Notice</a></li>
			  <li class="listing" style="background-color: blue;"><a href="view_posts.php" style="text-decoration: none;color: white;">Manage Posts</a></li>
			  <li class="listing"><a href="manage_users.php" style="text-decoration: none;">Manage Users</a></li>
			  <li class="listing"><a href="update_changes.php" style="text-decoration: none;">Upadte Profile</a></li>
			</ul><br><br><br>
			<center><input class="btnlog" type="submit" name="submit" value="LOGOUT"></center>
		</form>
	</div>


	<div class="rightdiv">
		<form action="deletepost.php" method="post">

	
			<?php
				$db = mysqli_connect("localhost","root","","noticeboard");

				$sql = "SELECT * FROM timeline ORDER BY timing DESC";
				$result = mysqli_query($db,$sql);
				while($row = mysqli_fetch_array($result)){

					echo "<p class='txt' >".$row['txtfield']."</p>";
					if ($row['img']) {
						echo "<img class='img' src = 'upload/".$row['img']."'><br>";
					}
					echo "<p style='color:white;'>".$row['timing']."</p>";

					echo '<input type="checkbox" name="delpost" value="'.$row['timing'].'" ><b style="color:red;">Delete Post Perminently</b><br>';
					echo '<input type="submit" class="btndel" name="submit" value="DELETE">';
					echo "<hr><hr>";

				}			
			?>		
		</form>		
	</div>
	<br><br>
</body>
</html>