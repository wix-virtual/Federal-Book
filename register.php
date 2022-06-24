<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
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
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index">
    <meta name="description" content="This website is for books and currently under development">
    <meta name="author" content="Faderal Group">

    <!-- Font Awesome CDN, Header Icon and CSS File Links -->
    <link rel="shortcut icon" href="logo/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Federal Book | Register</title>
</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<div class="form-container">

    <form action="" method="post">
        <h3>Register</h3>
        <input type="text" name="name" placeholder="enter your name..." required class="box">
        <input type="email" name="email" placeholder="enter your e-mail..." required class="box">
        <input type="password" name="password" placeholder="enter your password..." required class="box">
        <input type="password" name="cpassword" placeholder="confirm your password..." required class="box">
        <select name="user_type" class="box">
         <option value="user">User</option>
         <option value="admin">Admin</option>
        </select>
        <input type="submit" name="submit" value="register now" class="btn">
        <p>Already have a Federal Account? <a href="login.php">Login</a></p>
    </form>
    
</div>

</body>
</html>