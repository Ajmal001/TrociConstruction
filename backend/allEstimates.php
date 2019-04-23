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
  <title>Troci - All Estimates</title>
</head>

    <!-- Adding the navigation bar-->
    <?php include("navbar.php")  ?>
        <div class="content-wrapper">
            <div class="container-fluid">
              <!-- Breadcrumbs-->
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Estimates</li>
              </ol>
                <!-- Checks the user role, if user is client it displays clientEstimateDatatable.php -->
                <?php
                include('getUser.php');
                if($role=='Client')
                 {
                ?>
                <div class="card mb-3">
                    <div class="card-header">
                      <i class="fa fa-user"></i> My Estimates
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                                //shows the estimates for the particular client thats logged in.
                                include("clientEstimateDatatable.php");
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>   

                <!-- Checks the user role, if user is a Super user or Director user, it displays the estimatesDatatable.php which shows all estimates of the system=.  -->
                <?php
                include('getUser.php');
                if($role=='Super' || $role=='Director')
                {
                ?>
                <div class="card mb-3">
                    <div class="card-header">
                      <i class="fa fa-user"></i> View or Edit Estimates</div>
                    <div class="card-body">
                        <?php 
                        //shows datatable with all estimates in the system.
                        include("estimatesDatatable.php"); ?>
                    </div>
                </div>  
            </div>
        </div>
    <?php
    }
    ?>  
<!-- Adding Footer -->
<?php include("footer.php")  ?>      
</html>
