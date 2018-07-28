<?php
session_start();
$_SESSION['student']=$_POST['regno'];
include 'dbconnection.php';
$regno=$_POST['regno'];
$password=$_POST['password'];

$sql = "SELECT regno, password FROM studentinfo WHERE regno = $regno";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)  {
    while($row = mysqli_fetch_assoc($result)) {
    	if($row["regno"]===$regno && $row["password"]===$password)
    	{
    		header("Location:notice_board.php");
    	}
    	else
    	{
    		echo "Invalid user";
    	}
     }
}
$conn->close();
?>