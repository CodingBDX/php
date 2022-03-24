<?php include('processForm.php') ?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php upload bootstrap</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4 form-div">
        <form action="index.php" method="post" enctype="multipart/form-data">
          <h3 class="text-center">create profil</h3>
          <?php if(!empty($msg)):?>
            <div class="alert <?php echo $css_class ?>">
          <?php echo $msg ?>
          </div>
            <?php endif ?>
          <div class="form-group text-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" id="profileDisplay" onclick="triggerClick()">
            <label for="profileImage">profile image</label>
            <input type="file" onchange="displayImage(this)" name="profileImage" id="profileImage" style="display:none">
          </div>
          <div class="form-group">
            <p>bio</p>
            <textarea class="form-control" name="bio" id="bio" cols="30" rows="10"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="save-user" class="btn btn-primary btn-block">save User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
 <script src="script.js"></script>
</body>
</html>