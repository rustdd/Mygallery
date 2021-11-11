<?php
  session_start();
  require_once "includes/pdo-inc.php";
  if (!isset($_SESSION["users_name"]) ||!isset($_SESSION["users_pwd"]) )
  header ('Location: index.php');
  $statement = $pdo->prepare('SELECT * FROM images ORDER BY image_id DESC');
  $statement->execute();
  $val = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href='css/gallery.css'>
</head>
<body>
<?php 
  require_once "includes/header-inc.php";
  ?>

<div class="images">
    <?php
    for ($i=0; $i<sizeof($val); $i++){ ?> 
  <div id="items">
    <img class="image" src="<?php echo "includes".'/'.$val[$i]["image"] ?>">
    <h5> <?php echo $val[$i]["description"] ?> </h5> <br>
    <h5> Added by: <?php echo $val[$i]["image_author"] ?> </h5>

  </div>
  <?php } ?>
 
</div>

</body>
</html>