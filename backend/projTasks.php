<?php   
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
//connect to the database
require_once("dbcon.php");
$db_handle = new DBController(); 

//initialise the below 4 vakues to 0
$i = 0; 
$j = 0; 
$k = 0; 
$l = 0; 
//a for wach loop is used to pick up the relevant information as an array and post it to the database.
foreach($_POST['boxes'] as $textbox){
    $training= $textbox;
    $name = $_POST['name'][$i];
    $id = $_POST["proj_id"][$j];
    $add = $_POST["address"][$k];
    $cid = $_POST["clientid"][$l];
    //Inserts the relevant information into the project breakdown, which is later pulled through and displayed on a chart.
    $sql ="INSERT INTO projectBreakdown (project_id,client_id,Address,JobName,taskBreakdown)VALUES ('$id', '$cid', '$add', '$name','$training')";
    $Added = $db_handle->insertQuery($sql);
    $i++;
    
}
?>      
		<script>
        //Notify's the user if the values have been added successfully.
		alert('Successfully added jobs.');
        //re-directs the user to the connectedClients.php page
        window.location.href='../backend/connectedClients.php';
        </script>

