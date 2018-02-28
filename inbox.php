<!DOCTYPE html>
<html>
<body>
<?php
session_start();


$connection = mysqli_connect("92.222.96.254","oliver","Opert213");
mysqli_select_db($connection,"email");

$resultID = mysqli_query($connection,"SELECT id FROM users WHERE username Like '".$_SESSION['username']."'"); 
 $jfeta = mysqli_fetch_assoc($resultID);


 $id = $jfeta['id'];
 $_SESSION['id'] = $id;

print('<table border=1>');

$result = mysqli_query($connection, "SELECT * FROM emails Where ReceiverID=".$id."");

echo $_SESSION['username'];

	print('<tr>');
	
	print('<th>');
  	print("SubjectID");
  	print('</th>');
	print('<th>');
  	print("Subject");
  	print('</th>');
  	print('<th>');
  	print("Date");
  	print('</th>');
  	print('<th>');
  	print("Message");
  	print('</th>');

	print ('</tr>');
	
	while($row=mysqli_fetch_array($result)){
	
	print('<tr>');

	print('<td>');
	print('<a href="">');	
  	print($row['SubjectID']);
	print('</a>');
  	print('</td>');
	print('<td>');
  	print($row['Subject']);
  	print('</td>');
  	print('<td>');
	print($row['Date']);
  	print('</td>');
  	print('<td>');
	print($row['Message']);
  	print('</td>');
	
		
	print ('</tr>');
  }

mysqli_close($connection);

print('</table>');
?>


</body>
</html>