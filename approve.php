<?php
$id = $_GET['id'];

$connection = mysqli_connect("92.222.96.254","oliver","Opert213");
mysqli_select_db($connection,"email");

$sql="UPDATE emails SET Approve='Yes' Where SubjectID='".$id."'"; 
 if (mysqli_query($connection, $sql)) {
    mysqli_close($connnection);
    header('Location: approveEmail.php'); 
    exit;
} else {
    echo "Error approving record";
}
?>