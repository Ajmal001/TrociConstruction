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
  <title>Troci - Edit User</title>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!--Adding the Navigation-->
<?php include("navbar.php")  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
        <!-- Getting users information based on the URL id, this is dependent on what has been clicked on from the datatable-->
        <?php
            @$id = $_GET['id'];
            $uid = mysql_real_escape_string($id);    
            $sql = "SELECT * FROM users WHERE user_id = '$uid'";
            $userinfo = mysql_query($sql);          
           
            while ($row = mysql_fetch_array($userinfo)){
            // making the row equal to 

            $ufname    = $row['firstname'];
            $usname    = $row['surname'];
            $uaddr    = $row['address'];
            $utown    = $row['town'];
            $upcode    = $row['postcode'];
            $umail    = $row['email'];
            $uphone    = $row['phone'];
            $uuname    = $row['username'];
            $upass    = $row['password'];
            $urole    = $row['role'];

             $dpass = decryptIt($upass);
            } 
    //getting information for the current logged in user.
    include('getUser.php');
    //checking whether the user logged in is a Super user, if so, they can view thir information or other users information.
    if($role=='Super')
    {
    ?>
              <!-- The information a super user should see-->
              <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="allUsers.php">Users</a>
        </li>
        <li class="breadcrumb-item">
          <a href="allUsers.php">Look-Up Users</a>
        </li>
        <li class="breadcrumb-item active">Edit Users</li>
      </ol>
        
        <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-user"></i> Edit <?php echo"$ufname $usname"; ?> 
            </div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="30"></canvas>
                    <form id="form" action="updateUser.php" name="frmRegistration" method="post">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" required="" placeholder="Enter First Name Here.." autofocus="" name="firstName" value="<?php echo"$ufname"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Surname</label>
                                    <input class="form-control" type="text" required="" placeholder="Enter Surname Here.." autofocus="" name="lastName" value="<?php echo"$usname"; ?>">
                                </div>	
                            </div>		
                            <hr>
                            <div class="row">	
                                <div class="col-sm-12 col-md-offset-3 form-group" id="lookup_field" ></div>
                            </div>
                            <div class="row">	
                                <div class="col-sm-4 form-group">
                                    <label>Address First Line</label>
                                    <input id="first_line" type="text" placeholder="Enter First Line Here.." class="form-control" name="address" value="<?php echo"$uaddr"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Town/City</label>
                                    <input id="post_town" type="text" placeholder="Enter City Here.." class="form-control" name="city" value="<?php echo"$utown"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Postcode</label>
                                    <input id="postcode" type="text" placeholder="Enter Postcode Here.." class="form-control" name="postcode" value="<?php echo"$upcode"; ?>">
                                </div>		
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" required="" placeholder="Enter Email Address Here.." autofocus="" name="email" value="<?php echo"$umail"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control" type="text" required="" placeholder="Enter Phone Number Here.." autofocus="" name="phone" value="<?php echo"$uphone"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <div class="form-group">
                                        <label>Role:</label>
                                        <!-- populate field with current users role, or selected users role. Show second option as opposite of first. -->
                                        <select name="role" value="<?php echo"$urole"; ?>" class="form-control" required>
                                            <option><?php if('Director' == $urole){echo"$urole";}else{echo"Super";} ?></option>
                                            <option><?php if('Super' == $urole){echo"Director";}else{echo"$urole";} ?></option>
                                        </select>
                                    </div>
                                </div>	                        
                            </div>		
                            <hr>
                            <div class="row">	
                                <div class="col-sm-4 form-group">
                                    <label>Username</label>
                                    <input readonly id="first_line" type="text" placeholder="Enter Username Here.." class="form-control" name="username" value="<?php echo"$uuname"; ?>">
                                    <input hidden id="first_line" type="text" class="form-control" name="id" value="<?php $id = $_GET['id']; echo"$id"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Password</label>
                                    <input onkeyup="CheckPasswordStrength(this.value)" id="password" name="password" type="password" placeholder="Enter Password Here.." class="form-control" name="password" value="<?php echo"$dpass"; ?>">
                                    <span id="password_strength"></span>
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Confirm Password</label>
                                    <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password Here.." value="<?php echo"$dpass"; ?>" class="form-control">
                                      <span id='message'></span>
                                </div>		
                            </div>
                        <div class="row">
                           <div style="margin: 0 auto; width: 12%; ">
                                   <button class="btn btn-default" type="submit" name="submit" value="Register"  value="Register" class="btnRegister" id="butonas" style="border:1px solid #0044c7;border-radius:20px;color:#008b06;box-shadow:none;text-shadow:none;padding:1px 15px;background:transparent;transition:background-color 0.25s;outline:none;font-size:25px;width:170px;height:38px;">Update User</button>
                            </div>
                            </div>
                        </div>                   
                    </form>
                </div>			
            </div>
<?php
}
?>  
  <?php
//getting information for the current logged in user.
include('getUser.php');
//Checking whether the current user is a Client... if so, they should be able to view their information below.
if($role=='Client')
{
    ?>
          <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit Profile</li>
      </ol>
        <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-user"></i> Edit <?php echo"$fname $sname"; ?> 
            </div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="30"></canvas>
                    <form id="form" action="updateUser.php" name="frmRegistration" method="post">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" required="" placeholder="Enter First Name Here.." autofocus="" name="firstName" value="<?php echo"$fname"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Surname</label>
                                    <input class="form-control" type="text" required="" placeholder="Enter Surname Here.." autofocus="" name="lastName" value="<?php echo"$sname"; ?>">
                                </div>	
                            </div>		
                            <hr>
                            <div class="row">	
                                <div class="col-sm-12 col-md-offset-3 form-group" id="lookup_field" ></div>
                            </div>
                            <div class="row">	
                                <div class="col-sm-4 form-group">
                                    <label>Address First Line</label>
                                    <input id="first_line" type="text" placeholder="Enter First Line Here.." class="form-control" name="address" value="<?php echo"$addr"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Town/City</label>
                                    <input id="post_town" type="text" placeholder="Enter City Here.." class="form-control" name="city" value="<?php echo"$town"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Postcode</label>
                                    <input id="postcode" type="text" placeholder="Enter Postcode Here.." class="form-control" name="postcode" value="<?php echo"$pcode"; ?>">
                                </div>		
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" required="" placeholder="Enter Email Address Here.." autofocus="" name="email" value="<?php echo"$mail"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control" type="text" required="" placeholder="Enter Phone Number Here.." autofocus="" name="phone" value="<?php echo"$phone"; ?>">
                                </div>	
                                  <div class="col-sm-4 form-group">
                             
                                        <input hidden class="form-control" type="text" required="" placeholder="Enter Phone Number Here.." autofocus="" name="role" value="<?php echo"$role"; ?>">
                                    </div>	                        
                            </div>		
                            <hr>
                            <div class="row">	
                                <div class="col-sm-4 form-group">
                                    <label>Username</label>
                                    <input readonly id="first_line" type="text" placeholder="Enter Username Here.." class="form-control" name="username" value="<?php echo"$uname"; ?>">
                                    <input hidden id="first_line" type="text" class="form-control" name="id" value="<?php $id = $_GET['id']; echo"$id"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Password</label>
                                    <input onkeyup="CheckPasswordStrength(this.value)" id="password" name="password" type="password" placeholder="Enter Password Here.." class="form-control" name="password" value="<?php echo"$dp"; ?>">
                                    <span id="password_strength"></span>
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Confirm Password</label>
                                    <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password Here.." value="<?php echo"$dp"; ?>" class="form-control">
                                      <span id='message'></span>
                                </div>		
                            </div>
                        <div class="row">
                           <div style="margin: 0 auto; width: 12%; ">
                                   <button class="btn btn-default" type="submit" name="submit" value="Register"  value="Register" class="btnRegister" id="butonas" style="border:1px solid #0044c7;border-radius:20px;color:#008b06;box-shadow:none;text-shadow:none;padding:1px 15px;background:transparent;transition:background-color 0.25s;outline:none;font-size:25px;width:170px;height:38px;">Update User</button>
                            </div>
                            </div>
                        </div>                   
                    </form>
                </div>			
        </div>
<?php
}
?>   
     
<?php
//getting information for the current logged in user.
include('getUser.php');
//Checking whether the current user is a Director... if so, they should be able to view their information below.
if($role=='Director')
{
    ?>
          <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit Profile</li>
      </ol>
        <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-user"></i> Edit <?php echo"$fname $sname"; ?>
            </div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="30"></canvas>
                    <form id="form" action="updateUser.php" name="frmRegistration" method="post">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" required="" placeholder="Enter First Name Here.." autofocus="" name="firstName" value="<?php echo"$fname"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Surname</label>
                                    <input class="form-control" type="text" required="" placeholder="Enter Surname Here.." autofocus="" name="lastName" value="<?php echo"$sname"; ?>">
                                </div>	
                            </div>		
                            <hr>
                            <div class="row">	
                                <div class="col-sm-12 col-md-offset-3 form-group" id="lookup_field" ></div>
                            </div>
                            <div class="row">	
                                <div class="col-sm-4 form-group">
                                    <label>Address First Line</label>
                                    <input id="first_line" type="text" placeholder="Enter First Line Here.." class="form-control" name="address" value="<?php echo"$addr"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Town/City</label>
                                    <input id="post_town" type="text" placeholder="Enter City Here.." class="form-control" name="city" value="<?php echo"$town"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Postcode</label>
                                    <input id="postcode" type="text" placeholder="Enter Postcode Here.." class="form-control" name="postcode" value="<?php echo"$pcode"; ?>">
                                </div>		
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" required="" placeholder="Enter Email Address Here.." autofocus="" name="email" value="<?php echo"$mail"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control" type="text" required="" placeholder="Enter Phone Number Here.." autofocus="" name="phone" value="<?php echo"$phone"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <div class="form-group">
                                        <label>Role:</label>
                                        <!-- populate field with current users role, or selected users role. Show second option as opposite of first. -->
                                        <select name="role" value="<?php echo"$role"; ?>" class="form-control" required>
                                            <option><?php if('Super' == $role){echo"$role";}else{echo"Director";} ?></option>
                                            <option><?php if('Director' == $role){echo"Super";}else{echo"$role";} ?></option>
                                        </select>
                                    </div>
                                </div>	                        
                            </div>		
                            <hr>
                            <div class="row">	
                                <div class="col-sm-4 form-group">
                                    <label>Username</label>
                                    <input readonly id="first_line" type="text" placeholder="Enter Username Here.." class="form-control" name="username" value="<?php echo"$uname"; ?>">
                                    <input hidden id="first_line" type="text" class="form-control" name="id" value="<?php $id = $_GET['id']; echo"$id"; ?>">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Password</label>
                                    <input onkeyup="CheckPasswordStrength(this.value)" id="password" name="password" type="password" placeholder="Enter Password Here.." class="form-control" name="password" value="<?php echo"$dp"; ?>">
                                    <span id="password_strength"></span>
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Confirm Password</label>
                                    <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password Here.." value="<?php echo"$dp"; ?>" class="form-control">
                                      <span id='message'></span>
                                </div>		
                            </div>
                        <div class="row">
                           <div style="margin: 0 auto; width: 12%; ">
                                   <button class="btn btn-default" type="submit" name="submit" value="Register"  value="Register" class="btnRegister" id="butonas" style="border:1px solid #0044c7;border-radius:20px;color:#008b06;box-shadow:none;text-shadow:none;padding:1px 15px;background:transparent;transition:background-color 0.25s;outline:none;font-size:25px;width:170px;height:38px;">Update User</button>
                            </div>
                            </div>
                        </div>                   
                    </form>
                </div>			
        </div>
<?php
}
?>  

<!-- adding footer-->
<?php include("footer.php")  ?>
  </div>  
 </div>
</body>

</html>
