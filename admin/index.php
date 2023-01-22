<?php
@session_start();
if(array_key_exists('username', $_SESSION)  && array_key_exists('username', $_COOKIE)){
    header('location:newsmagazine/dashboard.php');
}


/*----- Class Start ------*/


 include('class/user.class.php');


 $userObject = new User();

$error = [];

/*----- Class End ------*/



    if(isset($_POST['submit'])) {

      

        if(isset($_POST['email']) && !empty($_POST['email'])) {
          if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
          
            $userObject->email = $_POST['email'];
            }else{
              $error['email'] = "Invalid Email!";
            }
        } else {
            $error['email'] = "This field is required!";
        }

        if(isset($_POST['password']) && !empty($_POST['password'])) {
          $userObject->password = $_POST['password'];
        } else {
            $error['password'] = "This field is required!";
        }


          
         

        if(count($error) < 1){
            
          $status = $userObject->login();


        }
    }
    
    


   ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<!-- <link href="dist/css/sb-admin-2.css" rel="stylesheet"> -->

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <title>Admin Panel</title>
</head>
<body>
  
<div class="loginForm">
      <h2>Log In</h2>

      <form action="" method="post" noValidate>
      
        <div class="wrapper"><div class="txt_field">
        <label>E-mail</label>
          <input type="text" name="email" id="email" placeholder="example@gmail.com">
          <span></span>
          
        </div>
        <small><?php if(isset($error['email'])){echo $error['email'];}?></small>

        
        <div class="txt_field">
        <label>Password</label>
          <input type="password" name="password" id="password">
          <span></span>
          
        </div>
        <small><?php if(isset($error['password'])){echo $error['password'];}?></small>


        <div class="checkbox">
            <label>
                <input name="remember" type="checkbox" value="Remember Me">
                Remember Me
            </label>
        </div>

        <?php
      
if(isset($status)){
  echo "<small style='color:red'>$status</small>";
}
      ?>
 
        <input type="submit" value="Login" name="submit" id="submit"/>
      
      </div>
        
      </form>

    </div>

<!-- Footer with Copyright -->
<!-- <footer class="footer">
<p class="pull-right"> © 2023 Ashish Thapa .</p>
</footer> -->




 <!-- jQuery -->
 <script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>


<!-- <script>
$(document).ready(function(){
$('#loginForm').validate();
})
</script> -->


</body>
</html>






