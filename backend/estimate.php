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
  <title>Troci - Estimates</title>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!--Adding the Navigation-->
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
            <?php
            //gets the information for the user currently in the session
            include('getUser.php');
            //checks whether user is a super user or director. IF so, it displays the icons to navigate between making estimates and searching for them
            if($role=='Super' || $role=='Director')
            {
                ?>
                <div class="row" style="margin-left:80px;margin-top:40px" >
                    <div class="col-md-5 col-sm-offset-7">
                        <a href="../backend/makeEstimate.php">
                        <div class="thumbnail btn btn-default">
                            <img style="width:112%;" src="../assets/img/quotation.png" alt="Sample Image">
                            <div class="caption">
                                <h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Create Estimate</h3>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-1 col-sm-offset-7">
                    </div>
                    <div class="col-md-5 col-md-offset-7">
                        <a href="../backend/allEstimates.php">
                        <div class="thumbnail btn btn-default">
                            <img style="width:112%;" src="../assets/img/find.png" alt="Sample Image">
                            <div class="caption">
                                <h3>&nbsp&nbsp&nbsp&nbsp&nbsp Look Up / Edit Estimates</h3>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            <div class="card-footer small text-muted"></div>
        </div>
    <?php
    }
    ?>  
     
        <!-- Added the footer -->
     <?php include("footer.php")  ?>
    </div>  
<!-- styling to center thumbnails -->
<style>
.thumbnails {text-align: center;}
.thumbnails .thumbnail {display: inline-block; margin: 0 5px;}      
</style>
</body>

</html>
