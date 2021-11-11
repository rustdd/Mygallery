<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href='css/form.css'>
</head>
<body>
<?php 
  session_start();
  if (!isset($_SESSION["users_name"]) ||!isset($_SESSION["users_pwd"]) )
  header ('Location: index.php');
  require_once "includes/header-inc.php";
  ?>
  <div class="upload-form">
  <h2 class="header">Upload New Image</h2>
  <?php if (isset($_GET["error"]))
    {
      if ($_GET["error"]==="emptyfield"){
      echo "<p style='color:red; text-align:center' > one of field is empty </p>";
    }
    if ($_GET["error"]==="charchatererror"){
        echo "<p style='color:red; text-align:center' > your description should be
        minimum 5 and maximum 50 charchater </p>";
      }
 } ?>
  <div>
    <form method="post" action="includes/upnewimg-inc.php" enctype="multipart/form-data">
      <input type="text" name="description" placeholder="description max 50 symbol"></input>
      <input type="file" name="image" placeholder="Name"></input>
      <button name="submit">Upload</button>
    </form>
  </div>
  </body>
</html>