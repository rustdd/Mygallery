<?php
session_start();

require_once "pdo-inc.php";
if (isset($_POST['submit'])){
    $description=$_POST['description'];
    $image=$_FILES['image']; 
}
else {
    header ('Location: ../index.php');
    exit();
}
if (!$description || !$image){
    header ('Location: ../upnewimg.php?error=emptyfield');
    exit();
}
if (strlen( $description)<5  || strlen($description)>50 ){
    header ('Location: ../upnewimg.php?error=charchatererror');
    exit();
}
if (!is_dir("images"))
mkdir("images");
$imagePath="images/".bin2hex(random_bytes(10))."/".$image["name"];
mkdir(dirname($imagePath));
move_uploaded_file($image["tmp_name"], $imagePath);
echo $imagePath;
$statement = $pdo->prepare("INSERT INTO images (image_author, description, image)
VALUES (:image_author, :description, :image )");
$statement->bindValue(':image_author',  $_SESSION["users_name"]);
$statement->bindValue(':description', $description);
$statement->bindValue(':image', $imagePath);
$statement->execute();
header ('Location: ../gallery.php');

/*if ($image){
   move_uploaded_file($image["tmp_name"], i)
}*/
//var_dump($image);

