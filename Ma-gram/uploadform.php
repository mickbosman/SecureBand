<?php
//initialize the session
session_start();

 ?>

<html>

<head>
  <meta charset="utf-8">
  <title>Upload</title>
  <meta name="author" content="Mick Bosman, MD1A">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel=stylesheet href="loginStyle.css">
  <script type='text/javascript'>
function preview_image(event)
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
</head>

<body>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <div id="wrapper">
      <br>
    <input type="file" accept="image/*" id="button2" name="file" onchange="preview_image(event)">
    <br>
    <img style="min-width:500px; max-width: 500px;" id="output_image"/>
    </div>
    <br>
    <input class="button" type="submit" name="submit" value="Upload">
  </form>
  <a class="button" href="index.php">Back</a>
</body>

</html>
