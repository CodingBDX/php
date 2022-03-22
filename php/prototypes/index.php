<?php 

$dbrequest = new PDO('mysql:host=localhost;dbname=polaroid', 'admin', 'admin');

if(isset($_POST['addimage'])){
  
$dataImage = [
'img_link' => 'images/' . $_FILES['image']['name'],
'img_file' => $_FILES['image']['tmp_name']

];
  $data = [
'title' => htmlspecialchars($_POST['title']),
'img_link' => $dataImage['img_link'],

  ];
  move_uploaded_file($dataImage['img_file'], $dataImage['img_link']);

$addImage = $dbrequest->prepare("INSERT INTO images (title, link) VALUES (:title, :img_link)");
$addImage->execute($data);
}

$getDataImages = $dbrequest->prepare("SELECT * FROM images");
$getDataImages->execute();

$images = $getDataImages->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Polaroid</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
  <div class="addimages">
    <h1>ajouter une images</h1>
    <div class="addimages_form">
      <form action="" method="post" enctype="multipart/form-data">
        <div>
        <label for="">Title</label>
        <input type="text" name="title" id="title" required placeholder="your title">
        </div>
        <div>
          <label for="">put your picture</label>
          <input  type="file" accept="image/png, image/jpeg" name="image">
        </div>
        <button type="submit" name="addimage">upload your picture</button>
      </form>
    </div>
    
  </div>
  <div class="showimages">
      <?php foreach($images as $image){ ?>
        <div class="polaroid">
          <div class="polaroid_image">
            <img src="<?php echo $image['link'] ?>" alt="<?php echo $image['title'] ?>">
            <p><?php echo $image['title'] ?></p>
          </div>
        </div>
        
        <?php } ?>
    </div>
    </div>
</body>
</html>