<!DOCTYPE html>
<html>
<heading>
</heading>
<style>
#heading{border-bottom: 1px solid #000000;}
#footer{text-align: center;
        margin-left: auto;
        margin-right: auto;}
</style>
<script src="grade.js">
</script>
<body>
<h1> Student Grades </h1>
<hr>

<?php
$connect = mysqli_connect("92.222.96.254","oliver","Opert213","email");
$result=mysqli_query($connect,"select Distinct ReceiverID from feedback");


          print('User:<select name="user" id="userSelected">');
          print('<option value="AllUsers">All </option>');


          while($row=mysqli_fetch_array($result))

          {
            $result2=mysqli_query($connect,"select * from users where id='".$row['ReceiverID']."'");
            $row2=mysqli_fetch_array($result2);

          print("<option value='".$row['ReceiverID']."'>".$row2['username']. "</option>");

          }

          mysqli_close($connection);

          print('</select>');

          print('<input id="find" type="submit" value="Find">');



?>
<hr>
<div id="myDiv">
</div>
<hr>
</body>

</html>