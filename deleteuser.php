<?php
session_start();

$conn = new mysqli("localhost", "root", "", "noticeboard");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$regno=$_POST['selection'];

$sql = "DELETE FROM studentinfo WHERE regno='$regno'";
$result = $conn->query($sql);

if ($result) {
    header("Location:manage_users.php");
} 
$conn->close();
?> 