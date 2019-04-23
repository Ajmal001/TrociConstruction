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
  <title>Troci - Dashboard</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Editable drop down-->
  <link href="../backend/css/jquery-editable-select.min.css" rel="stylesheet" />
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Add the Navigation-->
<?php include("navbar.php")  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
        <!-- Adding the footer-->
        <?php include("footer.php") ?>
          <!-- Area Chart Example-->
          <div class="card mb-1">
            <div class="card-header">
              <i class="fa fa-area-chart"></i>Pie Chart
            </div>
                <div class="card-body">
                <center>
                    <!-- dropdown with addresses from database for user to choose project to view -->
                    <form method="post">
                        <select id="slide" required Placeholder="Select job to view tasks..." name="projectID" method='post' style="height:32px;width:218px">
                        <?php
                                //connect to database
                                $mysqlserver="localhost";
                                $mysqlusername="root";
                                $mysqlpassword="";
                                $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());

                                $dbname = 'TROCI';
                                mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
                                //retireve all project and group them by address so only 1 of each address is shown.
                                $cdquery="SELECT * FROM projectBreakdown GROUP BY Address";
                                $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
                                //get back the project id and address.
                                while ($cdrow=mysql_fetch_array($cdresult)) {
                                $id=$cdrow["project_id"];
                                $Add=$cdrow["Address"];
                                //show the addresses in the drop down and have the value as the id of the project
                                echo "<option value='$id'>$Add</font></option>";
                            }
                            echo"<input style='border:1px solid #0044c7;border-radius:20px;color:#008b06;box-shadow:none;text-shadow:none;padding:1px 15px;background:transparent;transition:background-color 0.25s;outline:none;font-size:15px;width:100px;height:27px; margin-left:10px position:absolute;' type='submit' value='See Tasks'/>";   
                        ?> 
                        </select>
                    </form>   
                        <?php
                            //project id is retrieved from the selection made above and stored into the $option variable
                         $option = isset($_POST['projectID']) ? $_POST['projectID'] : false;
                            //checks if something's been selected.
                            if($option){
                                    //sets the posted project id as the variable $id
                                    $id =  htmlentities($_POST['projectID'], ENT_QUOTES, "UTF-8");
                                    //connection to database
                                    $dbhandle = new mysqli('localhost', 'root', '', 'troci');
                                    echo  $dbhandle -> connect_error;
                                    //gets breakdown tasks based on the project id which was selected as a drop down option above.
                                    $query = "SELECT * FROM projectBreakdown WHERE project_id=$id OR project_id='69'";
                                    $res = $dbhandle -> query($query);
                                    } 

                            ?>
                            <!-- has been amended from https://www.youtube.com/watch?v=spoNYvTdH64 -->   
                            <h1 style="padding-top:10px;"><center>Days Work Tasks</center></h1>
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                            <script type="text/javascript">
                              google.charts.load('current', {'packages':['corechart']});
                              google.charts.setOnLoadCallback(drawChart);

                              function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                  ['Job', 'Percentage Complete'],
                                    <?php while($row=$res->fetch_assoc()){ $address = $row['Address']; echo"['".$row['JobName']."', ".$row['taskBreakdown']."],";}?>
                                    ]);
                                    var options = {'is3D':true,'height':560};
                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                chart.draw(data, options);
                              }
                            </script>
                            <script> 
                            $(window).resize(function(){
                               drawChart();
                             });
                            </script>
                        <body>
                            <div id="piechart" style="margin-top:-10px;">
                            </div>
                        </body>
                    </center>
                    </div>
              </div>
        </div>
  </div>
</body>
</html>
