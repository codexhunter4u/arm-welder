<!--left-fixed -navigation-->
<aside class="sidebar-left">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> Arm<span class="dashboard_text">Admin Panel</span></a></h1>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="<?php echo base_url('dashboardController'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('MenusController'); ?>"><i class="fa fa-angle-right"></i> Menus </a></li>
                        <li><a href="<?php echo base_url('LogosController'); ?>"><i class="fa fa-angle-right"></i> Logo Images</a></li>
                        <li><a href="<?php echo base_url('BannerController'); ?>"><i class="fa fa-angle-right"></i> Banner</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('SocialMediaController/'); ?>">
                        <i class="fa fa-th"></i> <span>Socials</span>
                        <i class="fa fa-angle-left pull-right"></i>
                        <small class="label pull-right label-info" id="social_media_span">08</small>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('SocialController'); ?>"><i class="fa fa-angle-right"></i> Social Links</a></li>
                        <li><a href="<?php echo base_url('ContactUsController'); ?>"><i class="fa fa-angle-right"></i> Contact Us</a></li>
                        <li><a href="<?php echo base_url('OfficesController'); ?>"><i class="fa fa-angle-right"></i> Our Offices</a></li>
                        <li><a href="<?php echo base_url('OurHistController'); ?>"><i class="fa fa-angle-right"></i> Our History</a></li>
                        <li><a href="<?php echo base_url('AchivementController'); ?>"><i class="fa fa-angle-right"></i> Our Achievement</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="<?php echo base_url('SocialMediaController/'); ?>">
                        <i class="fa fa-table"></i> <span>Homepage</span>
                        <i class="fa fa-angle-left pull-right"></i>
                        <small class="label label-info1 pull-right" id="social_media_span">08</small>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('servicesController'); ?>"><i class="fa fa-angle-right"></i> Services</a></li>
                        <li><a href="<?php echo base_url('productsController'); ?>"><i class="fa fa-angle-right"></i> Products</a></li>
                        <li><a href="<?php echo base_url('aboutUsController'); ?>"><i class="fa fa-angle-right"></i> About Us</a></li>
                        <li><a href="<?php echo base_url('ourTeamController'); ?>"><i class="fa fa-angle-right"></i> Our Team</a></li>
                        <li><a href="<?php echo base_url('clientController'); ?>"><i class="fa fa-angle-right"></i> Clients</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="<?php echo base_url('SocialMediaController/'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Media</span>
                        <i class="fa fa-angle-left pull-right"></i>
                        <small class="label label-primary1 pull-right" id="social_media_span">08</small>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('eventsController'); ?>"><i class="fa fa-angle-right"></i> Events</a></li>
                        <li><a href="<?php echo base_url('newsController'); ?>"><i class="fa fa-angle-right"></i> News</a></li>
                        <li><a href="<?php echo base_url('galleryController'); ?>"><i class="fa fa-angle-right"></i> Phot Gallery</a></li>
                        <li><a href="<?php echo base_url('videoController'); ?>"><i class="fa fa-angle-right"></i> Videos</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Admin Setup</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('routeController/viewRoles'); ?>"><i class="fa fa-angle-right"></i> Role </a></li>
                        <li><a href="<?php echo base_url('CustomController/signUp'); ?>"><i class="fa fa-angle-right"></i> Register</a></li>
                    </ul>
                </li>
                <li class="header">OTHERS</li>
                <li><a href="#"><i class="fa fa-angle-right text-red"></i> <span>Important</span></a></li>
                <li><a href="#"><i class="fa fa-angle-right text-yellow"></i> <span>Warning</span></a></li>
                <li><a href="<?php echo base_url('SocialMediaController'); ?>"><i class="fa fa-angle-right text-aqua"></i> <span>Information</span></a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>
<!--left-fixed -navigation-->