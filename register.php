<?php
// Include config file
require_once 'Databaseinfo.php';

if (isset($_SESSION['errors']))
{
    header("location: loggedin.php");
}
error_reporting(0);
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         }
        // Close statement
        //mysqli_stmt_close($stmt);

    }
    
    // Validate password
   // if (isset($_POST['password'])){
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    //}


    // Validate confirm password
  // if (isset($_POST['confirm_password'])){
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
//}
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password,name) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $username);
            
            // Set parameters
            //$user_type = ('student');
            $param_username = $username . "@bsafe-email.com";
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            //$param_password = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        
         }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);

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
        <div class="w-form">
          <form id="email-form" name="email-form" data-name="Email Form" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
       
       
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <!--<label>Username</label>-->
            <input type="text" class="w-input-email" maxlength="256" name="username"  placeholder="Username" id="email" required="" value="<?php echo $username; ?>">
            <input class="w-input-email" placeholder="@bsafe-email.com" readonly>                

            <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
               <!-- <label>Password</label> -->
                <input placeholder="Password" type="password" name="password" class="w-input" value="<?php echo $password; ?>">
                <!--<span class="help-block"><?php echo $password_err; ?></span> -->
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <!-- <label>Confirm Password</label> -->
                <input placeholder="Confirm Password" class="w-input" type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <center><span class="help-block" ><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="submit-button w-button" value="Submit">
                
            </div>
            <center><p>Already have an account? <a href="index.php">Login here</a>.</p></center>
        </form>
    </div>    
</body>
</html>