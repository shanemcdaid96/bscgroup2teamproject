      <?php
session_start();
$connection = mysqli_connect("92.222.96.254","oliver","Opert213");
mysqli_select_db($connection,"email");

$resultID = mysqli_query($connection,"SELECT id FROM users WHERE username Like '".$_SESSION['username']."'"); 
 $jfeta = mysqli_fetch_assoc($resultID);


 $id = $jfeta['id'];
 $_SESSION['id'] = $id;

$resultPassword = mysqli_query($connection,"SELECT password from users WHERE id='" . $id . "'");
 $jfeta2 = mysqli_fetch_assoc($resultPassword);
  $password = $jfeta2['password'];
  //$password = password_hash($password, PASSWORD_DEFAULT);


if($_POST['new'] == $_POST['confirmNew']) {
	$newpassword=password_hash($_POST['new'],PASSWORD_DEFAULT);
mysqli_query($connection,"UPDATE users SET password='".$newpassword."' WHERE id='" . $id . "'" );
 $message = "Password Changed";
 header('Location: index.php'); 

  
} else{
 $message = "Current Password is not correct";
 echo "<script type='text/javascript'>alert('$message');</script>";
 
 

}
?>