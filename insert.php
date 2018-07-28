<?php
session_start();
$_SESSION['user']=$_POST['regno'];
include 'dbconnection.php';
$regno=$_POST['regno'];
$name=$_POST['name'];
$father=$_POST['father'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$year=$_POST['year'];
$branch=$_POST['branch'];
$mail=$_POST['email'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$password=$_POST['password'];

if($regno && $name && $father && $gender && $mail && $mobile && $address && $password)
{
	$sql = "INSERT INTO studentinfo VALUES ('$regno', '$name', '$father', '$gender', '$dob' , '$year', '$branch', '$mail', '$mobile', '$address', '$password','')";

if ($conn->query($sql) === TRUE) {
     
        echo "<script>
alert('Register Successful');
window.location.href='NoticeBoard.html';
</script>";
        

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}else{
	echo "<script>
alert('Fill all the details');
window.location.href='register.html';
</script>";

}



$conn->close();
?>