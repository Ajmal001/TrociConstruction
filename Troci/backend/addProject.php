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
    <html xmlns="http://www.w3.org/1999/xhtml">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Troci - Add Project</title>
      <link href="../backend/css/jquery-editable-select.min.css" rel="stylesheet" />
      <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    </html>
</head>


<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php include("navbar.php")  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../backend/index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="../backend/projects.php">Projects</a>
        </li>
        <li class="breadcrumb-item active">Add Projects</li>
      </ol>
        <!-- New Project(s) used to add single or batch projects -->
        <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-user"></i> New Project Form
            </div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="1"></canvas>
                <!-- Add batch CSV file -->
                <form class="form-horizontal" href="../backend/addProject.php" action="../csvtosql/csv2sql.php" method="post">
                    <div style="margin-top:-20px" class="form-group">
                        <label  for="csvfile" class="control-label col-xs-2">Name of the file</label>
                        <div class="col-xs-3">
                        <input placeholder="eg. AllJobs.csv, make sure file is added to 'csvtophp' folder" type="name" class="form-control" name="csv" id="csv">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="login" class="control-label col-xs-2"></label>
                        <div class="row">	
                            <div id="center" style="margin-right:35px;">      
                                <td><button type="submit" class="btn btn-primary" style="border:1px solid #0044c7;border-radius:20px;color:#008b06;box-shadow:none;text-shadow:none;padding:1px 15px;background:transparent;transition:background-color 0.25s;outline:none;font-size:20px;width:190px;height:38px;margin-left:41px;margin-bottom:10px;margin-top:-15px;">Add All Jobs</button></td>
                            </div>
                        </div>
                    </div>
                </form>
                
                <hr style="height:1px;border:none;color:#808080;background-color:#959595;">
                <br /><br />
                <!-- Add a single project -->
                <?php include 'registerProject.php'; ?>
                    <form id="form" action="registerProject.php" name="frmRegistration" method="post" enctype="multipart/form-data">
                        <div style="margin-top:-20px" class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Full Name</label><br>
                                        <span id="clientName">
                                            <!-- Drop down & search bar that retrieves users from the database -->
                                            <select required Placeholder="Select or Type Client Name..." name="clientName" value="<?php if(isset($_POST['clientName'])) echo $_POST['clientName']; ?>" style="height:32px;width:318px" id="smothe">
                                            <?php
                                                    //connect to database
                                                    $mysqlserver="localhost";
                                                    $mysqlusername="root";
                                                    $mysqlpassword="";
                                                    $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
                                                
                                                    $dbname = 'TROCI';
                                                    mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
                                                    //retireve all clients
                                                    $cdquery="SELECT * FROM clients";
                                                    $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
                                                    //display all clients with while loop on the drop down
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
                                <div class="col-sm-4 form-group">
                                    <label>Project Description</label>
                                    <input required placeholder="e.g. New Build" class="form-control" type="text" name="description" value="<?php if(isset($_POST['description'])) echo $_POST['description']; ?>">
                                
                                </div>	
                            </div>		
                            <hr>
                            <div class="row">	
                                <div class="col-sm-12 col-md-offset-3 form-group" id="lookup_field" ></div>
                            </div>
                            <!-- Address information -->
                            <div class="row">	
                                <div class="col-sm-4 form-group">
                                    <label>Address First Line</label>
                                    <input  required id="first_line" type="text" placeholder="Enter First Line Here.." class="form-control" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Town/City</label>
                                    <input required id="post_town" type="text" placeholder="Enter City Here.." class="form-control" name="city" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Postcode</label>
                                    <input required id="postcode" type="text" placeholder="Enter Postcode Here.." class="form-control" name="postcode" value="<?php if(isset($_POST['postcode'])) echo $_POST['postcode']; ?>">
                                </div>		
                            </div>	
                            <hr>
                            <div class="row">	
                                <div id="body">         
                                <input type="file" name="file" />
                                <br /><br />
                                <!-- Uploading the file thats been attached to the project -->
                                <?php
                                //if its submitted, then show lable 'uploaded successfully, else if upload fails... show label problem, else ask user to upload file.
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
                             <div class="row">	
                                <div id="center" style="margin-top:20px; margin-right:35px;">      
                                    <td><button class="btn btn-default" type="submit" name="submit" value="Register"  value="Register" class="btnRegister" id="butonas" style="border:1px solid #0044c7;border-radius:20px;color:#008b06;box-shadow:none;text-shadow:none;padding:1px 15px;background:transparent;transition:background-color 0.25s;outline:none;font-size:25px;width:190px;height:38px;margin-left:41px;margin-bottom:9px;margin-top:-15px;">Add Job</button></td>
                                </div>
                            </div>
                        </div>                   
                    </form>
                </div>			
            </div>
        </div>
    </div>

<!-- footer brought through from php file-->
<?php include("footer.php")  ?>

<!-- Styling to keep buttons centered -->
<style>
#center {
  width: 95%;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
    
<!-- JQuery scripts to add slide effect to the drop down and also add the similar look to the other fields  -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="../backend/js/jquery-editable-select.min.js"></script>
    <script>
      window.onload = function () {
        $('#smothe').editableSelect({ effects: 'smothe' });
        $('#onselect').editableSelect({
          onSelect: function (element) {
            $('#afterSelect').html($(this).val());
          }
        });
      }
    </script>
</body>
</html>