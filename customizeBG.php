<?php
session_start();
$connect = mysqli_connect("92.222.96.254","oliver","Opert213","email");
$radioVal = $_POST["bgpicture"];

$resultID = mysqli_query($connect,"SELECT id FROM users WHERE username Like '".$_SESSION['username']."'"); 
$jfeta = mysqli_fetch_assoc($resultID);

 $id = $jfeta['id'];
 $_SESSION['id'] = $id;

if($radioVal == "bg-1.jpg")
    mysqli_query($connect,"UPDATE users SET BackgroundImg='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "bg-2.jpg")
    mysqli_query($connect,"UPDATE users SET BackgroundImg='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "bg-3.jpg")
    mysqli_query($connect,"UPDATE users SET BackgroundImg='".$radioVal."' WHERE id='".$id."'"); 


?>