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

        <div id="page-wrapper">
            <div class="main-page">

                <div class=" emp-profile">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                                    <div class="file btn btn-lg btn-primary">
                                        Change Photo
                                        <input type="file" name="file"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-head">
                                    <div class="row">
                                        <div class="col-md-4 grid_box1">
                                            <input type="text" class="form-control1" placeholder=".col-md-2">
                                        </div>
                                        <div class="col-md-4 grid_box1">
                                            <input type="text" class="form-control1" placeholder=".col-md-2">
                                        </div>
                                        <div class="col-md-4 grid_box1">
                                            <input type="text" class="form-control1" placeholder=".col-md-2">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 grid_box1">
                                            <input type="text" class="form-control1" placeholder=".col-md-2">
                                        </div>
                                        <div class="col-md-4 grid_box1">
                                            <input type="text" class="form-control1" placeholder=".col-md-2">
                                        </div>
                                        <div class="col-md-4 grid_box1">
                                            <input type="text" class="form-control1" placeholder=".col-md-2">
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="button" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-work">
                                    <p>WORK LINK</p>
                                    <a href="">Website Link</a><br/>
                                    <a href="">Bootsnipp Profile</a><br/>
                                    <a href="">Bootply Profile</a>
                                    <p>SKILLS</p>
                                    <a href="">Web Designer</a><br/>
                                    <a href="">Web Developer</a><br/>
                                    <a href="">WordPress</a><br/>
                                    <a href="">WooCommerce</a><br/>
                                    <a href="">PHP, .Net</a><br/>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="col-md-4 grid_box1">
                                            <input type="text" class="form-control1" placeholder=".col-md-2">
                                        </div>
                                        <div class="col-md-4 grid_box1">
                                            <input type="text" class="form-control1" placeholder=".col-md-2">
                                        </div>
                                        <div class="col-md-4 grid_box1">
                                            <input type="text" class="form-control1" placeholder=".col-md-2">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="col-md-4 grid_box1">
                                            <input type="text" class="form-control1" placeholder=".col-md-2">
                                        </div>
                                        <div class="col-md-4 grid_box1">
                                            <input type="text" class="form-control1" placeholder=".col-md-2">
                                        </div>
                                        <div class="col-md-4 grid_box1">
                                            <input type="text" class="form-control1" placeholder=".col-md-2">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <link href="<?php echo base_url('assets/css/my-preference.css'); ?>" rel='stylesheet' type='text/css' />
    <!--//footer-->
</body>
</html>