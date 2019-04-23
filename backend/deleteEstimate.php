<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['delete'])) {
            /* if user has registered encrypt the password and send the information to the database */
            require_once("dbcon.php");
            $db_handle = new DBController();
            $id = $_GET['id'];
            $query="DELETE FROM estimates WHERE estimateID = $id;";
            $result = $db_handle->insertQuery($query);
            if(!empty($result)) {
                echo "<script type='text/javascript'>alert('Estimate has been deleted!');
                window.location.href='allEstimates.php';
                </script>";   
                exit;
                    } else 
                            {
                                $message = "There was a problem saving this, please try again.";
                                echo "<script type='text/javascript'>alert('$message');</script>";
                            }
            }
}
?>