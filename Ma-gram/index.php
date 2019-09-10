<?php
  session_start();
 
  include 'config.php';

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Mick Bosman">
    <link rel=stylesheet href="style.css?v=<<?php echo time() ?>">
    <title>Magram</title>
  </head>
  <body>

    <input type="checkbox" name="toggle" id="toggle" />
    <label for="toggle"></label>
    <div class="container">
    </div>
    <div class="message">
      <h1><?php  if (isset($_SESSION['username'])) : ?>
      <p>Welkom <strong><?php echo $_SESSION['username']; ?></strong> <?php endif ?>bij Ma-gram!</h1>
      <h2>Gemaakt door: Mick Bosman en Leander Kuiper. Opdracht de wall PROJ.
      <h2><a href="contact.php">Contact</h2></a><br>
      <p>━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━</p>
      </div>

<div class="footer">
  <a href="uploadform.php"> <img src="afbeeldingen/upload.png"></a>
  <a href="index.php"> <img src="afbeeldingen/home.png"></a>
  <a href="profiel.php"><img src="afbeeldingen/profiel.png"></a>
  <a href="contact.php"><img src="afbeeldingen/contact.png" style="width: 8%;"></a>
</div>

<div class="logo">
  <h1>Ma-gram</h1>
</div>

<div class="pics">
<?php
$query = $pdo->query("SELECT * FROM images ORDER BY uploaded_on DESC");

 if($query->rowCount() > 0){
    while($row = $query->fetch()){
        $imageURL = 'uploads/'.$row["file_name"];
 ?>
 <img id="postPic" src="<?php echo $imageURL; ?>" style="width: 300px; height: 300px; padding-left: 5em; padding-top: 5em;" />
<?php }
}else{ ?>
   <p>No image(s) found...</p>
<?php } ?>
</div>
<br><br><br><br><br><br><br>

  </body>
</html>
