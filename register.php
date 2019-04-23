<!-- 
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troci Construction</title>
    <?php include("header.php")  ?>
</head>

<body>
    
<?php include 'registerFun.php'; ?>    
<div class="container">
	<div class="col-sm-8 col-md-offset-2 well" style="margin-top:70px">
	<div class="row">
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
						</div>		
                        <hr>
                        <div class="row">	
							<div class="col-sm-4 form-group">
								<label>Username</label>
								<input id="first_line" type="text" placeholder="Enter Username Here.." class="form-control" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Password</label>
								<input onkeyup="CheckPasswordStrength(this.value)" id="password" name="password" type="password" placeholder="Enter Password Here.." class="form-control" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
                                <span id="password_strength"></span>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Confirm Password</label>
								<input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password Here.." class="form-control">
                                  <span id='message'></span>
							</div>		
						</div>
                    </div>
                    <div class="row">	
                            <div id="center" style="margin-top:20px; margin-right:35px;">
                     <td><button class="btn btn-default" type="submit" name="submit" value="Register"  value="Register" class="btnRegister" id="butonas" style="border:1px solid #0044c7;border-radius:20px;color:#008b06;box-shadow:none;text-shadow:none;padding:1px 15px;background:transparent;transition:background-color 0.25s;outline:none;font-size:25px;width:190px;height:38px;margin-left:41px;margin-bottom:7px;">Register </button></td>
                        </div>
                    </div>
				</form>      
            </div>				
        </div>
    </div>

                          
<?php include("footer.php") ?>
<?php include("navbar.php") ?>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="assets/js/bs-animation.js"></script>
<script src="assets/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="../TROCI/assets/js/jquery-1.9.1.min.js"></script>
<script src="../TROCI/assets/js/jquery.postcodes.js"></script>

<!-- Code reused from https://github.com/ideal-postcodes/jquery.postcodes/blob/master/examples/simple.html -->
<script>
$('#lookup_field').setupPostcodeLookup({
  api_key: 'iddqd',
  output_fields: {
    line_1: '#first_line',  
    line_2: '#second_line',         
    line_3: '#third_line',
    post_town: '#post_town',
    postcode: '#postcode'
  }
});
</script>
<!-- Code reused from https://forum.freecodecamp.org/t/password-strength-meter/95403 -->
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
</script>
    
<style>
    
#center {
  width: 95%;
  display: flex;
  align-items: center;
  justify-content: center;
}
    

#idpc_input {
  float: left;
  width: 25%;
  border: 3px solid #1ebaff;
  padding: 1px;
  height: 35px;
  border-radius: 5px;
  outline: none;
  color: #60a9ff;
}
  

button {
 
    width: 100px;
    border:1px solid #0044c7;
    border-radius:20px;
    color:#008b06;
    box-shadow:none;
    text-shadow:none;
    padding:1px 10px;
    background:transparent;
    transition:background-color 0.25s;
    outline:none;
    font-size:11px;
    width:140px;
    height:32px;
    margin-left:20px;
    margin-bottom:7px;
}

    
</style>
    
<!-- Code reused from https://stackoverflow.com/questions/21727317/how-to-check-confirm-password-field-in-form-without-reloading-page -->
<script>

$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});

</script>
    
    
</body>
</html>
