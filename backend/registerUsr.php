<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
//if something is posted, execute the following.  
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

                $query = "INSERT INTO users (firstname, surname, address, town, postcode, email, phone, username, password, role) VALUES
                ('" . $_POST["firstName"] . "', '" . $_POST["lastName"] . "', '" . $_POST["address"] . "', '" . $_POST["city"] . "', '" . $_POST["postcode"] . "', '" . $_POST["email"] . "', '" . $_POST["phone"] . "', '" . $_POST["username"] . "', '$password', '" . $_POST["role"] . "')";
                $result = $db_handle->insertQuery($query);
                if(!empty($result)) {
                    echo "<script type='text/javascript'>alert('Your account has been created, use the informtion to login');
                    window.location.href='users.php';
                    </script>";
                    exit;

                        exit;

                    unset($_POST);
                } else {
                    $message = "problem with your registration, please try again!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }
        }
    }
}
?>