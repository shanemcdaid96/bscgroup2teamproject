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
        <form action="insertFeedback.php" method="post">
    <h3>Student:</h3>
    <input type="text" name="receiver"><input class="w-input-email"  placeholder="@bsafe-email.com" readonly>  
    <h3>Subject:</h3>
    <input type="text" name="subject">
    <h3>Feedback:</h3>
    <textarea rows="20" cols="50" name="message"></textarea>
    <br>
    <br>
    <h3>Grade:</h3>
    <input type="number" name="grade" min="0" max="100">
    <br>
    <br>
    <input type="submit">
</form>
    </body>
</html>
