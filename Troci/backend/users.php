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
  <title>Troci - Users</title>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Adding The  Navigation-->
<?php include("navbar.php")  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Users</li>
      </ol>   
        <!-- Adding or managing user icons-->
        <div class="row" style="margin-left:80px;margin-top:40px" >
                <div class="col-md-5 col-sm-offset-7">
                    <a href="../backend/addUser.php">
                    <div class="thumbnail btn btn-default">
                        <img style="width:112%;" src="../assets/img/user.png" alt="Sample Image">
                        <div class="caption">
                            <h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Add User</h3>
                        </div>
                    </div>
                    </a>
                </div>
            <div class="col-md-1 col-sm-offset-7">
            </div>
                <div class="col-md-5 col-md-offset-7">
                    <a href="../backend/allUsers.php">
                    <div class="thumbnail btn btn-default">
                        <img style="width:112%;" src="../assets/img/find.png" alt="Sample Image">
                        <div class="caption">
                            <h3>&nbsp&nbsp&nbsp&nbsp&nbsp Look Up / Edit Users</h3>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
<!-- Adding The Footer-->
<?php include("footer.php")  ?>
</div>
    
<!-- Styling to keep thumbnails centered-->
<style>
.thumbnails {text-align: center;}
.thumbnails .thumbnail {display: inline-block; margin: 0 5px;}      
</style>
</body>

</html>
