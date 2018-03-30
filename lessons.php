<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Example of HTML Download Links</title>
</head>
<body>
    <?php
     $connection = mysqli_connect("92.222.96.254","oliver","Opert213");
      mysqli_select_db($connection,"email");

print('<ol>');

$result = mysqli_query($connection, "SELECT * FROM  lessons Order by LessonID");


    while($row=mysqli_fetch_array($result)){

     print('<li><a href="Lessons/'.$row['LessonName'].'">'.$row['LessonName'].'</a></li>');
          print('<br>');
     
  }

mysqli_close($connection);

print('</ol>');
print('<form action="copyFile.php" method="post" enctype="multipart/form-data">');
print('<input type="file" name="fileToUpload" id="fileToUpload">');
    print('<br>');
    print('<br>');
    print('<input type="submit">');

print('</form>');

    ?>

</body>
</html>                            