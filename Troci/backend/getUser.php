<?php   
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
//Used to display the name for both user and admin information who are currently logged in.                                            

            //gets the username of the current user that is logged in.
            @$user = $_SESSION['users'];
            //prevents any sql injection and initialises the variable.
            $username = mysql_real_escape_string($user); 
            //gets all users where the username is equal to the user that is logged in. 
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $userinfo = mysql_query($sql);          
           
            //uses while loop to return all information for the current logged in user.
            while ($row = mysql_fetch_array($userinfo)){

            $usrID    = $row['user_id'];
            $fname    = $row['firstname'];
            $sname    = $row['surname'];
            $addr    = $row['address'];
            $town    = $row['town'];
            $pcode    = $row['postcode'];
            $mail    = $row['email'];
            $phone    = $row['phone'];
            $uname    = $row['username'];
            $pass    = $row['password'];
            $role    = $row['role'];
                
                //decrypts the password and assigns the decrypted password to dp
                decryptIt($pass);
                $dp = decryptIt($pass);
            }           
            
            //gets the username of the current user that is logged in.
            @$user = $_SESSION['clients'];
            //prevents any sql injection and initialises the variable.
            $username = mysql_real_escape_string($user);    
            //gets all users where the username is equal to the user that is logged in. 
            $sql = "SELECT * FROM clients WHERE username = '$username'";
            $userinfo = mysql_query($sql);          
        
            //uses while loop to return all information for the current logged in user.
            while ($row = mysql_fetch_array($userinfo)){

            $usrID    = $row['client_id'];
            $fname    = $row['firstname'];
            $sname    = $row['surname'];
            $addr    = $row['address'];
            $town    = $row['town'];
            $pcode    = $row['postcode'];
            $mail    = $row['email'];
            $phone    = $row['phone'];
            $uname    = $row['username'];
            $pass    = $row['password'];
            $role    = $row['role'];

                //decrypts the password and assigns the decrypted password to dp
                 decryptIt($pass);
                 $dp = decryptIt($pass);
            } 
?>