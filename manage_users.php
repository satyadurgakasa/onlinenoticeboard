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

$conn = mysqli_connect("localhost", "root", "", "noticeboard");
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * FROM studentinfo';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="css/admin_styling.css">
	<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
	<style type="text/css">
	body{
	    background-image: url("image/bg1.png");
	    background-repeat: no-repeat;
	    background-attachment: fixed;
	    background-size: cover;
	    background-color: #aaaaaa;
	    color: #fff0f5;
	    font-family: 'Averia Gruesa Libre';
	}
	.btndel{
		float: right;
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
			table, th, td {
    border:  1px solid black;
    border-collapse: collapse;
    background-color: rgba(0,0,200,0.1);
    color: white;
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
		<center><h1>MANAGE USERS</h1></center>
	<div class="sidediv">
		<form action="ad_logout.php" method="post">
			<ul class="lists" style="list-style-type:none;">
			  <li class="listing"><a href="admin_home.php" style="text-decoration: none;">Post a Notice</a></li>
			  <li class="listing"><a href="view_posts.php" style="text-decoration: none;">Manage Posts</a></li>
			  <li class="listing" style="background-color: blue;"><a href="manage_users.php" style="text-decoration: none;color: white;">Manage Users</a></li>
			  <li class="listing"><a href="update_changes.php" style="text-decoration: none;">Upadte Profile</a></li>
			</ul><br><br><br>
			<center><input class="btnlog" type="submit" name="submit" value="LOGOUT"></center>
		</form>
		
	</div>

	<div style="float: right;width: 80%;height: auto;margin-top: 5%;background-color: rgba(0,0,255.0.2);">
		<form action="deleteuser.php" method="post">
			
		

		<table style="width:100%">
		  <tr>
		    <th>regno</th>
		    <th>Name</th> 
		    <th>Father</th>
		    <th>Gender</th>
		    <th>DOB</th> 
		    <th>Year</th>
		    <th>Branch</th>
		    <th>E-mail</th> 
		    <th>Mobile</th>
		    <th>Address</th>
		    <th>Password</th> 
		    <th>Select</th>
		  </tr>


		<?php
			while ($row = mysqli_fetch_array($query))
			{				
				echo '<tr>
						<td>'.$row['regno'].'</td>
						<td>'.$row['name'].'</td>
						<td>'.$row['father'].'</td>
						<td>'.$row['gender'].'</td>
						<td>'.$row['dob'].'</td>
						<td>'.$row['year'].'</td>
						<td>'.$row['branch'].'</td>
						<td>'.$row['email'].'</td>
						<td>'.$row['mobile'].'</td>
						<td>'.$row['address'].'</td>
						<td>'.$row['password'].'</td>
		
						<td><input type="checkbox" name="selection" value="'.$row['regno'].' " ></td>
	
					</tr>';
			}
		?>
		</table><br>
		<input type="submit" name="submit" value="DELETE" class="btndel">
		</form>
	</div>
</body>
</html>