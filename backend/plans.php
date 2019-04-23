<!-- 
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
This code was altered from https://github.com/coderexample/datatable_example/tree/master/demo1
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Troci - Uploaded Files</title>
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php include("navbar.php")  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Plans</li>
      </ol>
        <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-user"></i> All Project Plans
            </div>
                <div class="card-body">
                        <body>
                            <div class="container">
                                <table id="employee-grid" data-toggle="modal" data-target="#myModal" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <!-- The table below has been ameded to match and house the data being retrieved -->
                                                <th>Client Name</th>
                                                <th id="info">Area</th>
                                                <th id="info">Description</th>
                                                <th id="info">Size (KB)</th>
                                            </tr>
                                        </thead>
                                </table>

                            </div>
                        </body>
                    </div>
        </div>
        <div class="card-footer small text-muted"></div>
    </div>
<!-- Added footer-->
<?php include("footer.php")  ?>
</div>
<!-- javascripts for datatabales-->
<script type="text/javascript" language="javascript" src="../backend/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../backend/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" >
$(document).ready(function() {
    var counter = 1;
    var dataTable = $('#employee-grid').DataTable( {
        "processing": true,
        "serverSide": true,
        "columnDefs": [ {
                "width": "12%",
              "targets": 0,
              "orderable": false,
              "searchable": false,
                        } ],
                    "ajax":{
                        url :"plans-grid-data.php", // json datasource, this has been altered and linked to the relevant php file to extract info fromn the database.
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".employee-grid-error").html("");
                            $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#employee-grid_processing").css("display","none");

                        }
                    }
                } );
            });	
</script>
<script>         
$(document).ready(function() {
    var table = $('#employee-grid').DataTable();
     
    $('#employee-grid tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        //This has been amended so that the user is diverted to the correct page if they click on the datatable field
        location.href = '../assets/uploads/'+data[1];
    } );
} );
</script>
<style>
div.container {
    margin: 0 auto;
    max-width:auto;
}
body {
    background: #f7f7f7;
    color: #333;
    font: 90%/1.45em "Helvetica Neue",HelveticaNeue,Verdana,Arial,Helvetica,sans-serif;
}
    
.thumbnails {text-align: center;}
.thumbnails .thumbnail {display: inline-block; margin: 0 5px;}      
</style>
</body>

</html>
