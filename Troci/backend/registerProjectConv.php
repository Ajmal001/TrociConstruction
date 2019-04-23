<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
some code of image upload adopted from http://www.codingcage.com/2014/12/file-upload-and-view-with-php-and-mysql.html
*****************************************************************************************************/
//check if the convert button is pressed
if(isset($_POST['convert']))
{    
    //connect to db
    include('dbcon.php');
    //initialise files
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
	{   // inseting the upload into the allDocs table
		$sql="INSERT INTO allDocs(file,type,size) VALUES('$final_file','$file_type','$new_size')";
		mysql_query($sql);
		?>
		<script>
        //notifying user successful
		alert('Successfully created project.');
        window.location.href='../backend/potProjects.php';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
        //notifying user successful
		alert('Successfully created project.');
        window.location.href='../backend/potProjects.php';
        </script>
		<?php
	}
}

//assign the customer name to $input
$input = $_POST["clientName"];
//removing any digits from the customer name
$client_id = preg_replace("/[^0-9.]/", '', $input);
    //if the form was posted with something and the client id was not empty it will run this block.
    if(count($_POST)>0 && $client_id != null ) {
            //connecting to db
            require_once("dbcon.php");
            $db_handle = new DBController(); 
            
            //Updating the learn dataset with the project that has been added, in order to provide to the machine learning algorithm when sufficient data is gathered.
            "UPDATE learnData SET Customer = 'TRUE' WHERE pp_id='" . $_POST["id"] . "'";
                 
            $query = "INSERT INTO projects (Description, Address, Ward, Postcode, Client, client_id) VALUES
            ('" . $_POST["description"] . "',  '" . $_POST["address"] . "', '" . $_POST["city"] . "', '" . $_POST["postcode"] . "','" . $_POST["clientName"] . "', $client_id)";
            $add = "INSERT INTO learnData (pp_id, Description, JobDate, DocumentNumber, Address, Ward, Client, Agent, Status, Probability, Customer, Intro ) SELECT * FROM allProjects WHERE pp_id='" . $_POST["id"] . "'";
            $update = "UPDATE learnData SET Customer = 'TRUE' , Client = '" . $_POST["clientName"] . "' WHERE pp_id='" . $_POST["id"] . "'";
            $sql = "DELETE FROM allProjects WHERE pp_id='" . $_POST["id"] . "'";
            $addLearn = $db_handle->insertQuery($add);
            $cutrue = $db_handle->insertQuery($update);
            $delete = $db_handle->insertQuery($sql);
            $result = $db_handle->insertQuery($query);
            if(!empty($result)) {
                exit;
                unset($_POST);
            } 
            
        }

    //when the data is posted, this block will also be executed.
    if(count($_POST)>0) {
            //connecting to db
            require_once("dbcon.php");
            $db_handle = new DBController(); 

            //inserting the project into the projects table also, so it can be worked on in the system
            $query = "INSERT INTO projects (Description, Address, Ward, Postcode, Client        ) VALUES
            ('" . $_POST["description"] . "',  '" . $_POST["address"] . "', '" . $_POST["city"] . "', '" . $_POST["postcode"] . "','" . $_POST["clientName"] . "')";
            $add = "INSERT INTO learnData (pp_id, Description, JobDate, DocumentNumber, Address, Ward, Client, Agent, Status, Probability, Customer, Intro ) SELECT * FROM allProjects WHERE pp_id='" . $_POST["id"] . "'";
            $update = "UPDATE learnData SET Customer = 'TRUE', Client = '" . $_POST["clientName"] . "' WHERE pp_id='" . $_POST["id"] . "'";
            $sql = "DELETE FROM allProjects WHERE pp_id='" . $_POST["id"] . "'";
            $addLearn = $db_handle->insertQuery($add);
            $cutrue = $db_handle->insertQuery($update);
            $delete = $db_handle->insertQuery($sql);
            $result = $db_handle->insertQuery($query);
            if(!empty($result)) {
                exit;
                unset($_POST);
            }  
        }
?>