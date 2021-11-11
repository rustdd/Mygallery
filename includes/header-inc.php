<?php
  if (!PHP_SESSION_ACTIVE)
  session_start();
?>
<link rel="stylesheet" href='css/header.css'>
<div class="nav">
  <input type="checkbox" id="nav-check">
  <div class="nav-header">
    <div class="nav-title">
      MyGallery
    </div>
  </div>
  <div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>
  <div class="nav-links">
  <a href="upnewimg.php"> ➕ Upload New Image</a>
  <a href="gallery.php"> Home</a>
    <a href="includes/logout-inc.php">Log Out (
      <?php 
      echo $_SESSION['users_name'];
      ?>
    )</a>
  </div>
</div>