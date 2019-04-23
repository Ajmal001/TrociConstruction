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
  <title>Troci - Projects</title>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Adding The Navigation-->
<?php include("navbar.php")  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Projects</li>
      </ol>
        <!-- Icons to navigate to all projects or add new projects-->
        <div class="row" style="margin-left:80px;margin-top:40px" >
                <div class="col-md-5 col-sm-offset-7">
                    <a href="../backend/addProject.php">
                    <div class="thumbnail btn btn-default">
                        <img style="width:112%;" src="../assets/img/home.png" alt="Sample Image">
                        <div class="caption">
                            <h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Add Project</h3>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-1 col-sm-offset-7">
                </div>
                <div class="col-md-5 col-md-offset-7">
                    <a href="../backend/projectsAll.php">
                    <div class="thumbnail btn btn-default">
                        <img style="width:112%;" src="../assets/img/find.png" alt="Sample Image">
                        <div class="caption">
                            <h3>&nbsp&nbsp&nbsp&nbsp&nbsp Look Up / Edit Projects</h3>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
</div>
<!-- Adding the Footer -->
<?php include("footer.php")  ?>

<!-- styling to keep thumbnails centered -->
<style>
.thumbnails {text-align: center;}
.thumbnails .thumbnail {display: inline-block; margin: 0 5px;}      
</style>
</body>

</html>
