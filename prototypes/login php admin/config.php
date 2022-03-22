<?php
$conn = mysqli_connect('localhost', 'admin', 'admin', 'login_register') or die('connection failed');

if(!$conn){
  echo 'connection errors' . mysqli_connect_error();
}else{

}


?>