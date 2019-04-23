<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
session_start();
include('dbcon.php');
//username and password sent from form 
$username=$_POST['username']; 
$password=$_POST['password']; 
 
//we use the function created in dbconnection.php to encrypt the password.
$encrypted = encryptIt( $password );

// To protect MySQL injection
$username = stripslashes($username);
$password = stripslashes($encrypted);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$sql="SELECT * FROM clients WHERE username='$username' AND password = '$password' ";
$sqlUser="SELECT * FROM users WHERE username='$username' AND password = '$password'";
$result=mysql_query($sql);
$resultUser=mysql_query($sqlUser);

// Mysql_num_row is counting table row for both user as admin and regular user 
$count=mysql_num_rows($result);
$countUser=mysql_num_rows($resultUser);
 

$_SESSION["uname"] = $username;
global $username;


//if the user is a regular user, redirect into the users section. 
if($countUser==1){

    $_SESSION['users'] = $username;    
    mysql_query("UPDATE `users` SET `activity` = now() WHERE username='$username'");  //updates the timestamp to set the 'activity' time to NOW (the current moment when the user logs in)
    header("location:../TROCI/backend/index.php");
}else {
if($count==1){ //Alternativley if the user is a client user, redirect into the clients section. 
    $_SESSION['clients'] = $username;
     mysql_query("UPDATE `clients` SET `activity` = now() WHERE username='$username' ");
    header("location:../TROCI/backend/myProjects.php");
}
else {
        echo 
            "<script language=\"JavaScript\">\n";
                        echo "alert('Username or Password was incorrect, please try again!');\n";
                        echo "window.location='login.php'";
                        echo "</script>";
    }
} 
?>