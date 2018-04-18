<?php
$id = $_GET['id'];

$connection = mysqli_connect("92.222.96.254","oliver","Opert213");
mysqli_select_db($connection,"email");

$sql="DELETE FROM emails Where SubjectID='".$id."'"; 
 if (mysqli_query($connection, $sql)) {
    mysqli_close($connnection);
    header('Location: inbox.php'); 
    exit;
} else {
    echo "Error deleting record";
}
?>