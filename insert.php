<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$Filename=basename($_FILES["fileToUpload"]["name"]);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
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

  mysqli_query($connect,"INSERT INTO attachments (Filename)
    VALUES ('$Filename')") ;

?>