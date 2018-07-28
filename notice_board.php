<?php
session_start();
if(!$_SESSION['student'])
{
	$loginError = "You're not logged in.";
	echo $loginError;
	include 'NoticeBoard.html';
	exit();
}

$user = $_SESSION['student'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Notice Board</title>
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
	<center><h1>NOTICE BOARD</h1></center>
	<div class="sidediv">
		<form action="st_logout.php" method="post">
			<ul class="lists" style="list-style-type:none;">
			  <li class="listing" style="background-color: blue;"><a href="notice_board.php" style="text-decoration: none;color: white;">Notice Board</a></li>
			  <li class="listing"><a href="results.php" style="text-decoration: none;">Results</a></li>
			  <li class="listing"><a href="attendence.php" style="text-decoration: none;">Attendence</a></li>
			  <li class="listing"><a href="st_profile.php" style="text-decoration: none;">Profile</a></li>
			</ul><br><br><br>
			<center><input class="btnlog" type="submit" name="submit" value="LOGOUT"></center>
		</form>
	</div>


	<div class="rightdiv">

	
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

					echo "<hr><hr>";

				}			
			?>			
	</div>
	<br><br>
</body>
</html>