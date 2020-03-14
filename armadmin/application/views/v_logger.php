<!DOCTYPE html>
<html>
<head>
<title>CRM</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo base_url('assets/fonts.googleapis.com/css?family=Sansita:400,400i,700,700i,800,800i,900,900i&amp;subset=latin-ext');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/fonts.googleapis.com/css?family=Poiret+One');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/loggerStyle.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/toastr.min.css');?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js');?>"></script>
</head>
<body>
    <h1>Talk less & express more</h1>
	<div class="form-w3ls">
            <div class="form-head-w3l">
                <h2>s</h2>
            </div>
	    <ul class="tab-group cl-effect-4">
	        <li class="tab active"><a href="#signin-agile">Sign In</a></li>
		<li class="tab"><a href="#signup-agile">Sign Up</a></li>        
	    </ul>
	    <div class="tab-content">
	        <div id="signin-agile">   
                    <form action="#" method="post" name="frmLogin" id="frmLogin">					
                        <p class="header">User Name</p>
                        <input type="text" name="user_name" class="user_name" placeholder="User Name" required="required">
                        <p class="header">Password</p>
                        <input type="password" name="userPassword" class="userPassword" placeholder="Password" required="required">
                        <input type="checkbox" id="brand" class='rememberMe' value="loggedIn">
                        <label for="brand"><span></span> Remember me?</label>
                        <input type="button" class="sign-in" value="Sign In" name="signIn" id="signIn">
                    </form>
		</div>
                <div id="signup-agile">   
                    <form action="#" method="post" name="frmSignup" id="frmSignup">
                        <p class="header">User Name</p>
                        <input type="text" name="user_name" class='user_name' placeholder="Your Full Name" required="required">
                        <p class="header">Email Address</p>
                        <input type="email" name="user_email" class='user_email' placeholder="Email" required="required">
                        <p class="header">Password</p>
                        <input type="password" name="user_password" class='user_password' placeholder="Password" required="required">
                        <p class="header">Confirm Password</p>
                        <input type="password" name="userConfirmPassword" class='userConfirmPassword' placeholder="Confirm Password" required="required">
                        <input type="button" class="register" value="Sign up" name="signUp" id="signUp">
                    </form>
                </div> 
    </div><!-- tab-content -->
    </div> <!-- /form -->	  
    <p class="copyright">&copy; 2018 talk less & express more. All Rights Reserved | Design by <a href="https://talklessexpressmore.com/" target="_blank">Blogger</a></p>
    <script src="<?php echo base_url('assets/js/logger.js');?>"></script>
    <script type="text/javascript" language="javascript">
        var BASEPATH = "<?php echo base_url(); ?>";
        var checksum = false; // to valide password 
    </script>
</body>
</html>