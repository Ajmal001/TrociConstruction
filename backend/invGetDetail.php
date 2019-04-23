<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
//get id from URL
$id = $_GET['id'];
            //get invoice where id is equal to the url id
            $query = "SELECT * FROM invoices WHERE invoiceID=$id";
            $userinfo = mysql_query($query);          
            //use a while loop to retrieve all the inforamtion for the invoice rows.
            while ($row = mysql_fetch_array($userinfo)){
            // making the row equal to 

            $estID    = $row['invoiceID'];
            $date    = $row['date'];
            $total    = $row['total'];
            $name    = $row['client'];
            $add    = $row['address'];
            $town    = $row['town'];
            $pcode    = $row['postcode'];
            $desc    = $row['description'];
            $desc1    = $row['desc1'];
            $desc2    = $row['desc2'];
            $desc3    = $row['desc3'];
            $desc4    = $row['desc4'];
            $desc5    = $row['desc5'];
            $descprice    = $row['descprice'];
            $descprice1    = $row['descprice1'];
            $descprice2    = $row['descprice2'];
            $descprice3    = $row['descprice3'];
            $descprice4    = $row['descprice4'];
            $descprice5    = $row['descprice5'];
            $vat    = $row['vat'];
            $bal    = $row['balance'];

            };
?>