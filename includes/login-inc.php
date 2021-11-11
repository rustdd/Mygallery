<?php
  session_start();

require_once "pdo-inc.php";
if (isset($_POST['submit']))
{
    $uid=$_POST['uid'];
    $password=$_POST['password'];
}
else {
 header('Location: ../index.php');
 exit(); 
}

if (!($uid) ||  !($password)){
    header('Location: ../index.php?error=emptyfield');
    exit();
   }
$checkUser = $pdo->prepare('SELECT * FROM users WHERE users_uid = :id');
$checkUser->bindValue(':id', $uid);
$checkUser->execute();
$val=$checkUser->fetch(PDO::FETCH_ASSOC); 
if (!$val)
{
    header ('Location: ../index.php?error=invaliduser');
    exit();
}
  else 
  {
    //var_dump($val);
    $hashed=$val["users_pwd"];
    $checkPass=password_verify($password, $hashed);
    if (!$checkPass)  {
        header ('Location: ../index.php?error=wrongpassword');
        exit();
    }
    else {
        header ('Location: ../gallery.php');
        $_SESSION["users_name"]=$uid;
        $_SESSION["users_pwd"]=$hashed;
    }
  }
//var_dump($val);