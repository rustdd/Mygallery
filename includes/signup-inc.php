<?php
  session_start();

require_once "pdo-inc.php";
   if (isset($_POST['submit'])){
       $uid=$_POST['uid'];
       $email=$_POST['email'];
       $password=$_POST['password'];
       $Rpassword=$_POST['Rpassword'];
   }
   else {
    header('Location: ../index.php');
    exit(); 
   }

   if (!($uid) || !($email) || !($password)){
    header('Location: ../index.php?error=emptyfield');
    exit();
   }
   if (strlen($password)<6){
    header('Location: ../index.php?error=min6charchater');
    exit();
   }
   if (strlen($uid)<4){
    header('Location: ../index.php?error=min4charchater');
    exit();
   }
   if ($password!==$Rpassword){
       header ('Location: ../index.php?error=mustbesamepass');
       exit();
   }
   if(!preg_match("/^[a-zA-Z0-9]+$/", $uid) ){
    header ('Location: ../index.php?error=invalidchar');
    exit();
   }
   $newUser = $pdo->prepare('SELECT * FROM users WHERE users_uid = :id or users_email =:email');
   $newUser->bindValue(':id', $uid);
   $newUser->bindValue(':email', $email);
   $newUser->execute();
   $val = $newUser->fetch(PDO::FETCH_ASSOC); 
   // var_dump($val);
   if ($val){
    header ('Location: ../index.php?error=userormailalreadyexists');
    exit();
   } 
   
   $hashedPassword=password_hash($password, PASSWORD_DEFAULT);
   $statement = $pdo->prepare("INSERT INTO users (users_uid, users_pwd, users_email)
   VALUES (:usuid, :uspwd, :usemail )");
   $statement->bindValue(':usuid', $uid);
   $statement->bindValue(':uspwd', $hashedPassword);
   $statement->bindValue(':usemail', $email);
   $statement->execute();
   header ('Location: ../index.php?registered=succesfuly');


   


