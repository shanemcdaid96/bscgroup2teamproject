<?php
// Initialize the session
session_start();
 $connection1 = mysqli_connect("92.222.96.254","oliver","Opert213");
mysqli_select_db($connection1,"email");
$resultID = mysqli_query($connection1,"SELECT name FROM users WHERE username Like '".$_SESSION['username']."'"); 
            $jfeta = mysqli_fetch_assoc($resultID);
            $name = $jfeta['name'];
            $_SESSION['name'] = $name;
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}

//Get email ID to display the record
//$id = $_GET['id'];

$connection = mysqli_connect("92.222.96.254","oliver","Opert213");
mysqli_select_db($connection,"email");

//$sql="SELECT all FROM emails Where SubjectID='".$id."'"; 
 
?>

<html lang="en">
<head>
  
  <title>Bsafe Email | View Email</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" cache="false" />
  <link rel="stylesheet" href="../css/plugin.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="../css/table.css">


</head>
<body>
  <section class="hbox stretch">
    <!-- .aside -->
    <aside class="bg-primary aside-sm" id="nav">
      <section class="vbox">
        <header class="dker nav-bar nav-bar-fixed-top">
          <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
            <i class="fa fa-bars"></i>
          </a>
          <a href="#" class="nav-brand" data-toggle="fullscreen">Teacher</a>
          <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user">
            <i class="fa fa-comment-o"></i>
          </a>
        </header>
        <section>
          <!-- user -->
          <div class="bg-success nav-user hidden-xs pos-rlt">
            <div class="nav-avatar pos-rlt">
           <center>
              <a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown">
               <?php  $resultID = mysqli_query($connection,"SELECT ProfilePic FROM users WHERE username Like '".$_SESSION['username']."'"); 
              $jfeta = mysqli_fetch_assoc($resultID);
              // print($jfeta['ProfilePic']);
              //'<img src=uploads/'.$rowAttachmentID['Filename'].'>'
             print('<img src="../Profile Images/'.$jfeta['ProfilePic'].'" width=100 height=75>');  ?>

              </a>

              </center>
            </div>

          </div>
          <!-- / user -->

        
                  <!-- nav -->

          <nav class="nav-primary hidden-xs" >
            <ul class="nav">

                <li>
                <a>
                <i></i>        
                <center><span> <h4><?php echo $name;?></h4></span></center>
                </a>
              </li>
              <li class="">
                <a href="inbox.php">
                <i class="fas fa-inbox"></i>        
                <span>Inbox</span>
                </a>
              </li>

              <li class="active">
                <a href="sent.php">
                <i class="fas fa-share-square"></i>
                  <span>Sent</span>
                </a>
              </li>

              <li class="">
                <a href="compose.php">
                  <i class="fas fa-edit"></i>
                  <span>Compose</span>
                </a>
              </li>

                <li class="">
                <a href="approveEmail.php">
                <i class="fas fa-thumbs-up"></i>        
                <span>Approve</span>
                </a>
              </li>

                <li class="">
                <a href="monitor.php">
                <i class="fas fa-eye"></i>        
                <span>Monitor</span>
                </a>
              </li>

                <li class="">
                <a href="grades.php">
                <i class="fas fa-comment"></i>        
                <span>Feedback</span>
                </a>
              </li>

                <li class="">
                <a href="lessons.php">
                <i class="fas fa-graduation-cap"></i>        
                <span>Lessons</span>
                </a>
              </li>

              <li class="">
                <a href="settings.php">
                <i class="fas fa-cogs"></i>        
                <span>Settings</span>
                </a>
              </li>

              <li>
            </ul>
          </nav>
          <!-- / nav -->

        </section>
        <footer class="footer bg-gradient hidden-xs">

          <a href="LOGOUT" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right">
            <i class="fa fa-power-off"></i><span> Logout</span>
          </a>
          
        </footer>
      </section>
    </aside>
    <!-- /.aside -->
    <!-- .vbox -->
    <section id="content">

<div id="viewMail" style="margin-left: 25px; margin-top: 50px; width: 75%; border: solid 1px;padding: 5px 5px 5px 5px;">
<?php


$result = mysqli_query($connection, "SELECT * FROM emails Where SubjectID=".$_GET['SubjectID']."");

  
  while($row=mysqli_fetch_array($result)){
     $result2 = mysqli_query($connection, "SELECT username FROM users Where id=".$row['ReceiverID']."");
    $row2=mysqli_fetch_array($result2);
 print('<p style="font-size: 17px; display:inline;"><i>To: </i></p><p style="font-size: 17px;display:inline; ">');
  print($row2['username']);
    print('</p></br>');
 print('<p style="font-size: 17px; display:inline;"><i>Subject: </i></p><p style="font-size: 17px; display:inline;">');
  print($row['Subject']);
    print('</p></br></br>');
    print('<p style="font-size: 17px; display:inline;"><i>Message: </i></p><p style="font-size: 17px;">');
  print($row['Message']);
    print('</p>');
    print('<a href="deleteSent.php?id='.$row['SubjectID'].'"><img src=deleteEmail.png width=35 height=35></a>');

  }

mysqli_close($connection);

?>

</div>
      <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
    </section>
    <!-- /.vbox -->
  </section>
	<script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- Sparkline Chart -->
  <script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>
  <script src="js/app.plugin.js"></script>
  <script src="js/app.data.js"></script>
  <!-- Fa Icons -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>  
</body>
</html>