<?php
session_start();
$connect = mysqli_connect("92.222.96.254","oliver","Opert213","email");
$radioVal = $_POST["profilepicture"];

$resultID = mysqli_query($connect,"SELECT id FROM users WHERE username Like '".$_SESSION['username']."'"); 
$jfeta = mysqli_fetch_assoc($resultID);

 $id = $jfeta['id'];
 $_SESSION['id'] = $id;

if($radioVal == "A.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "B.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "C.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "G.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "S.jpg")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "T.png")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "boy1.jpg")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "boy2.jpg")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "girl1.jpg")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "girl2.jpg")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "man1.jpg")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'");
else if ($radioVal == "man2.jpg")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "woman1.jpg")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 
else if ($radioVal == "woman2.jpg")
    mysqli_query($connect,"UPDATE users SET ProfilePic='".$radioVal."' WHERE id='".$id."'"); 

?>