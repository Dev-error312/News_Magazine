<?php

class user{

  public $id, $name, $username, $email, $password, $status, $role, $last_login;


  public function login(){
      $conn = mysqli_connect('localhost', 'root', '', 'newsmagazine');

      $encryptedPassword = md5($this->password);

     $sql = "select * from `users` where email='$this->email' and password='$encryptedPassword'";


     $var = $conn->query($sql);
    

     if($var->num_rows > 0){

      $data = $var->fetch_object();

      session_start();
      $_SESSION['id']=$data->id;
      $_SESSION['name']=$data->id;
      $_SESSION['username']=$data->id;
      $_SESSION['role']=$data->id;
      
      setcookie('username', $data->username, time() + 60 * 60);

      header('location:newsmagazine/dashboard.php');
     }
     else{
      $error = "Invalid Credentials!";

      return $error;
     }
  }
  
}

?>