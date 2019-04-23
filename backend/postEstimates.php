<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
//checks whether something has been posted.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //if submit button has been pressed, the first block is executed.
    if (isset($_POST['submit'])) {
                //connects to the db
                require_once("dbcon.php");
                $db_handle = new DBController();
                //assigns the 'clientName' from the form to the variable $cn
                $cn= "clientName";
                //characters from 1 to 9 are stripped from the clients name
                $clientName = trim(str_replace(range(0,9),'',$cn));
                //the data from the form is loaded into the estimates table.
                $query = "INSERT INTO `estimates` (
                estimateID, 
                date, 
                total, 
                client, 
                address, 
                town, 
                postcode,
                description,
                desc1,
                desc2,
                desc3,
                desc4,
                desc5,
                descprice,
                descprice1,
                descprice2,
                descprice3,
                descprice4,
                descprice5,
                vat,
                balance) VALUES (
                                '".$_POST["estID"] . "',
                                '".$_POST["date"] . "',  
                                '".$_POST["total"] . "', 
                                '".$_POST[$clientName] . "', 
                                '".$_POST["address"] . "', 
                                '".$_POST["town"] . "', 
                                '".$_POST["postcode"] . "',
                                '".$_POST["Descr"] . "',
                                '".$_POST["Descr1"] . "',
                                '".$_POST["Descr2"] . "',
                                '".$_POST["Descr3"] . "',
                                '".$_POST["Descr4"] . "',
                                '".$_POST["Descr5"] . "',
                                '".$_POST["qty"][0] . "',
                                '".$_POST["qty"][1] . "',
                                '".$_POST["qty"][2] . "',
                                '".$_POST["qty"][3] . "',
                                '".$_POST["qty"][4] . "',
                                '".$_POST["qty"][5] . "',
                                '".$_POST["inideposit"] . "',
                                '".$_POST["remainingval"] . "')";
                $result = $db_handle->insertQuery($query);
                if(!empty($result)) {
                    //if all variables are inserted successfully into the database, the user is alerted with the below message.
                    echo "<script type='text/javascript'>alert('Estimate has been saved!');
                    window.location.href='estimate.php';
                    </script>";
                    exit;
                        } else {
                                //in the insatnce of the user not being able to submit the form or having other difficulties, they will be alerted. 
                                $message = "There was a problem saving this, please try again.";
                                echo "<script type='text/javascript'>alert('$message');</script>";
                         }
                 }
        }
?>