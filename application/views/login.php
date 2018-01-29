
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Minimal an Admin Panel Category Flat Bootstrap Responsive Website Template | Signin :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo base_url();?>/assets2/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo base_url();?>/assets2/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url();?>/assets2/css/font-awesome.css" rel="stylesheet"> 
<script src="<?php echo base_url();?>/assets2/js/jquery.min.js"> </script>
<script src="<?php echo base_url();?>/assets2/js/bootstrap.min.js"> </script>
<style type="text/css">
    .login-bottom {
        width: 20%;
    }
</style>
</head>
<body>
    <div class="login">
        <!-- <h1><a href="index.html">LOMBOK GEO</a></h1> -->
        <div class="login-bottom">
            <h2 style="text-align: center; font-weight: bold;">Login</h2>
            <?php echo $error; ?>
            <form action ="<?php echo $action ?>" method="post">
            <div class="col-md-12">
                <div class="login-mail">
                    <input type="text" placeholder="Username" required="" name="username">
                    <i class="fa fa-user"></i>
                </div>
                <div class="login-mail">
                    <input type="password" placeholder="Password" required="" name="password">
                    <i class="fa fa-lock"></i>
                </div>
               <div class="login-do">
               <label class="hvr-shutter-in-horizontal login-sub">
                    <input type="submit" value="login">
                </label>
            </div>

            
            </div>
            <!-- <div class="col-md-6 login-do">
                <label class="hvr-shutter-in-horizontal login-sub">
                    <input type="submit" value="login">
                    </label>
                    <p>Do not have an account?</p>
                <a href="signup.html" class="hvr-shutter-in-horizontal">Signup</a>
            </div> -->
            
            <div class="clearfix"> </div>
            </form>
        </div>
    </div>
        <!---->
<div class="copy-right">
            <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>     </div>  
<!---->
<!--scrolling js-->
    <script src="<?php echo base_url();?>/assets2/js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url();?>/assets2/js/scripts.js"></script>
    <script src="<?php echo base_url() ?>/assets2/bootstrap/jquery-1.11.0.js"></script>
    <!--//scrolling js-->
</body>
</html>


<!-- 

<!doctype html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/bootstrap.css"/>
    </head>
    <body>
        <div style="margin: auto; width: 225px; margin-top: 100px; border: 1px solid lightgray; padding: 0px 15px">
            <h3>Please Login</h3>
            <form action="<?php echo $action ?>" method="post">
                Username <br>
                <input name="username" type="text" /><br>
                Password <br>
                <input name="password" type="password" /><br>
                <input name="submit" type="submit" value="Login" class="btn btn-primary" />
                <div class="text-center text-error">
                    <?php echo $error; ?>
                </div>
            </form>
        </div>

        <script src="<?php echo base_url() ?>asset/bootstrap/bootstrap.js"></script>    
        <script src="<?php echo base_url() ?>asset/bootstrap/jquery-1.11.0.js"></script>
    </body>
</html> -->