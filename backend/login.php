<?php
include 'conn.php';
  session_start();
    $message=$msg_password=$msg_username=" ";
    if (isset($_REQUEST['btn_login'])) {
        echo $username=$_REQUEST['username'];
        echo $password=$_REQUEST['pass'];
        // $password=md5($password);
                if (empty($username)) {
                  $msg_username="This field is required";
                }
                if (empty($password)) {
                  $msg_password="This field is required";
                }
                else
                {
                    $select=mysqli_query($conn,"SELECT*FROM admin WHERE name='".$username."' AND password='".$password."'") or die(mysqli_error());
                    if (mysqli_num_rows($select)>0) {  
                      $_SESSION["username"]=$username;
                      header('location:dashboard.php');
                    }
                    else {
                        $message='<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                      Incorect  username or password !!!.
                    </div>';
                    }
                }
  

    }
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
  
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
      .note
     {
       color: #ff0000;
     }
    </style>
    <title>Login</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <?php
        echo $message;
      ?>
      <div class="logo">
        <h1>Admin</h1>
      </div>
      <div class="login-box">
        <form class="login-form" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Username"  name="username">
            <?php echo "<p class='note'>".$msg_username."</p>";?>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="pass">
          <?php echo "<p class='note'>".$msg_password."</p>";?>
          </div>
         
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="btn_login"><i class="fa fa-sign-in fa-lg fa-fw"></i>Login</button>
          </div>
        </form>
        
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    
   <!--  <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script> -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Google analytics script-->
     <!-- Data table plugin-->
     <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
      <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  </body>
</html>