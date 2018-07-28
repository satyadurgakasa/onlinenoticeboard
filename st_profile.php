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

$db = mysqli_connect("localhost","root","","noticeboard");

if(isset($_POST['submit']))
	{
		
		$target = "profilepics/".basename($_FILES['image']['name']);
		$tmp_loc = $_FILES['image']['tmp_name'];

		$image = $_FILES['image']['name'];
		if($image){
			move_uploaded_file($tmp_loc, $target);

		$sql = "UPDATE studentinfo SET profile='$image' WHERE regno='$user'";
		
		if(mysqli_query($db,$sql)){
			echo "Upload Sucessfully";
			header("Location:st_profile.php");
		}else{
			echo "not uploaded";
		}
		}
		
	}

$sql = "SELECT * FROM studentinfo WHERE regno = $user";

$result = mysqli_query($db,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
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
		margin-right: 200px;
		margin-top: 50px;
		border: 1px solid black;
	}
	.txt{
		color: white;
		width: 700px;
	}
	.img{
		width: 200px;
		height: 200px;
		border-radius: 50%;
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
		.btnup{
				width: 80%;
				background-color: green;
				border: 2px solid green;
				border-radius: 10px; 
				color: white;
				height: 30px;
		}
		.btnup:hover{
			background-color: #00AA00;
		}
table, th, td {
    border-bottom:  1px solid black;
    border-collapse: collapse;
    background-color: rgba(0,0,200,0.1);
    color: white;
}
		td{
			padding: 20px;
		}

	</style>
</head>
<body>
	<center><h1>PROFILE</h1></center>
	<div class="sidediv">
		<form action="st_logout.php" method="post">
			<ul class="lists" style="list-style-type:none;">
			  <li class="listing"><a href="notice_board.php" style="text-decoration: none;">Notice Board</a></li>
			  <li class="listing"><a href="results.php" style="text-decoration: none;">Results</a></li>
			  <li class="listing"><a href="attendence.php" style="text-decoration: none;">Attendence</a></li>
			  <li class="listing" style="background-color: blue;"><a href="st_profile.php" style="text-decoration: none;color: white;">Profile</a></li>
			</ul><br><br><br>
			<center><input class="btnlog" type="submit" name="submit" value="LOGOUT"></center>
		</form>
	</div>

	<div class="rightdiv">
		<table style="width:67%">
			<div style="float:right;height: 300px;width:200px;">
			<?php		
			

			while ($row = mysqli_fetch_array($result))
			{				
				if ($row['profile']) {
						echo "<img class='img' src = 'profilepics/".$row['profile']."'><br>";
					}
					else {
						echo "<img class='img' src = 'image/profile.png'><br>";
					}

					?>
<br>
		<form action="?" method="post" enctype="multipart/form-data">
			<input type="file" name="image" style="width: 100%;"><br><br>
			<input type="submit" name="submit" value="Upload Pic" class="btnup">
		</form>
<?php
				echo '</div>';
		

				echo '<tr>
						<td>Student Register ID</td>
						<td>'.$row['regno'].'</td>
					</tr>	
						<td>Name</td>
						<td>'.$row['name'].'</td>
					</tr>
						<td>Fathe Name</td>
						<td>'.$row['father'].'</td>
					</tr>
						<td>Date of Birth</td>
						<td>'.$row['dob'].'</td>
					</tr>
						<td>Year</td>
						<td>'.$row['year'].'</td>
					</tr>
						<td>Branch</td>
						<td>'.$row['branch'].'</td>
					</tr>
						<td>E-mail</td>
						<td>'.$row['email'].'</td>
					</tr>
						<td>Mobile </td>
						<td>'.$row['mobile'].'</td>
					</tr>
						<td>Address</td>
						<td>'.$row['address'].'</td>
						</tr>
	
					</tr>';
			}
		?>
	</table>
	
	</div>
	<br><br>
</body>
</html>