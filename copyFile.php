<?php   
//This is the directory where files will be saved  
$target = "Lessons/";
$target = $target . basename( $_FILES['fileToUpload']['name']);

//This gets all the other information from the form  
$file1=($_FILES['fileToUpload']['name']);

// Connects to your Database  
$connect = mysqli_connect("92.222.96.254","oliver","Opert213","email");
//Writes the information to the database
mysqli_query($connect,"INSERT INTO lessons(LessonName) VALUES ('$file1')") ;

//Writes the photo to the server
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target))  {
//Tells you if its all ok  
$message="The file ". basename( $_FILES['fileToUpload']['name']). "has been uploaded,        and your information has been added to the directory"; 
echo "<script type='text/javascript'>alert('$message');</script>"; }
else {   
$message= "Sorry, there was a problem uploading your file.";
echo "<script type='text/javascript'>alert('$message');</script>";   
   }

header('Location:lessons.php');
?>