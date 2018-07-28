<?php
session_start();

$conn = new mysqli("localhost", "root", "", "noticeboard");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$_SESSION['user']=$_POST['adminid'];

$adminid=$_POST['adminid'];
$password=$_POST['password'];

$sql = "SELECT adminid, password FROM admin1 WHERE adminid = '$adminid'";
$result = $conn->query($sql);

if ($result->num_rows > 0)
 {

    while($row = $result->fetch_assoc()) 
    {
        if($row["adminid"]===$adminid && $row["password"]===$password)
        {
           header("Location:admin_home.php");
        }
        else
        {
           echo "Invalid credentials";
           header("Location:admin.html");
        }
    }
  } 
$conn->close();
?> 