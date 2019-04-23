<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
//checks whether the user has posted the actioned form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //gets the id from the URL
    $id = $_GET['id'];
    //searches for all the invoices based on the invoice id
    $query = mysql_query("SELECT * FROM invoices WHERE invoiceID=$id");
        //checks whether the user has clicked on the submit and whether an invoice with that ID exists.
        if (mysql_num_rows($query) > 0 && isset($_POST['submit'])) {
            //if invoice already exists, inform user
            echo "<script type='text/javascript'>alert(\"Invoice has already been generated for this Estimate.\");</script>";    
        }else{
            // if invoice does not exist, connect to the db
            require_once("dbcon.php");
            $db_handle = new DBController();
            //create an invoice by inserting all of the information from the invoice.
            $query = "INSERT INTO `invoices` (  invoiceID, 
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
                                                balance) 
                                                VALUES ('".$_POST["estID"] . "',
                                                '".$_POST["date"] . "',  
                                                '".$_POST["total"] . "', 
                                                '".$_POST["clientName"] . "', 
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
                                                    echo "<script type='text/javascript'>alert('Invoice has been created!');
                                                    window.location.href='estimate.php';
                                                    </script>";


                                                        exit;

                                                } else {
                                                    $message = "There was a problem saving this, please try again.";
                                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                                }
                            }
            }



?>