<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'noticeboard'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * FROM timeline';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Posts</title>
	<link rel="stylesheet" type="text/css" href="css/admin_styling.css">
	<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
	<style type="text/css">
	body{
    background-image: url("image/bg1.png");
    background-repeat: no-repeat;
     background-size: cover;
}
.tl{
	float: right;
	border: 1px solid black;
	width: 1100px;
	height: 500px;
	margin-top: 70px;
}

	</style>
</head>
<body>
	<div class="topdiv">
		<center><h1>MANAGE POSTS</h1></center>
	</div>
	<div class="sidediv">
		<ul class="lists" style="list-style-type:none;">
		  <li class="listing"><a href="admin_home.php" style="text-decoration: none;">Post a Notice</a></li>
		  <li class="listing" style="background-color: blue;"><a href="view_posts.html" style="text-decoration: none;color: white;">Manage Posts</a></li>
		  <li class="listing"><a href="manage_users.php" style="text-decoration: none;">Manage Users</a></li>
		  <li class="listing"><a href="update_changes.html" style="text-decoration: none;">Upadte Profile</a></li>
		</ul>
	</div>

	<div class="tl">

		<?php
			while ($row = mysqli_fetch_array($query))
			{				
				echo '<p>'.$row['txtfield'].'</p><br>'
				.$row['img'].'<br>'
				.$row['txtfiles'].'<br>'

			}
			?>
		
	</div>
</body>
</html>