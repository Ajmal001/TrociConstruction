<?php
/****************************************************************************************************
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
*****************************************************************************************************/
//Connecting to db
$host="localhost"; // Host name 
$user="root"; // Mysql username 
$password=""; // Mysql password 
$database="Troci"; // Database name 
$tbl_cli="clients"; // Table name 
$tbl_usr="users"; // Table name 
$tbl_prod="products"; // Table name 


// Connect to server and select databse.
@mysql_connect("$host", "$user", "$password")or die("cannot connect"); 
mysql_select_db("$database")or die("cannot select DB");

function connectDB() {
		@$conn = mysql_connect($this->host,$this->user,$this->password);
		return $conn;
	}
	
	function selectDB($conn) {
		mysql_select_db($this->database,$conn);
	}
	
	function runQuery($query) {
		$result = mysql_query($query);
		while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysql_query($query);
		$rowcount = mysql_num_rows($result);
		return $rowcount;	
	}
	
	function updateQuery($query) {
		$result = mysql_query($query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}
	
	function insertQuery($query) {
		$result = mysql_query($query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}
	
	function deleteQuery($query) {
		$result = mysql_query($query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}

    //ckeck that the user is logged in before giving access to pages. ADMIN & clients have access
    function checklogin(){
        session_start();
        if ( !isset($_SESSION['clients'])){
            if ( !isset($_SESSION['users'])  ){
            header("Location:../login.php");
        } 
           
        }
            
    }
    //ckecks whether the user is a client user
    function userName(){
        session_start();
        if ( !isset($_SESSION['clients'])){
            if ( !isset($_SESSION['users'])  ){
            header("Location:../login.php");
        } 
           
        }
            
    }
    //ckecks whether the user is an admin user
    function checkAdmin(){
            session_start();
            if ( !isset($_SESSION['users'])  ){
                header("Location:../user/authorisation.php");
            }else{

            }
        }
    //encrypts the password, used from https://gist.github.com/gavande/64fde4717809016a88e8
    function encryptIt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
        return( $qEncoded );
    } 
    //encrypts the password, used from https://gist.github.com/gavande/64fde4717809016a88e8
    function decryptIt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
        return( $qDecoded );
    }
    //using the controller class to work with databases
    class DBController {
        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $database = "Troci";

        function __construct() {
            $conn = $this->connectDB();
            if(!empty($conn)) {
                $this->selectDB($conn);
            }
        }

        function connectDB() {
            $conn = mysql_connect($this->host,$this->user,$this->password);
            return $conn;
        }

        function selectDB($conn) {
            mysql_select_db($this->database,$conn);
        }

        function runQuery($query) {
            $result = mysql_query($query);
            while($row=mysql_fetch_assoc($result)) {
                $resultset[] = $row;
            }		
            if(!empty($resultset))
                return $resultset;
        }

        function numRows($query) {
            $result  = mysql_query($query);
            $rowcount = mysql_num_rows($result);
            return $rowcount;	
        }

        function updateQuery($query) {
            $result = mysql_query($query);
            if (!$result) {
                die('Invalid query: ' . mysql_error());
            } else {
                return $result;
            }
        }

        function insertQuery($query) {
            $result = mysql_query($query);
            if (!$result) {
                die('Invalid query: ' . mysql_error());
            } else {
                return $result;
            }
        }

        function deleteQuery($query) {
            $result = mysql_query($query);
            if (!$result) {
                die('Invalid query: ' . mysql_error());
            } else {
                return $result;
            }
        }
    }
?>