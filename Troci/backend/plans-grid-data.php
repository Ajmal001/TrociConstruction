<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
This code was altered from https://github.com/coderexample/datatable_example/tree/master/demo1 
*****************************************************************************************************/
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TROCI";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

// getting total number records without any search
$sql = "SELECT id ";
$sql.=" FROM allDocs";
$query=mysqli_query($conn, $sql) or die("project-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

// getting total number records without any search
$cli = "SELECT * ";
$cli.=" FROM allDocs";
$id=mysqli_query($conn, $sql) or die("project-grid-data.php: get Address");

$sql = "SELECT * ";
$sql.=" FROM allDocs";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, then search based on the sql below, These have been amended to match the data retrieved
	$sql.=" AND ( id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR file LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR type LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR size LIKE '".$requestData['search']['value']."%' )";  

}
$query=mysqli_query($conn, $sql) or die("project-grid-data.php: get Address");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY id ASC  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("project-grid-data.php: get Address");

$data = array();
$i=1+$requestData['start'];
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
    //this section has been amended.
	$nestedData[] = $row["id"];
	$nestedData[] = $row["file"];
    $nestedData[] = $row["type"];
	$nestedData[] = $row["size"]; 
                  
	$data[] = $nestedData;
	$i++;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>