<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
function arr(){
require_once('dbcon.php');
session_start();
$query= mysql_query("SELECT * FROM clients WHERE username = '".$_SESSION['uname']."' ")or die(mysql_error());
$arr = mysql_fetch_array($query);
$num = mysql_numrows($query); //this will count the rows (if exists) 
$name =  $arr['firstname'];
$sname =  $arr['surname'];
$id = $arr['client_id'];
$GLOBALS['cid'] = $name. " ". $sname . " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;" . $id;
};
    arr();
echo"$cid";

?> 

