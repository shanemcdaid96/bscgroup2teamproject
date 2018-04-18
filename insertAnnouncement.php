<?php


//Connecting to sql db.
session_start();
$connect = mysqli_connect("92.222.96.254","oliver","Opert213","email");

$resultID = mysqli_query($connect,"SELECT id FROM teacher WHERE username Like '".$_SESSION['username']."'"); 
$jfeta = mysqli_fetch_assoc($resultID);
$id = $jfeta['id'];
$_SESSION['id'] = $id;


//Sending form data to sql db.
$Title=$_POST['title'];
$Message=$_POST['message'];

$date=date('y-m-d');


mysqli_query($connect,"INSERT INTO updates (Title, UpdateMessage,Date,Teacher)
        VALUES ('$Title','$Message','$date','$id')");

header('Location:sentAnnouncements.php');
?>
