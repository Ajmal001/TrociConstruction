<!-- 
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Troci - All Users</title>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!--Adds The Navigation-->
<?php include("navbar.php")  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="users.php">Users</a>
        </li>
        <li class="breadcrumb-item active">Look-up Users</li>
      </ol>
        <!-- Checking whether the user is a super user. if so, it shows the datatable of all users -->
        <?php
        include('getUser.php');
        if($role=='Super')
        {
        ?>
        <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-user"></i> View or Edit Users
            </div>
            <div class="card-body">
            <!-- Datatable showing all users -->
            <?php include("userDatatable.php");   ?>
            </div>
        </div>
      </div>
    </div>
<?php
}
?>    
<!-- Adds The Footer -->
<?php include("footer.php")  ?>
</body>
</html>
