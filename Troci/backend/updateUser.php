<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
    if(count($_POST)>0) {
        /* Form Required Field Validation */
        foreach($_POST as $key=>$value) {
        if(empty($_POST[$key])) {

            echo "<script>
            alert('$key needs to be populated.');
            window.location.href='register.php';
            </script>";
            exit;
        }else
            
        /* Password Matching Validation */
        if($_POST['password'] != $_POST['confirm_password']){ 
                echo "<script type='text/javascript'>alert('Passwords do not match, please try again.');
                window.location.href='login.php';
                </script>";
                exit;
        }else
        /* Email Validation */
        if(!isset($message)) {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                echo "<script type='text/javascript'>alert('Invalid E-mail, Please try again!');
                window.location.href='register.php';
                </script>";
                exit;
        }else
            if(isset($_POST['userName']) && isset($_POST['password'])){
            require_once("dbcon.php");
            $db_handle = new DBController();
			$user = $_POST['userName'];
			$pass = $_POST['password'];

			$query = mysql_query("SELECT * FROM clients WHERE username='$user'");
			if(mysql_num_rows($query) > 0 ) { //check if there is already an entry for that username
				echo "<script type='text/javascript'>alert('This username is taken!');
                window.location.href='register.php';
                </script>";
                exit;
			                             }
                        }
            
        }

                /* if user has registered encrypt the password and send the information to the database */
                if(!isset($message)) {
                    require_once("dbcon.php");
                    $db_handle = new DBController();

                     if(isset($_POST['password'])){
                    require_once("dbcon.php");
                    $db_handle = new DBController(); 

                    $pass = $_POST['password'];
                    $encrypted = encryptIt( $pass );

                    $password = $encrypted;
                        //if the user being updated is a client, update the following
                        if($_POST["role"] == 'Client'){
                                $query = "UPDATE clients 
                                            SET
                                            firstname = '" . $_POST["firstName"] . "',
                                            surname = '" . $_POST["lastName"] . "',
                                            address = '" . $_POST["address"] . "',
                                            town = '" . $_POST["city"] . "',
                                            postcode ='" . $_POST["postcode"] . "',
                                            email = '" . $_POST["email"] . "',
                                            phone = '" . $_POST["phone"] . "',
                                            password ='$password'
                                            WHERE 
                                            client_id = '" . $_POST["id"] . "'";

                                            $result = $db_handle->insertQuery($query);

                                if(!empty($result)) {
                                    //notify user update successfuk.
                                    echo "<script type='text/javascript'>alert('Your account has been updated');
                                    window.location.href='../backend/index.php';
                                    </script>";
                                    exit;
                                    unset($_POST);
                                    
                                } else {
                                    //notify user that theres a problem
                                    $message = "problem with your registration, please try again!";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                }

                                }
                                //if user is a super user or director, do the below update instead.
                                if($_POST["role"] == 'Super' || $_POST["role"] == 'Director'){
                                        $query = "UPDATE users 
                                                    SET
                                                    firstname = '" . $_POST["firstName"] . "',
                                                    surname = '" . $_POST["lastName"] . "',
                                                    address = '" . $_POST["address"] . "',
                                                    town = '" . $_POST["city"] . "',
                                                    postcode ='" . $_POST["postcode"] . "',
                                                    email = '" . $_POST["email"] . "',
                                                    phone = '" . $_POST["phone"] . "',
                                                    password ='$password',
                                                    role = '" . $_POST["role"] . "'
                                                    WHERE 
                                                    user_id = '" . $_POST["id"] . "'";

                                                    $result = $db_handle->insertQuery($query);

                                        if(!empty($result)) {
                                            //notify user of successful update
                                            echo "<script type='text/javascript'>alert('Your account has been updated');
                                            window.location.href='../backend/index.php';
                                            </script>";
                                            exit;
                                            unset($_POST);
                                            
                                        } else {
                                            //notify user that theres a problem 
                                            $message = "problem with your registration, please try again!";
                                            echo "<script type='text/javascript'>alert('$message');</script>";
                                        }

                                     }
                              }
                      }
                }
        }
?>