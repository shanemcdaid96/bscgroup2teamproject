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

    // $resultAttachmentID=mysqli_query($connection,"SELECT * FROM attachments WHERE IDemail=".$row['SubjectID']."");
   // $rowAttachmentID=mysqli_fetch_assoc($resultAttachmentID);
?>



<html lang="en">
<head>
  
  <title>Bsafe Email | Compose </title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
  <link rel="stylesheet" href="css/plugin.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/table.css">


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
          <a href="#" class="nav-brand">Bsafe Email</a>
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
             print('<img src="Profile Images/'.$jfeta['ProfilePic'].'" width=75 height=75>');  ?>

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

              <li class="">
                <a href="sent.php">
                <i class="fas fa-share-square"></i>
                  <span>Sent</span>
                </a>
              </li>

              <li class="active">
                <a href="compose.php">
                  <i class="fas fa-edit"></i>
                  <span>Compose</span>
                </a>
              </li>

               <li class="">
                <a href="grades.php">
                  <i class="fas fa-graduation-cap"></i>
                  <span>My Grades</span>
                </a>
              </li>
                <li class="">
                <a href="lessons.php">
                  <i class="fas fa-book"></i>
                  <span>Lesson Plans</span>
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
        <footer class="footer">
         <a href="logout.php" class="btn btn-sm btn-link m-r-n-xs pull-right">
            <i class="fa fa-power-off"></i><span> Logout</span>
          </a>
        </footer>
      </section>
    </aside>
    <!-- /.aside -->
    <!-- .vbox -->
    <section id="content">

<!--       <?php $result2 = mysqli_query($connection, "SELECT username FROM users Where reciverId=".$row['SenderID']."");
    $row2=mysqli_fetch_array($result2);
    ?>  -->

<div id="compose" style="margin-left: 25px; margin-top: 50px;">
<form action="insert.php" method="post" enctype="multipart/form-data">
    <h3>To:</h3>

    <!-- Takes value of username to populate To field -->
    <?php
      
   if(isset($_GET['ReceiverID'])){
     $id = $_GET['ReceiverID'];
$receiver = mysqli_query($connection,"SELECT name FROM users WHERE id = '$id'");
  $jfeta2 = mysqli_fetch_assoc($receiver);
            $receiver = $jfeta2['name'];
    print('<input type="text" name="receiver" value="'.$receiver.'">');
    }
    else{  
   print('<input type="text" name="receiver">');
    }
    ?>    
    <input class="w-input-email"  placeholder="@bsafe-email.com" readonly>  
    <h3>Subject:</h3>
    <input type="text" name="subject">
    <h3>Message:</h3>
    <textarea rows="20" cols="80" name="message"></textarea>
    <br>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <br>
    <input type="submit" value="Send">
</form>
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