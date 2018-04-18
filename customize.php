<?php
session_start();
$connect = mysqli_connect("92.222.96.254","oliver","Opert213","email");
$radioVal = $_POST["profilepicture"];

$resultID = mysqli_query($connect,"SELECT id FROM users WHERE username Like '".$_SESSION['username']."'"); 
$jfeta = mysqli_fetch_assoc($resultID);

 $id = $jfeta['id'];
 $_SESSION['id'] = $id;

if($radioVal == "boy1.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "boy2.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "boy3.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'");  
else if ($radioVal == "boy4.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "boy5.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "boy6.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "girl1.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "girl2.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "girl3.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "girl4.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'");
else if ($radioVal == "girl5.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "girl6.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
header('Location: inbox.php'); 

?>