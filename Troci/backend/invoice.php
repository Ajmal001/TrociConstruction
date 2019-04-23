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
  <title>Troci - All Invoices</title>
</head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Adds The Navigation-->
        <?php include("navbar.php") ?>
          <div class="content-wrapper">
            <div class="container-fluid">
              <!-- Breadcrumbs-->
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Invoice</li>
              </ol>
                <div class="card mb-3">
                    <div class="card-header">
                      <i class="fa fa-user"></i> All Invoices
                    </div>
                    <div class="card-body">
                      <canvas id="myAreaChart" width="100%" height="30"></canvas>              
                        <?php
                            //gets the logged in user information
                            include('getUser.php');
                                //if the user is a client, it displays the client invoices. Otherwise it displays all the users invoices.
                                if($role=='Client'){
                                include("clientInvoiceDatatable.php");
                                } else {
                                    include("invoiceDatatable.php");
                                }
                        ?>
                    </div>
                    <div class="card-footer small text-muted"></div>
                </div>
              <!-- Icon Cards-->
            <!-- /.container-fluid-->
              <?php include("footer.php")  ?>
            </div>
        </div>
    </body>
</html>
