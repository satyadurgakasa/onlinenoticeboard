<?php
session_start();

$user = $_SESSION['student'];
if(isset($_POST['submit']))
	{
		$target = "profilepics/".basename($_FILES['image1']['name']);
		$tmp_loc = $_FILES['image1']['tmp_name'];

		$db = mysqli_connect("localhost","root","","noticeboard");

		$image = $_FILES['image1']['name'];
		move_uploaded_file($tmp_loc, $target);

		$sql = "UPDATE studentinfo SET profile=$image WHERE regno=$user";
		

		if(mysqli_query($db,$sql)){
			echo "Upload Sucessfully";
			header("Location:st_profile.php");
		}else{
			echo "not uploaded";
		}
	}

?>