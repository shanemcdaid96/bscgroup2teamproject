<!DOCTYPE html>
<html>
    <head>    
        <title>Form linked to database</title>
    </head>
    <body>
      <?php
      session_start();
  
      ?>
        <form action="insert.php" method="post">
    <h3>To:</h3>
    <input type="text" name="receiver">    
    <h3>Subject:</h3>
    <input type="text" name="subject">
    <h3>Message:</h3>
    <textarea rows="20" cols="50" name="message"></textarea>
    <input type="submit">
</form>
    </body>
</html>
