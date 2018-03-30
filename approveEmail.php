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

<body>
<h1> Approve Email </h1>
<hr>

<?php
$connect = mysqli_connect("92.222.96.254","oliver","Opert213","email");
$result=mysqli_query($connect,"select * from emails where Approve='No'");

          print('<table>');
    print('<tr>');
    print('<th>From</th>');
    print('<th>Subject</th>');
    print('<th>Date</th>');
    print('<th>Message</th>');
    print('<th>Delete</th>');
    print('<th>Approve?</th>');
    print ('</tr>');
   


          while($row=mysqli_fetch_array($result))

          {
            
    print('<tbody>');
    print('<tr>');   
    $result2 = mysqli_query($connect, "SELECT username FROM users Where id=".$row['SenderID']."");
    $row2=mysqli_fetch_array($result2);
    print('<td class="column1">');
    print('<a href="viewFull.php?SubjectID='.$row['SubjectID'].'">');
    print($row2['username']);  
    print('</a>');  
    print('</td>');
    print('<td class="column2">');
    print('<a href=viewFull.php?SubjectID='.$row['SubjectID'].'>');
    print($row['Subject']);
    print('</a>');
    print('</td>');
    print('<td class="column3">');
    print('<a href=viewFull.php?SubjectID='.$row['SubjectID'].'>');
    print($row['Date']);
    print('</a>');
    print('</td>');
    print('<td class="column4">');
    print('<a href=viewFull.php?SubjectID='.$row['SubjectID'].'>');
    print substr($row['Message'],0,150);
    print('</a>');
    print('</td>');
    print('<td class="column6">');
    print('<a href="delete.php?id='.$row['SubjectID'].'"><img src=deleteEmail.png width=35 height=35></a>');
    print('</td>');
    print('</td>');
    print('<td class="column6">');
    print('<a href="approve.php?id='.$row['SubjectID'].'"><img src=approveEmail.png width=35 height=35></a>');
    print('</td>');
      
      print ('</tr>');

          }

    print('</table>');





?>
<hr>

<hr>
</body>

</html>