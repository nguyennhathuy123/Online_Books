<?php

@include 'connect.php';

session_start();

if(isset($_POST['submit'])){
    
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM user WHERE email = '$email' && password = '$password'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exist';
   }else{
      if($pass != $cpass){
         $error[] = 'password not mathched!';
      }else{
         $insert = "INSERT INTO user(email, password) VALUES('$email','$password')";
         mysqli_query($conn, $insert);
         header('location: user.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
      body {
   font-family: Arial, sans-serif;
   background-color: #f4f4f4;
   margin: 0;
   padding: 0;
   display: flex;
   justify-content: center;
   align-items: center;
   height: 100vh;
}

.form-container {
   background-color: #fff;
   border-radius: 8px;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   padding: 20px;
   width: 300px;
}

.title {
   text-align: center;
   color: #333;
}

.box {
   width: 100%;
   padding: 10px;
   margin: 10px 0;
   box-sizing: border-box;
   border: 1px solid #ccc;
   border-radius: 4px;
   font-size: 14px;
}

.form-btn {
   background-color: #4caf50;
   color: #fff;
   padding: 10px;
   border: none;
   border-radius: 4px;
   cursor: pointer;
   width: 100%;
   font-size: 16px;
}

.form-btn:hover {
   background-color: #45a049;
}

.error-msg {
   color: #ff0000;
   display: block;
   margin-bottom: 10px;
}

p {
   text-align: center;
   margin-top: 10px;
}

a {
   color: #4caf50;
   text-decoration: none;
}

a:hover {
   text-decoration: underline;
}

   </style>
</head>
<body>
    
<div class="form-container">

   <form action="" method="post">
      <h3 class="title">register now</h3>
      <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
      <input type="email" name="usermail" placeholder="enter your email" class="box" required>
      <input type="password" name="password" placeholder="enter your password" class="box" required>
      <input type="password" name="cpassword" placeholder="confirm your password" class="box" required>
      <input type="submit" value="register now" class="form-btn" name="submit">
      <p>already have an account? <a href="user.php">login now!</a></p>
   </form>

</div>

</body>
</html>