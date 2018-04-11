<!DOCTYPE html>
<html>
    <head>    
        <title>Form linked to database</title>
    </head>
    <body>
      <?php
      session_start();

        #PHP Source Code
        require "phpspellcheck/include.php";

        $mySpell = new SpellCheckButton();
        $mySpell->InstallationPath = "/phpspellcheck/";
        $mySpell->Fields = "ALL";
        echo $mySpell->SpellImageButton();


        $mySpell = new SpellAsYouType();
        $mySpell->InstallationPath = "/phpspellcheck/";
        $mySpell->Fields = "ALL";
        echo $mySpell->Activate();
  
      ?>
        <form action="insertAnnouncement.php" method="post">
    <h3>Title:</h3>
    <input type="text" name="title">
    <h3>Announcement:</h3>
    <textarea rows="20" cols="50" name="message"></textarea>
    <br>
    <br>
     <input type="submit">
</form>
    </body>
</html>
