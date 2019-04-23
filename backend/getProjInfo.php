<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
//checks whether an id exists in the URL
if(isset($_GET['id'])){
        //store the id into a variable
        $id = $_GET['id'];
            
            //get all data from all projects where the pp_id is equal to the url id
            $query = "SELECT * FROM allProjects WHERE pp_id=$id";

            $projinfo = mysql_query($query);      
    
            //use while loop to retrieve all information for the user
            while ($row = mysql_fetch_array($projinfo)){

            $proposalID    = $row['pp_id'];
            $desc    = $row['Description'];
            $jobdate    = $row['JobDate'];
            $docnum    = $row['DocumentNumber'];
            $add    = $row['Address'];
            $ward    = $row['Ward'];
            $client    = $row['Client'];
            $status    = $row['Status'];
            $probability    = $row['Probability'];
            $customer    = $row['Customer'];
            $intro    = $row['Intro'];


            };
    //change the format of the data retrieved. splitting the address where there are spaces.
    list($address, $address1, $address2, $town1, $postcode1, $postcode2) = array_pad(explode(' ', $add, 12), 6, null);
    //making the address from the broken fragments above.
    $addr = $address . ' ' . $address1 . ' ' . $address2;
    //initialising town as a value seperated from the string from the array above
    $twn = $town1;
    //initialising postcode as a value seperated from the string from the array above e.g. EN3 = postcode1  6AF = postcode1 when concatinated = EN3 6AF
    $pcode = $postcode1 . ' ' . $postcode2;

    }
?>