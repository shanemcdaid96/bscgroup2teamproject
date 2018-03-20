<!DOCTYPE html>
<html>
<body>
<?php
session_start();


$connection = mysqli_connect("92.222.96.254","oliver","Opert213");
mysqli_select_db($connection,"email");

$resultID = mysqli_query($connection,"SELECT id FROM teacher WHERE username Like '".$_SESSION['username']."'"); 
 $jfeta = mysqli_fetch_assoc($resultID);


 $id = $jfeta['id'];
 $_SESSION['id'] = $id;

print('<table border=1>');

$result = mysqli_query($connection, "SELECT * FROM feedback Where SenderID=".$id."");


	print('<tr>');
	print('<th>');
    print("Student");
    print('</th>');
	print('<th>');
  	print("FeedbackID");
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
   $result2 = mysqli_query($connection, "SELECT username FROM users Where id=".$row['ReceiverID']."");
    $row2=mysqli_fetch_array($result2);
	
	print('<tr>');
  print('<td>');
  print($row2['username']);
  print('</td>');
	print('<td>');
	print('<a href="">');	
  	print($row['FeedbackID']);
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