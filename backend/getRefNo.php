<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
//connecting to db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TROCI";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//getting all data from estimates and ordering it based on the id. The results are limited to 1
$sql = "SELECT * FROM estimates ORDER BY estimateID DESC LIMIT 1";
$result = $conn->query($sql);
//checks whether any results have been retrieved
if ($result->num_rows > 0) {
    //if results are present using while loop to retrieve all the data for that row.
    while($row = $result->fetch_assoc()) {
        
            $estID    = $row['estimateID'];
            $date    = $row['date'];
            $total    = $row['total'];
            $client    = $row['client'];
            $address    = $row['address'];
            $town    = $row['town'];
            $pcode    = $row['postcode'];
            $desc    = $row['description'];
            $desc1    = $row['desc1'];
            $desc2    = $row['desc2'];
            $desc3    = $row['desc3'];
            $desc4    = $row['desc4'];
            $desc5    = $row['desc5'];
            $dprice    = $row['descprice'];
            $dprice1    = $row['descprice1'];
            $dprice2    = $row['descprice2'];
            $dprice3    = $row['descprice3'];
            $dprice4    = $row['descprice4'];
            $dprice5    = $row['descprice5'];
    }
    //working out the reference if the next estimate by getting the previous id and incrementing by 1.
    $estRef = $estID + 1;
} else {
    //if no results are located, inform the user.
    echo "0 results";
}
//close the connection to the database once fininshed.
$conn->close();
?> 








