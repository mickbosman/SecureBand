<?php
  session_start();
  include_once 'dbh.php';

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

<?php
if(isset($_POST['submit'])) {
  move_uploaded_file($_FILES['file']['tmp_name'], "profielafb/".$_FILES['file']['name']);
  $con = mysqli_connect("localhost", "root", "", "registration");
  $q = mysqli_query($con,"UPDATE users SET image = '".$_FILES['file']['name']. "' WHERE username = '".$_SESSION['username']."'");
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel=stylesheet href="profiel.css" >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="leander">
    <title>Ma-gram</title>
  </head>
  <body>

    <div class="backImg">
    <a href="index.php">
    <img src="afbeeldingen/terug.png">
  </a>
  <!--ontzichtbaren text   -->
  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
  <!--ontzichtbaren text   -->
  <a href="register.php">
    <img src="afbeeldingen/logout.jpg">
  </a>
</div>

<br><br><br><br>



<div id="gameTitle">
<?php
    $con = mysqli_connect("localhost", "root", "", "registration");
    $q = mysqli_query($con, "SELECT * FROM users");
    while($row = mysqli_fetch_assoc($q)) {
      echo $row['username']."<br>";
      if(empty($row['image'])) {
        echo "<img width='100px' height='100px' src='afbeeldingen/profiel.png'>";
      } else {
        echo "<img width='100px' height='100px' src='profielafb/".$row['image']."'>";
      }
    }
      ?>

  <center>
    <h1><?php  if (isset($_SESSION['username'])) : ?>
    <p> <strong><?php echo $_SESSION['username']; ?></strong> <?php endif ?></h1>
  </center>
</div>

<div id="game">

<h3> U kunt hier uw Profiel foto selecteren of veranderen</h3>
  <form action"" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="submit">

<br><br><br>

<h3> Jouwn Foto's:</h3>
</div>

<!-- image upload voor profiel picture

<form action="upload.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="file">
  <button type="submit" name="submit">UPLOAD</button>
</form>

-->

  <div class="footer">
    <img src="afbeeldingen/zoek.png">
    <img src="afbeeldingen/upload.png">
    <a href="index.php"> <img src="afbeeldingen/home.png"></a>
    <img src="afbeeldingen/profiel.png">
  <a href="contact.php"><img src="afbeeldingen/contact.png" style="width: 8%;"></a>
  </div>


<script src="javascript.js"></script>
  </body>
</html>
