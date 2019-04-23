<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
Code adapted from http://www.codingcage.com/2014/12/file-upload-and-view-with-php-and-mysql.html
*****************************************************************************************************/
//check if submit button has been pressed
if(isset($_POST['submit']))
{    
    //connect to datavase
    include('dbcon.php');
    //Initialising variables
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="../assets/uploads/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{   //Inserting the file into the allDocs section of the database
		$sql="INSERT INTO allDocs(file,type,size) VALUES('$final_file','$file_type','$new_size')";
		mysql_query($sql);
		?>
		<script>
        //notifying user it worked
		alert('Successfully created project.');
        window.location.href='../backend/addProject.php';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Successfully created project.');
        window.location.href='../backend/addProject.php';
        </script>
		<?php
	}
}
//This has been added to also post the project info.
    if(count($_POST)>0) {
            //connecting to db
            require_once("dbcon.php");
            $db_handle = new DBController(); 
            //also posting the project information at the same time as thge file.
            $query = "INSERT INTO projects (Description, Address, Ward, Postcode, Client) VALUES
            ('" . $_POST["description"] . "',  '" . $_POST["address"] . "', '" . $_POST["city"] . "', '" . $_POST["postcode"] . "','" . $_POST["clientName"] . "')";
            $result = $db_handle->insertQuery($query);
            if(!empty($result)) {

                exit;
                unset($_POST);
            } 
            
        }
?>