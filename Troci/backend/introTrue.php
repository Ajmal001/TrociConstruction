<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
//checks that there is something to post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    //checking whether 'sent' button has been clicked
    if (isset($_POST['sent'])) {

        //connect to the db
        require_once("dbcon.php");
        $db_handle = new DBController();
        //get id from URL
        $id = $_GET['id'];

        //set the Intro field to SENT for record where pp_id is equal to the id of the URL.
        $query="UPDATE allProjects SET Intro = 'SENT' WHERE pp_id = $id;";
        $result = $db_handle->insertQuery($query);
                if(!empty($result)) {
                    //asks user to ensure physical job has been completed.
                    echo "<script type='text/javascript'>alert('Please make sure this welcome letter us exported as PDF & Posted to the client.');
                    window.location.href='projectsAll.php';
                    </script>";
                    exit;

                } else {
                    //alerts user if issue occours
                    $message = "There was a problem marking this as a posted welcome letter!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
        }
}

?>







