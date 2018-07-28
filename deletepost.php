<?php
session_start();
$conn = new mysqli("localhost", "root", "", "noticeboard");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$timing=$_POST['delpost'];

$sql = "DELETE FROM timeline WHERE timing='$timing'";
$result = $conn->query($sql);

if ($result) {
    header("Location:view_posts.php");
} 
$conn->close();
?> 