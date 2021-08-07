<?php
session_start();
if(!isset($_SESSION['userId'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Banking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>

</head>
<body style="background: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), white; background-size: 100%">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="#">
    <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
   <!--  <i class="d-inline-block  fa fa-building fa-fw"></i> --><?php echo bankname; ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link active" href="index.php" style="margin-left: 150px;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="accounts.php">&nbsp;&nbsp;Accounts</a></li>
      <li class="nav-item ">  <a class="nav-link" href="statements.php">&nbsp;&nbsp;Statements</a></li>
      <li class="nav-item ">  <a class="nav-link" href="transfer.php">&nbsp;&nbsp;Funds Transfer</a></li>
    </ul>
    <?php include 'sideButton.php'; ?>
   
  </div>
</nav><br><br><br><br>
<div class="container">
  <div class="card  w-75 mx-auto" style="border: 2px solid gray;">
  <div class="card-header text-center">
    <b>Notification from Bank</b>
  </div>
  <div class="card-body">
    <?php 
      $array = $con->query("select * from notice where userId = '$_SESSION[userId]' order by date desc");
      if ($array->num_rows > 0)
      {
        while ($row = $array->fetch_assoc())
        {
          echo "<div class='alert alert-success'>$row[notice]</div>";
        }
      }
      else
        echo "<div class='alert alert-info'>Notice box empty</div>";
     ?>
  </div>
  <div class="card-footer text-muted">
   <b><?php echo bankname ?></b>
  </div>
</div>

</div>
</body>
</html>