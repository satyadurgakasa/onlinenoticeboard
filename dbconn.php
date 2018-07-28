<?php
$conn = new mysqli("localhost", "root", "", "student_portal");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(mysqli_query($db,$sql)){
	echo "Success";
}else{
	echo "Not Success";
}
?>