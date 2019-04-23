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
  <title>Troci </title>
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
        <li class="breadcrumb-item">
          <a href="#">Projects</a>
        </li>
        <li class="breadcrumb-item active">All Projects</li>
      </ol>
        <!-- Tabs to navigate between the client tables -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a id="All Projects" class="nav-link" href="projectsAll.php">All Projects</a>
          </li>
          <li class="nav-item">
            <a id="Potential Clients" class="nav-link active" href="potProjects.php">Potential Clients</a>
          </li>
          <li class="nav-item">
            <a id="Connected" class="nav-link" href="connectedClients.php">Connected</a>
          </li>
        </ul>
           <div class="card mb-3">
                <div class="card-body">
                  <canvas id="myAreaChart" width="100%" height="30"></canvas>
                        <div class="row" style="margin-left:80px;margin-top:-50px;margin-bottom:-10px">
                            <div class="col-md-5 col-sm-offset-7">
                               <a data-toggle="modal" data-target="#myModal" href="../backend/propLetter.php"<?php include("getProjInfo.php"); echo"$id"; ?>>
                                <div class="thumbnail btn btn-default">
                                    <img style="width:112%;" src="../assets/img/connect.png" alt="Sample Image">
                                    <div class="caption">
                                        <h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Make Connection</h3>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-1 col-sm-offset-7">
                            </div>
                            <div class="col-md-5 col-md-offset-7">
                                <form method="post" action="deletePotClient.php">
                                <button type="submit" name="delete">
                                <input hidden placeholder="e.g. New Build" class="form-control" type="text" name="id" value="<?php include('getProjInfo.php'); echo"$id" ?>">
                                <div class="thumbnail btn btn-default">
                                    <img style="width:112%;" src="../assets/img/trash.png" alt="Sample Image">
                                    <div  class="caption">
                                        <h3>&nbsp&nbsp&nbsp&nbsp&nbsp
                                            <font color="red"> Trash</font>
                                        </h3>
                                    </div>
                                </div>
                                </button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
            <!-- Modal for verifying the project information and registering it as a project -->
            <div style="height:70%;margin-top:7%" id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div style="height:90%;" class="modal-dialog modal-lg" role="document">
                <div style="height:90%;padding:25px;padding-top:40px" class="modal-content">

                                <form id="form" action="registerProjectConv.php" name="frmRegistration" method="post" enctype="multipart/form-data">
                                    <div  class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4 form-group">
                                                <label>Full Name</label><br>
                                                <span id="clientName"> 
                                                    <select required Placeholder="Select or Type Client Name..." name="clientName" value="<?php include('getProjInfo.php'); echo"$client" ?>"  id="slide">
                                                        <br>
                                                        <?php
                                                        //connecting to the database
                                                        $mysqlserver="localhost";
                                                        $mysqlusername="root";
                                                        $mysqlpassword="";
                                                        $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());

                                                        $dbname = 'TROCI';
                                                        mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
                                                        //selecting all clients
                                                        $cdquery="SELECT * FROM clients";
                                                        $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
                                                        //displaying clients on drop down using while loop
                                                        while ($cdrow=mysql_fetch_array($cdresult)) {
                                                        $fname=$cdrow["firstname"];
                                                        $sname=$cdrow["surname"];
                                                        $id=$cdrow["client_id"];
                                                            echo "<option>$fname $sname  $id</font></option>";
                                                        }
                                                        ?>         
                                                    </select>
                                                </span>
                                            </div>	
                                            <div class="col-sm-8 form-group">
                                                <label>Project Description</label>
                                                <input required placeholder="e.g. New Build" class="form-control" type="text" name="description" value="<?php include('getProjInfo.php'); echo"$desc" ?>">
                                                <input hidden placeholder="e.g. New Build" class="form-control" type="text" name="id" value="<?php include('getProjInfo.php'); echo"$id" ?>">
                                            </div>	
                                        </div>		
                                        <hr>
                                        <div class="row">	
                                            <div class="col-sm-12 col-md-offset-3 form-group" id="lookup_field" ></div>
                                        </div>
                                        <div class="row">	
                                            <div class="col-sm-4 form-group">
                                                <label>Address First Line</label>
                                                <input  required id="first_line" type="text" placeholder="Enter First Line Here.." class="form-control" name="address" value="<?php include('getProjInfo.php'); echo"$addr" ?>">
                                            </div>	
                                            <div class="col-sm-4 form-group">
                                                <label>Town/City</label>
                                                <input required id="post_town" type="text" placeholder="Enter City Here.." class="form-control" name="city" value="<?php include('getProjInfo.php'); echo"$ward" ?>">
                                            </div>	
                                            <div class="col-sm-4 form-group">
                                                <label>Postcode</label>
                                                <input required id="postcode" type="text" placeholder="Enter Postcode Here.." class="form-control" name="postcode" value="<?php include('getProjInfo.php'); echo"$pcode" ?>">
                                            </div>		
                                        </div>	
                                        <hr>
                                        <div class="row">	
                                            <div id="body">
                                                <input type="file" name="file" />
                                                <br /><br />
                                                <?php
                                                //php to provide user feedback on whether the file has been uploaded.
                                                if(isset($_GET['submit']))
                                                {
                                                    ?>
                                                    <label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
                                                    <?php
                                                }
                                                else if(isset($_GET['fail']))
                                                {
                                                    ?>
                                                    <label>Problem While File Uploading !</label>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <label>Upload Supporting Document/Plan.</label>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>                   
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <div class="row">	
                                        <div id="center" >      
                                            <td><button class="btn btn-default" type="submit" name="convert" value="Register"  value="Register" class="btnRegister" id="butonas" style="border:1px solid #0044c7;border-radius:20px;color:#008b06;box-shadow:none;text-shadow:none;padding:1px 15px;background:transparent;transition:background-color 0.25s;outline:none;font-size:25px;width:190px;height:38px;">Register</button></td>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
            </div>
        </div>
      </div>
    <!-- Adding Footer -->
      <?php include("footer.php")  ?>
</div>

<!-- Style for thumbnails to be centered and aligned -->
<style>
.thumbnails {text-align: center;}
.thumbnails .thumbnail {display: inline-block; margin: 0 5px;}      
</style>
    <!-- scripts for editable drop down -->
    <link href="../backend/css/jquery-editable-select.min.css" rel="stylesheet" />
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="../backend/js/jquery-editable-select.min.js"></script>
    <script>
      window.onload = function () {
        $('#slide').editableSelect({ effects: 'slide' });
        $('#html').editableSelect();
        $('#onselect').editableSelect({
          onSelect: function (element) {
            $('#afterSelect').html($(this).val());
          }
        });
      }
    </script>
</body>

</html>


