<link href="<?php echo base_url('assets/css/toastr.min.css');?>" rel="stylesheet">
<body class="cbp-spmenu-push">
    <div class="main-content">
        <!--*** Left menu Start ***-->
        <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <?php include 'files/leftSidebar.php'; ?>
        </div>
        <!-- //Left menu End -->

        <!--*** Main header-starts ***-->
        <div class="sticky-header header-section">
            <?php include('files/mainHeader.php'); ?>
        </div>
        <!-- //header-ends -->

        <!-- Main content body start-->

        <div id="page-wrapper" style="min-height: 234px;">
            <div class="main-page signup-page">
                <h2 class="title1">SignUp Here</h2>
                <div class="sign-up-row widget-shadow">
                    <h5>Personal Information :</h5>
                    <form action="#" method="post" name="frmSignup" id="frmSignup">
                        <div class="sign-u">
                            <input type="text" name="user_name" class="user_name" placeholder="User Name" required="">
                            <div class="clearfix"> </div>
                        </div>
                        <div class="sign-u">
                            <input type="email" placeholder="Email Address" required="" name="user_email" class="user_email">
                            <div class="clearfix"> </div>
                        </div>
                        <div class="sign-u">
                            <div class="sign-up1">
                                <h4>Gender* :</h4>
                            </div>
                            <div class="sign-up2">
                                <label>
                                    <input type="radio" name="Gender" required="" value="Male">
                                    Male
                                </label>
                                <label>
                                    <input type="radio" name="Gender" required="" value="Female">
                                    Female
                                </label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <h6>Login Information :</h6>
                        <div class="sign-u">
                            <input type="password" placeholder="Password" required="" name="user_password" class="user_password">
                            <div class="clearfix"> </div>
                        </div>
                        <div class="sign-u">
                            <input type="password" placeholder="Confirm Password" required="" name="userConfirmPassword" class="userConfirmPassword">
                        </div>
                        <div class="clearfix"> </div>
                        <div class="sub_home">
                            <input type="button" value="Submit" name="signUp" id="signUp">
                            <div class="clearfix"> </div>
                        </div>
                        <div class="registration">
                            Already Registered.
                            <a class="" href="<?php echo base_url('LoggerController/logout'); ?>">
                                Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
    <!--footer-->
    <?php include('files/footer.php'); ?>
    <!--//footer-->
    <script src="<?php echo base_url('assets/js/logger.js');?>"></script>
    <script type="text/javascript" language="javascript">
        var BASEPATH = "<?php echo base_url(); ?>";
        var checksum = false; // to valide password 
    </script>
</body>
</html>