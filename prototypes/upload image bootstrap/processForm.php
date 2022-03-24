<?php
$msg =  "";
  $css_class = "";
$conn = mysqli_connect('localhost', 'admin', 'admin', 'image-upload');

if(isset($_POST['save-user'])) {
  
  $bio = $_POST['bio'];
  $profileImageName = time() . '_' . $_FILES['profileImage']['name'];

$target = 'images/' . $profileImageName;
 if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){}
 $sql = "INSERT INTO `users` (profile_image, bio) VALUES('$profileImageName', '$bio')";
 if(mysqli_query($conn, $sql)){
$msg =  "Profile upload success";
  $css_class = "alert-success";

 }else{
  $msg =  "database error";
  $css_class = "alert-danger";

 };
 
}else {
  $msg =  "message failed";
  $css_class = "alert-danger";

};
