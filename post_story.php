<?php
session_start();


if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false){
        $img = $_FILES['img']['tmp_name'];
        $imgContent = addslashes(file_get_contents($img));


include 'dbconnection.php';
$txt=$_POST['txt'];
$txtfield=$_POST['txtfield'];

 $sql = $conn->query("INSERT into timeline (txtfield, img, txtfiles) VALUES ('$txt', '$imgContent','$txtfield')");
        if($insert){
           echo "<script type=\"text/javascript\">".
        "alert('Register Success');".
        "</script>";
         header("Location: admin_home.php");
        }else{
            echo "File upload failed, please try again.";
        } 

}
}
?>