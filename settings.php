<?php
// Initialize the session
session_start();
 
$connection = mysqli_connect("92.222.96.254","oliver","Opert213");
mysqli_select_db($connection,"email");

$resultID = mysqli_query($connection,"SELECT name FROM users WHERE username Like '".$_SESSION['username']."'"); 
            $jfeta = mysqli_fetch_assoc($resultID);
            $name = $jfeta['name'];
            $_SESSION['name'] = $name;
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}
?>



<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Bsafe Email - Settings</title>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <div class="navbar navbar-fixed-top navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Welcome <?php echo $name ?></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                
                
                <li><a href="Logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>



            </ul>
        </div>
        <!-- /.nav-collapse -->
    </div>
    <!-- /.container -->
</div>
<!-- /.navbar -->

<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">
       <div class="col-xs-2 col-sm-1 sidebar-offcanvas" id="sidebar" role="navigation"> 
            <div class="sidebar-nav">
                <ul class="nav">
<li><a href="writeEmail.php"><i class="fas fa-pencil-alt"></i> Compose</a></li>
                    
                    <li><a href=#><i class="fas fa-inbox"></i> Inbox</a></li>
                    <li><a href="sentPage.php"><i class="fas fa-share-square"></i> Sent</a></li>
                    <li><a href="settings.php"><i class="fas fa-cog"></i> Settings</a></li>
                   <!--<li><a href="#">Inbox</a></li>-->
                    
                </ul>
            </div>            <!--/.well -->
        </div>
        <!--/span-->

        <div class="inboxMessages">

<script type="text/javascript">
    function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}
</script>





</div>
    </div>
    <!--/row-->

    <hr>

    <footer>
        <p>© Bsafe 2018</p>
    </footer>

</div>
<!--/.container-->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
