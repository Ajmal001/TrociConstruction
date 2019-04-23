<?php 
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
Code has been amended from https://github.com/sanathp/largeCSV2mySQL/blob/master/csv2sql.php
*****************************************************************************************************/
//credentials to connect to database
$sqlname='localhost';
$username='root';
$password='';
$table='allProjects'; 
$db='Troci';
@$file=$_POST['csv'];
//checks that file is existent
if($file != null){
                    //makes connection to database using information provided above
                    $con= mysqli_connect("$sqlname", "$username","$password","$db") or die(mysql_error());
                    //loads the data from the csv file into the allProjects db table.
                    mysqli_query($con, '
                    

                    LOAD DATA LOCAL INFILE "'.$file.'" INTO TABLE '.$table.' 
                    FIELDS TERMINATED BY \'|\' LINES TERMINATED BY \'\n\' IGNORE 1 LINES  
    
                    
                    ')or die(mysql_error());
                    //alerts the user that the files have been added to the table
                    echo "<script>
                    alert('Records have been added to the table. CSV File has been uploaded & deleted from the csvtosql folder');
                    window.history.back();
                    </script>";
                    //unlinks the file from the directory 'Removed from directory so that new files can be added.)
                    @unlink($file);
                    //If the file name has not been added, user is notified.
                    } else if($file == null){
                    echo "<script>
                        alert('Please add file name.');
                        window.history.back();
                        </script>";
}
?>