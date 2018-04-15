<?php
// Include config file
require_once 'Databaseinfo.php';
session_start();
 if(isset($_SESSION["username"]))  
 {  
      header("location:inbox.php");  
 } 

 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username . "@bsafe-email.com";
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;  
                            $_SESSION['id'] = $id;  
                            $_SESSION['name'] = $name;  
                            $_SESSION['role'] =2;
                            header("location: inbox.php");
                             if(isset($_SESSION["username"]))  
                              {  
                              header("location:inbox.php");  
                                } 
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Wed Feb 14 2018 12:58:24 GMT+0000 (UTC)  -->
<html data-wf-page="5a84198463b7e50001e365e7" data-wf-site="5a84198463b7e50001e365e6">
<head>
  <meta charset="utf-8">
  <title>Bsafe</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/custom.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/loop-d2a242-f9fcb5a64213c8fd3510148bf02.webflow.css" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
</head>
<body class="body">
  <div class="row w-row">
    <div class="w-col w-col-3 w-col-medium-3"></div>
    <div class="column w-col w-col-6 w-col-medium-6">
      <div class="div-block">
        <center><h2>Student Login</h2></center>
        <div class="w-form">
          <form id="email-form" name="email-form" data-name="Email Form" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <input type="text" class="w-input-email" maxlength="256" name="username"  placeholder="Username" id="email" required="" value="<?php echo $username; ?>">
            <input class="w-input-email"  placeholder="@bsafe-email.com" readonly>

            <input type="password" class="w-input" maxlength="256" name="password" data-name="password" placeholder="Password" id="password" required="">

            <input type="submit" value="Login" data-wait="Please wait..." class="submit-button w-button"><br>

            <p style="text-align:center">Don't have a student account? <a style="text-align:center" href="register.php">Register Here!</a></p>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"></div>
            <center><p><a href="index1.php">Teacher Login / Register</a></p></center>
            <div id="myModal" class="modal">


 <!--  <div class="modal-content">
    <span class="close">&times;</span>
    <p>To reset your password contact the teacher</p>
  </div> -->
</div>


            </form>
          
          
        </div>
      </div>
    </div>
    <div class="w-col w-col-3 w-col-medium-3"></div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <script src="js/custom.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>