<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
if(isset($_POST['delete'])){
                //connecting to the db
                require_once("dbcon.php");
                $db_handle = new DBController(); 
                //inserting the deleted project into the learnData table of the database which can be later used for the machine learning algorithm
                $sql = "INSERT INTO learnData (pp_id, Description, JobDate, DocumentNumber, Address, Ward, Client, Agent, Status, Probability, Customer, Intro ) SELECT * FROM allProjects WHERE pp_id='" . $_POST["id"] . "'";
                //deleting the necessary record from the database.
                $sql1 = " DELETE FROM allProjects WHERE pp_id='" . $_POST["id"] . "'";
                $added = $db_handle->insertQuery($sql);
                $delete = $db_handle->insertQuery($sql1);
                if(!empty($delete)) {
                ?>
                    <!-- Notifying user that the record has been deleted -->
                    <script>
                    alert('Record has been deleted.');
                        window.location.href='../backend/potProjects.php';
                    </script>
                <?php    
                }
            } else 
    if(isset($_POST['remove'])){
        $id = $_GET['id'];
        require_once("dbcon.php");
        $db_handle = new DBController(); 
        //when the remove button is clicked, it removes the record from the projects table instead.
        $sql = "DELETE FROM projects WHERE project_id='$id'";
        $delete = $db_handle->insertQuery($sql);
        if(!empty($delete)) {   
        ?>
            <!-- Notifying user that the record has been deleted -->
            <script>
            alert('Record has been deleted.');
                window.location.href='../backend/ConnectedClients.php';
            </script>
        <?php    
    }
}
?>