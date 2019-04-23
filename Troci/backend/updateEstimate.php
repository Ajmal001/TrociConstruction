<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
//checking whether anything has been posted to db
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    //Checking if submit button has been pressed.
    if (isset($_POST['submit'])) {

        //connecting to the db
        require_once("dbcon.php");
        $db_handle = new DBController();
            
            //Get id from the URL and assign it to the $id variable
            $id = $_GET['id'];

            //Update estimate with the posted information where the estimate id equates the URL id
            $query="UPDATE estimates SET
                    estimateID =    '".$_POST["estID"] . "',
                    date =          '".$_POST["date"] . "',
                    total =         '".$_POST["total"] . "',
                    client =        '".$_POST["clientName"] . "', 
                    address =       '".$_POST["address"] . "',
                    town =          '".$_POST["town"] . "', 
                    postcode =      '".$_POST["postcode"] . "',
                    description =   '".$_POST["Descr"] . "',
                    desc1 =         '".$_POST["Descr1"] . "',
                    desc2 =         '".$_POST["Descr2"] . "',
                    desc3 =         '".$_POST["Descr3"] . "',
                    desc4 =         '".$_POST["Descr4"] . "',
                    desc5 =         '".$_POST["Descr5"] . "',
                    descprice =     '".$_POST["qty"][0] . "',
                    descprice1 =    '".$_POST["qty"][1] . "',
                    descprice2 =    '".$_POST["qty"][2] . "',
                    descprice3 =    '".$_POST["qty"][3] . "',
                    descprice4 =    '".$_POST["qty"][4] . "',
                    descprice5 =    '".$_POST["qty"][5] . "',
                    vat =           '".$_POST["inideposit"] . "',
                    balance =       '".$_POST["remainingval"] . "'
                    WHERE estimateID = $id;";


                    $result = $db_handle->insertQuery($query);
                    if(!empty($result)) {
                        //If result has been successful, notify customer that estimate has been updated
                        echo "<script type='text/javascript'>alert('Estimate has been updated!');
                        window.location.href='allEstimates.php';
                        </script>";
                        exit;

                        } else {
                            //Otherwise, inform user there has been a problem
                            $message = "There was a problem saving this, please try again.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                }
        }
?>







