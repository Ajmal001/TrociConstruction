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
    <?php include("header.php") ?>
</head>

<body>
    <div class="login-card" style="margin-top:162px;margin-bottom:12px;">
        <p class="profile-name-card"> </p>
        <form class="form-signin" id="form" method="post" name="form1" action="loginFun.php"><span class="reauth-email"> </span>
            <input class="form-control" type="text" required="" name="username" placeholder="Username" autofocus="" id="username">
            <input class="form-control" type="password" name="password" required="" placeholder="Password" id="inputPassword">
            <div class="checkbox">
                <div class="checkbox">
                    <label>
                        <input type="checkbox">Remember me</label>
                </div>
                <button class="btn btn-default" type="submit" name="Submit" id="butonas" data-bs-hover-animate="pulse" value="$_POST[$username];" style="border:1px solid #0044c7;border-radius:20px;color:#008b06;box-shadow:none;text-shadow:none;padding:1px 15px;background:transparent;transition:background-color 0.25s;outline:none;font-size:25px;width:190px;height:38px;margin-left:41px;margin-bottom:7px;">Login</button><a href="../TROCI/register.php" style="margin-left:87px;">Sign Up with us!</a></div>
        </form></div>
    <div class="footer-basic" style="height:233px;padding-top:4px;">
        <footer>
            <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-linkedin"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
            <p class="copyright">Troci Construction© 2018</p>
        </footer>
    </div>
    <?php include("navbar.php") ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>