<?php
$target_dir = "../ui/uploads/";
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



// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    header('Location: sent.php'); 

    $uploadOk = 0;
}

//Connecting to sql db.
session_start();
$connect = mysqli_connect("92.222.96.254","oliver","Opert213","email");

$resultID = mysqli_query($connect,"SELECT id FROM users WHERE username Like '".$_SESSION['username']."'"); 
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

 $currentDate=date("Y-m-d" );
$banned=array();
array_push($banned,'bugger','bum', 'poo', 'fuck', 'pussy', 'shit', 'prick', 'cunt', 'anal', 'anus', 'arse', 'ass');
array_push($banned,'ballsack', 'balls', 'bastard', 'bitch', 'biatch', 'bloody', 'blowjob', 'bollock', 'boner', 'boob');
array_push($banned,'butt', 'buttplug', 'clitoris', 'cock', 'coon', 'crap', 'cunt', 'damn', 'dick', 'dildo', 'dyke');
array_push($banned,'fag', 'feck', 'fellate', 'fellatio', 'felching', 'fuck', 'fudgepacker', 'flange', 'Goddamn', 'hell');
array_push($banned,'homo', 'jerk', 'jizz', 'knobend', 'labia', 'muff', 'nigger', 'nigga', 'omg', 'penis', 'piss', 'poop');
array_push($banned,'prick', 'pube', 'queer', 'scrotum', 'sex', 'slut', 'smegma', 'spunk', 'tit', 'tosser', 'turd', 'twat');
array_push($banned,'vagina', 'wank', 'whore');

$arr = explode(' ', $Message);

foreach($arr as $key => $word)
{
    $word = str_replace('.', '', strip_tags($word));
    if(in_array($word, $banned))
    {
        $arr[$key] = '*****';
    }
}

$output = implode(' ', $arr);
//echo $output;

  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    mysqli_query($connect,"INSERT INTO emails (Subject, Message,Date,ReceiverID,SenderID,Approve)
    VALUES ('$Subject','$output','$currentDate','$receiverid','$id','No')");

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        mysqli_query($connect,"INSERT INTO emails (Subject, Message,Date,ReceiverID,SenderID,Approve)
         VALUES ('$Subject','$Message','$currentDate','$receiverid','$id','No')");

         $idemail=mysqli_insert_id($connect); 

     mysqli_query($connect,"INSERT INTO attachments (Filename,IDemail)
    VALUES ('$Filename','$idemail')") ;

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}









?>