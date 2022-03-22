<?php 
include 'config.php';


if(isset($_POST['submit'])){
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$cpassword = md5($_POST['cpassword']);

if($password == $cpassword){
  $result = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");
  

  if($result->num_rows > 0){
   $already =  "user already exist";

  }else{
 $sql = "INSERT INTO `users` (username, email, password) VALUES ('$username', '$email', '$password')";

 $result = mysqli_query($conn, $sql);
 if($result){
   
$username = "";
$email = "";
$_POST['password'] = "";
$_POST['cpassword'] = "";
$success =  "you are register";

header('location:index.php'); 

}else {
   echo "<script>alert('eror register')</script>";

}
}

}else{
   echo "<script>alert('eror register')</script>";

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Php login</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>
<body>
  <div class="container">
    <form action="register.php" method="POST" class="login-email">
      <p class="login-text" style="font-size:2 rem; font-weight: 800;">
      register
      </p>
      <div class="input-group">
        <input required type="text" value="<?php echo $username ?>"  placeholder="Username" name="username">
      </div>

      <div class="input-group">
        <input required type="email"  placeholder="Email" value="<?php echo $email ?>" name="email">
      </div>
<div class="input-group">
        <input required type="password" value="<?php echo $password ?>"    
         placeholder="password" name="password" class="password">
      </div>
      <div class="input-group">
        <input required type="password"  value="<?php echo $cpassword ?>" placeholder="Confirm password" name="cpassword" class="password">
      </div>
      <p><?php echo $errorCpassword; ?></p>
      <p><?php echo $already; ?></p>

      <div class="input-group">
        <button name="submit" class="btn">register</button>
      </div>
      <p class="login-register-text">have a account? <a href="index.php">register</a></p>
    </form>
  </div>
  <script src="script.js"></script>
</body>
</html>