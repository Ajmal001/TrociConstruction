<!-- 
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Troci - Add User</title>
</head>
    
  <!-- Navigation-->
  <?php include("navbar.php")  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../backend/index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="../backend/users.php">Users</a>
        </li>
        <li class="breadcrumb-item active">Add User</li>
      </ol>

        <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-user"></i> New User Form
            </div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
                
                <!-- Register user form -->
                <?php include 'registerUsr.php'; ?>
                <form id="form" name="frmRegistration" method="post">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" required="" placeholder="Enter First Name Here.." autofocus="" name="firstName" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>">
                            </div>	
                            <div class="col-sm-4 form-group">
                                <label>Surname</label>
                                <input class="form-control" type="text" required="" placeholder="Enter Surname Here.." autofocus="" name="lastName" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>">
                            </div>	
                        </div>		
                        <hr>
                        <div class="row">	
                            <div class="col-sm-12 col-md-offset-3 form-group" id="lookup_field" ></div>
                        </div>
                        <div class="row">	
                            <div class="col-sm-4 form-group">
                                <label>Address First Line</label>
                                <input id="first_line" type="text" placeholder="Enter First Line Here.." class="form-control" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>">
                            </div>	
                            <div class="col-sm-4 form-group">
                                <label>Town/City</label>
                                <input id="post_town" type="text" placeholder="Enter City Here.." class="form-control" name="city" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>">
                            </div>	
                            <div class="col-sm-4 form-group">
                                <label>Postcode</label>
                                <input id="postcode" type="text" placeholder="Enter Postcode Here.." class="form-control" name="postcode" value="<?php if(isset($_POST['postcode'])) echo $_POST['postcode']; ?>">
                            </div>		
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" required="" placeholder="Enter Email Address Here.." autofocus="" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                            </div>	
                            <div class="col-sm-4 form-group">
                                <label>Phone Number</label>
                                <input class="form-control" type="text" required="" placeholder="Enter Phone Number Here.." autofocus="" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                            </div>	
                            <div class="col-sm-4 form-group">
                                <div class="form-group">
                                    <label>Role:</label>
                                    <select name="role" value="<?php if(isset($_POST['role'])) echo $_POST['role']; ?>" class="form-control" required>
                                        <option>Director</option>
                                        <option>Super</option>
                                    </select>
                                </div>
                            </div>	                        
                        </div>		
                        <hr>
                        <div class="row">	
                            <div class="col-sm-4 form-group">
                                <label>Username</label>
                                <input id="first_line" type="text" placeholder="Enter Username Here.." class="form-control" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
                            </div>	
                            <div class="col-sm-4 form-group">
                                <label>Password</label>
                                <!-- Check passwords are the same and their strength, this code was written by Mudassar Khan and has been amended... can be located in: https://www.aspsnippets.com/Articles/Password-Strength-validation-example-using-JavaScript-and-jQuery.aspx-->
                                <input onkeyup="CheckPasswordStrength(this.value)" id="password" name="password" type="password" placeholder="Enter Password Here.." class="form-control" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
                                <span id="password_strength"></span>
                            </div>	
                            <div class="col-sm-4 form-group">
                                <label>Confirm Password</label>
                                <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password Here.." class="form-control">
                                  <span id='message'></span>
                            </div>		
                        </div>
                         <div class="row">	
                            <div id="center" style="margin-top:20px; margin-right:35px;">      
                                <td><button class="btn btn-default" type="submit" name="submit" value="Register"  value="Register" class="btnRegister" id="butonas" style="border:1px solid #0044c7;border-radius:20px;color:#008b06;box-shadow:none;text-shadow:none;padding:1px 15px;background:transparent;transition:background-color 0.25s;outline:none;font-size:25px;width:190px;height:38px;margin-left:41px;margin-bottom:7px;">Register</button></td>
                            </div>
                        </div>
                    </div>                   
                </form>
            </div>			
        </div>
      </div>
    </div>
<!-- Footer -->
<?php include("footer.php")  ?>

<!-- Javascript to check passwords are the same and their strength, this code was written by Mudassar Khan and can be located in: https://www.aspsnippets.com/Articles/Password-Strength-validation-example-using-JavaScript-and-jQuery.aspx-->
<script type="text/javascript">
        function CheckPasswordStrength(password) {
            var password_strength = document.getElementById("password_strength");

            //TextBox left blank.
            if (password.length == 0) {
                password_strength.innerHTML = "";
                return;
            }

            //Regular Expressions.
            var regex = new Array();
            regex.push("[A-Z]"); //Uppercase Alphabet.
            regex.push("[a-z]"); //Lowercase Alphabet.
            regex.push("[0-9]"); //Digit.
            regex.push("[$@$!%*#?&]"); //Special Character.

            var passed = 0;

            //Validate for each Regular Expression.
            for (var i = 0; i < regex.length; i++) {
                if (new RegExp(regex[i]).test(password)) {
                    passed++;
                }
            }

            //Validate for length of Password.
            if (passed > 2 && password.length > 8) {
                passed++;
            }

            //Display status.
            var color = "";
            var strength = "";
            switch (passed) {
                case 0:
                case 1:
                    strength = "Weak";
                    color = "red";
                    break;
                case 2:
                    strength = "Good";
                    color = "darkorange";
                    break;
                case 3:
                case 4:
                    strength = "Strong";
                    color = "green";
                    break;
                case 5:
                    strength = "Very Strong";
                    color = "darkgreen";
                    break;
            }
            password_strength.innerHTML = strength;
            password_strength.style.color = color;
        }
    
            $('#password, #confirm_password').on('keyup', function () {
          if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
          } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
</script>
    
<!-- CSS styling to ensure buttons are centered -->
<style>
    
#center {
  width: 95%;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
    
</html>