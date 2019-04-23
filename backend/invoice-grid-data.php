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


$columns = array( 
// datatable column index  => database column name
	0 =>'client', 
	1 => 'balance',
	2=> 'address'
);

// getting total number records without any search. SQL has been amended
$sql = "SELECT invoiceID ";
$sql.=" FROM invoices";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

//selecting all invoice details and concatinating the address components and naming it address
$sql = "SELECT invoiceID, client, balance, Concat(address, ', ', town, ', ', postcode) AS address ";
$sql.=" FROM invoices WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, then search based on the sql below, These have been amended to match the data retrieved
	$sql.=" AND ( client LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR invoiceID LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR address LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY invoiceID ASC  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get invoices");

$data = array();
$i=1+$requestData['start'];
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
    //this section has been amended.
    $clientName = trim(str_replace(range(0,9),'',$row["client"]));
	$nestedData[] = "#N".$row['invoiceID'] ;
	$nestedData[] = $clientName;
	$nestedData[] = $row["address"];
    $nestedData[] = "£".$row["balance"];
    $nestedData[] = $row['invoiceID'] ;
	         
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