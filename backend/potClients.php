<!-- 
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
This code was altered from https://github.com/coderexample/datatable_example/tree/master/demo1
-->
<!DOCTYPE html>
<html>
	<title>Troci - Potential Clients</title>
	<head>
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
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
                                    url :"potClients-grid-data.php", // json datasource, this has been altered and linked to the relevant php file to extract info fromn the database.
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
		</style>
    </head>
	<body>
		<div class="container">
			<table id="employee-grid" data-toggle="modal" data-target="#myModal" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
					<thead>
						<tr>
                            <!-- The table below has been ameded to match and house the data being retrieved -->
							<th>Client Name</th>
							<th id="info">Area</th>
                            <th id="info">Description</th>
							<th id="info">Address</th>
                            <th id="info">JobDate</th>
                            <th id="info">Document Number</th>
                            <th id="info">ID</th>
						</tr>
					</thead>
			</table>
         
		</div>
	</body> 
<script>       
$(document).ready(function() {
    var table = $('#employee-grid').DataTable();
     
    $('#employee-grid tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        //This has been amended so that the user is diverted to the correct page if they click on the datatable field
        location.href = 'potProjectsDecision.php?id='+data[6];
    } );
} );
</script>
</html>