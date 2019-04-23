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
  <title> Troci - Clients</title>
</head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Navigation-->
        <?php include("navbar.php")  ?>
          <div class="content-wrapper">
            <div class="container-fluid">
              <!-- Breadcrumbs-->
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="../backend/index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="../backend/projects.php">Projects</a>
                </li>
                <li class="breadcrumb-item active">All Projects</li>
              </ol>
                <!-- Tabs to switch between datatables that distingush between projects-->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a id="All Projects" class="nav-link" href="projectsAll.php">All Projects</a>
                  </li>
                  <li class="nav-item">
                    <a id="Potential Clients" class="nav-link" href="potProjects.php">Potential Clients</a>
                  </li>
                  <li class="nav-item">
                    <a id="Connected" class="nav-link active" href="connectedClients.php">Connected</a>
                  </li>
                </ul>
                <!-- Tabs to switch between datatables that distingush between projects-->
                <div class="card mb-3">
                    <div class="card-body">
                      <canvas id="myAreaChart" width="100%" height="30"></canvas>
                          <div class="row">
                              <?php include('clients.php') ?>
                        </div>
                    </div>
                    <div class="card-footer small text-muted"></div>
                </div>
              <!--Adding the footer-->
            <?php include("footer.php")  ?>
            </div>
        </div>
        <!-- style to center thumbnails-->
        <style>
        .thumbnails {text-align: center;}
        .thumbnails .thumbnail {display: inline-block; margin: 0 5px;}      
        </style>
    </body>
</html>
