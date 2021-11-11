<?php
   session_start();
   // check if user is loged in already
   if ($_SESSION){
   if ( $_SESSION["users_name"] && $_SESSION["users_pwd"])
   header ('Location: gallery.php');
   }
?>
<!DOCTYPE html>
<html>
<head> 
    <link rel="stylesheet" href='css/login.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="hallo">
        <h1> Welcome to MyGallery please log in or sign up to continue </h1>
    </div>
    <?php 
    // every possible error in sign up or log in
    if (isset($_GET["error"]))
    {
      if ($_GET["error"]==="emptyfield"){
      echo "<h1 style='color:red; text-align:center' > one of field is empty </h1>";
    }
    if ($_GET["error"]==="min6charchater")
    {
    echo "<h1 style='color:red; text-align:center' > your password should contain
    at least 6 charchater </h1>";
  }
  if ($_GET["error"]==="mustbesamepass")
    {
    echo "<h1 style='color:red; text-align:center' > passwords do not match </h1>";
  }
  if ($_GET["error"]==="min4charchater")
    {
    echo "<h1 style='color:red; text-align:center' > your username should contain al least
    4 charchater </h1>";
  }
  if ($_GET["error"]==="invalidchar")
    {
    echo "<h1 style='color:red; text-align:center' > your username should contain only
    charachters and numbers </h1>";
  }
  if ($_GET["error"]==="userormailalreadyexists")
  {
  echo "<h1 style='color:red; text-align:center' > Username or email is already registered </h1>";
}
  if ($_GET["error"]==="wrongpassword")
   {
   echo "<h1 style='color:red; text-align:center' > Right Username but password is wrong </h1>";
  }
  if ($_GET["error"]==="invaliduser")
    {
     echo "<h1 style='color:red; text-align:center' > That Username doesnt exists </h1>";
}
}
if (isset($_GET["registered"]))
{
  echo "<h1 style='color:green; text-align:center' > You have registered 
  succesfuly please sign in now </h1>";
}
    ?>
<div class="login-page">
  <div class="form">
    <form class="register-form" method="post" action="includes/signup-inc.php">
    <input type="email" name="email" placeholder="email address"/>
    <input type="text" name="uid" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>      
      <input type="password" name="Rpassword" placeholder="repeat password"/>
      <button name="submit">create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form> 
    <form class="login-form" method="post" action="includes/login-inc.php">
      <input type="text" placeholder="username" name="uid"/>
      <input type="password" placeholder="password" name="password"/>
      <button name="submit">login</button>
      <p class="message">Not registered?<a href="#">Create an account</a></p>
    </form>
  </div>
</div>
    <script src="js/login.js"></script>
    <?php
    ?>
</body>
</html>