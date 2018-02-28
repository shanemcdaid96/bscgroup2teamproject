<?php
//Connecting to sql db.
session_start();
$connect = mysqli_connect("92.222.96.254","oliver","Opert213","email");

$resultID = mysqli_query($connect,"SELECT id FROM users WHERE username Like '".$_SESSION['username']."'"); 
$jfeta = mysqli_fetch_assoc($resultID);
$id = $jfeta['id'];
$_SESSION['id'] = $id;

$resultID = mysqli_query($connect,"SELECT id FROM users WHERE username Like '".$_POST['receiver']."'"); 
$jfeta2 = mysqli_fetch_assoc($resultID);
$receiverid = $jfeta2['id'];


//Sending form data to sql db.
$Subject=$_POST['subject'];
$Message=$_POST['message'];

 $currentDate=date("Y-m-d");

mysqli_query($connect,"INSERT INTO emails (Subject, Message,Date,ReceiverID,SenderID)
VALUES ('$Subject','$Message','$currentDate','$receiverid','$id')");
?>