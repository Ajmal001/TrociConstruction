<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
    //ends the session that the user is in and redirects to the access page (so the user can login again if they need to)
    session_start();
    session_destroy();
    header('location:../login.php');
?>