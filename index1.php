 <?php 
 error_reporting(0);
  
 $connect = mysqli_connect("92.222.96.254","oliver","Opert213","email");  
 session_start();  
 // if(isset($_SESSION["username"]))  
 // {  
 //      header("location:entry.php");  
 // }  
 // if(isset($_POST["register"]))  
 // {  
 //      if(empty($_POST["username"]) || empty($_POST["password"]))  
 //      {  
 //           echo '<script>alert("Both Fields are required")</script>';  
 //      }  
 //      else  
 //      { 
 //        $p_username = $_POST['username'] . "@bsafe-email.com";
 //        $sql="SELECT * FROM teacher WHERE username ='".$p_username."'";
 //        $result=mysqli_query($connect,$sql);
 //        if(mysqli_num_rows($result)>=1){
 //          echo"name already taken";
 //        }
 //        else{
 //           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
 //           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
 //           $hashpassword = password_hash($password, PASSWORD_DEFAULT);  
 //           $param_username = $username . "@bsafe-email.com";
 //           $query = "INSERT INTO teacher(username, password,name) VALUES('$param_username', '$hashpassword','$username')";  
 //           if(mysqli_query($connect, $query))  
 //           {  
 //                echo '<script>alert("Registration Done")</script>';  
 //            } 
 //           } 
 //      }  
 // }  
 // if(isset($_POST["login"]))  
 // {  
 //      if(empty($_POST["username"]) || empty($_POST["password"]))  
 //      {  
 //           echo '<script>alert("Both Fields are required")</script>';  
 //      }  
 //      else  
 //      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $hashpassword = password_hash($password, PASSWORD_DEFAULT); 
           $param_username = $username . "@bsafe-email.com";
           $query = "SELECT * FROM teacher WHERE username = '$param_username'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $hashpassword))  
                     {  
                          session_start();
                          $_SESSION['username'] = $username;  
                          $_SESSION['id'] = $id;  
                          $_SESSION['name'] = $name;  
                          $_SESSION['role'] =1;
                          header("location:/ui/teacher/UIapproveEmail.php");  
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Wrong User Details")</script>';  
                     }  
                }  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
 //      }  
 // }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head> 
      <style type="text/css">
        body {
    background-image: url("images/maxresdefault.jpg");
     background-repeat: no-repeat;
     background-size: cover;
}
#form_div{
  width:500px;
  margin:0 auto;
}
      </style> 
      <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/loop-d2a242-f9fcb5a64213c8fd3510148bf02.webflow.css" rel="stylesheet" type="text/css">
           <title>Bsafe-Teacher Login/Register</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           
                <br />  
                
                <h2 align="center" style="margin-top: 300px">Teacher Login</h2>  
                <br />  
                <form method="post" id="form_div">  
                     
                      <input placeholder="Username" type="text" name="username" maxlength="256" class="w-input-email" /> 
                      <input class="w-input-email"  placeholder="@bsafe-email.com" readonly> 
                     <br />  
                     <input placeholder="Password" type="password" name="password" class="form-control" />  
                     <br />  
                     <!--<input type="submit" name="login" value="Login" class="btn btn-info" /> -->
                     <input type="submit" class="submit-button w-button" value="Login"> 
                     <br />  
                     <p align="center"><a href="teacherRegister.php">Register</a></p>  
                </form>  
                
 
                
           </body>  
 </html> 