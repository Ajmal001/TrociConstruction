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
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php include("navbar.php")  ?>
<!-- Add the footer-->
<?php include("footer.php") ?>
      <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>
              <!-- Example DataTables Card-->
                  <div class="card mb-3">
                    <div class="card-header">
                      <i class="fa fa-area-chart"></i> Pie Chart 
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="post">
                                    <!-- drop down with projects being pulled from database -->
                                    <select id="slide" required Placeholder="Select job to view tasks..." name="projectID" method='post' style="height:32px;width:318px">
                                    <?php
                                            //connect to database
                                            $mysqlserver="localhost";
                                            $mysqlusername="root";
                                            $mysqlpassword="";
                                            $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());

                                            $dbname = 'TROCI';
                                            //get info about current user logged in.
                                            include('getUser.php');
                                            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
                                            //retireve projects that belong to the user that is logged in by checking for id. Group data by address.
                                            $cdquery="SELECT * FROM projectBreakdown WHERE client_id=$usrID GROUP BY Address ";
                                            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
                                            //display project id and address with while loop on the drop down
                                            while ($cdrow=mysql_fetch_array($cdresult)) {
                                            $id=$cdrow["project_id"];
                                            $Add=$cdrow["Address"];
                                                //show the project address while stroring id as the value
                                                echo "<option value='$id'>$Add</font></option>";
                                        }
                                        //show user the submit button so that they can get generate the pie chart.
                                        echo"<input style='border:1px solid #0044c7;border-radius:20px;color:#008b06;box-shadow:none;text-shadow:none;padding:1px 15px;background:transparent;transition:background-color 0.25s;outline:none;font-size:15px;width:150px;height:27px; margin-left:10px' type='submit' value='Submit the form'/>";
                                    ?> 
                                    </select>
                                </form> 


                                <?php
                                    //store the posted projectID into the variable $option
                                    $option = isset($_POST['projectID']) ? $_POST['projectID'] : false;
                                    //if something is stored in option, assign it to the $id variable
                                    if($option){
                                    $id =  htmlentities($_POST['projectID'], ENT_QUOTES, "UTF-8");
                                    //connect to the database
                                    $dbhandle = new mysqli('localhost', 'root', '', 'troci');
                                    echo  $dbhandle -> connect_error;
                                    //get all information where the project id is equal to the id that was selected from the drop down.
                                    $query = "SELECT * FROM projectBreakdown WHERE project_id=$id";
                                    $res = $dbhandle -> query($query);
                                    } 
                                ?>
                                <!-- the code has been altered from https://www.youtube.com/watch?v=spoNYvTdH64 -->    
                                <h1 style="padding-top:30px;"><center>Days Work Tasks</center></h1>
                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                <script type="text/javascript">
                                  google.charts.load('current', {'packages':['corechart']});
                                  google.charts.setOnLoadCallback(drawChart);

                                  function drawChart() {

                                    var data = google.visualization.arrayToDataTable([
                                      ['Job', 'Percentage Complete'],
                                        <?php
                                        while($row=$res->fetch_assoc()){
                                            $address = $row['Address'];
                                            echo"['".$row['JobName']."', ".$row['taskBreakdown']."],";
                                        }

                                        ?>
                                    ]);
                                        var options = {
                                                        'is3D':true,
                                                       'height':550};

                                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                                    chart.draw(data, options);
                                  }
                                </script>
                              <body>
                                <div id="piechart" style="width: auto; margin: 0 auto !important;"></div>
                              </body>
                            </div>
                        </div>
                </div>
          </div>
    </div>
</body>
</html>
