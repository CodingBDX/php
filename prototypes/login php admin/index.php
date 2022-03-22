<?php 
include 'config.php';
session_start();
if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $result = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email' AND password='$password'");

  
  if($result->num_rows > 0){
$row = mysqli_fetch_assoc($result);
$_SESSION['username'] = $row['username']; 
header("Location: welcome.php");

  }else{
    echo 'something wrong with password or email';
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
    <form action="" method="POST" class="login-email">
      <p class="login-text" style="font-size:2 rem; font-weight: 800;">
      login
      </p>
      <p><?php echo $success ?></p>
      <div class="input-group">
        <input required type="email"  placeholder="email" value="<?php echo $email ?>" name="email" class="email">
      </div>
<div class="input-group">
        <input required type="password" value="<?php echo $_POST['password']; ?>" name="password" placeholder="password" class="password">
      </div>
      <div class="input-group">
        <button class="btn" name="submit">login</button>
      </div>
      <p class="login-register-text">don't have a account? <a href="register.php">register</a></p>
    </form>
  </div>
  <script src="script.js"></script>
</body>
</html>