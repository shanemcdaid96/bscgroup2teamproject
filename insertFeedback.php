<?php


//Connecting to sql db.
session_start();
$connect = mysqli_connect("92.222.96.254","oliver","Opert213","email");

$resultID = mysqli_query($connect,"SELECT id FROM teacher WHERE username Like '".$_SESSION['username']."'"); 
$jfeta = mysqli_fetch_assoc($resultID);
$id = $jfeta['id'];
$_SESSION['id'] = $id;

$param_username = $_POST['receiver'] . "@bsafe-email.com";

$resultID = mysqli_query($connect,"SELECT id FROM users WHERE username Like '".$param_username."'"); 
$jfeta2 = mysqli_fetch_assoc($resultID);
$receiverid = $jfeta2['id'];


//Sending form data to sql db.
$Subject=$_POST['subject'];
$Message=$_POST['message'];

$date=date('y-m-d');

$GradePercent=$_POST['grade'];

if($GradePercent==0){
mysqli_query($connect,"INSERT INTO feedback (Subject, Message,Date,ReceiverID,SenderID)
        VALUES ('$Subject','$Message','$date','$receiverid','$id')");
}
else if($GradePercent>0 && $GradePercent<=39){
mysqli_query($connect,"INSERT INTO feedback (Subject, Message,Date,ReceiverID,SenderID,Grade,GradePercentage)
        VALUES ('$Subject','$Message','$date','$receiverid','$id','F','$GradePercent')");
}

else if($GradePercent>=40 && $GradePercent<=54){
mysqli_query($connect,"INSERT INTO feedback (Subject, Message,Date,ReceiverID,SenderID,Grade,GradePercentage)
        VALUES ('$Subject','$Message','$date','$receiverid','$id','D','$GradePercent')");
}

else if($GradePercent>=55 && $GradePercent<=69){
mysqli_query($connect,"INSERT INTO feedback (Subject, Message,Date,ReceiverID,SenderID,Grade,GradePercentage)
        VALUES ('$Subject','$Message','$date','$receiverid','$id','C','$GradePercent')");
}

else if($GradePercent>=70 && $GradePercent<=84){
mysqli_query($connect,"INSERT INTO feedback (Subject, Message,Date,ReceiverID,SenderID,Grade,GradePercentage)
        VALUES ('$Subject','$Message','$date','$receiverid','$id','B','$GradePercent')");
}

else{
mysqli_query($connect,"INSERT INTO feedback (Subject, Message,Date,ReceiverID,SenderID,Grade,GradePercentage)
        VALUES ('$Subject','$Message','$date','$receiverid','$id','A','$GradePercent')");
}

header('Location:grades.php');










?>