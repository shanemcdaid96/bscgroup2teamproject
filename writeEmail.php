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
        <form action="insert.php" method="post" enctype="multipart/form-data">
    <h3>To:</h3>
    <input type="text" name="receiver">    
    <h3>Subject:</h3>
    <input type="text" name="subject">
    <h3>Message:</h3>
    <textarea rows="20" cols="50" name="message"></textarea>
    <br>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <br>
    <input type="submit">
</form>
    </body>
</html>
