<body>
  <!-- Page Loader-->
  <?php include('files/v_hm_pageLoader.php'); ?>
  <!-- Page-->
  <div class="page">
    <!-- Page Header -->
    <?php include('files/v_hm_mainHeader.php'); ?>
        <!-- Breadcrumbs-->
        <section class="breadcrumbs-custom bg-image" style="background-image: url(<?php echo base_url();?>assets/images/bg-image-14.jpg);">
            <div class="container">
                <h2 class="breadcrumbs-custom__title">Single product</h2>
                <ul class="breadcrumbs-custom__path">
                    <li><a href="<?php echo base_url('homeController');?>">Home</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li class="active">Single product</li>
                </ul>
            </div>
        </section>
        <!-- Single product-->
        <section class="section section-md bg-default">
            <div class="container">
                <div class="layout-horizontal layout-horizontal_1">
                    <div class="layout-horizontal__aside">
                        <div class="slick-slider-vertical slick-slider-vertical_sm">
                            <div class="slick-slider carousel-parent" id="parent-carousel" data-loop="true" data-dots="false" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel">
                                <div class="item">
                                    <div class="slick-image">
                                        <div class="product-preview"><img src="<?php echo base_url();?>assets/images/single-product-1-226x284.png" alt="" width="226" height="284" />
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="slick-image">
                                        <div class="product-preview"><img src="<?php echo base_url();?>assets/images/single-product-2-282x293.png" alt="" width="282" height="293" />
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="slick-image">
                                        <div class="product-preview"><img src="<?php echo base_url();?>assets/images/single-product-3-338x256.png" alt="" width="338" height="256" />
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="slick-image">
                                        <div class="product-preview"><img src="<?php echo base_url();?>assets/images/single-product-4-214x326.png" alt="" width="214" height="326" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slider carousel-child" id="child-carousel" data-for="#parent-carousel" data-arrows="true" data-loop="true" data-dots="false" data-swipe="true" data-items="3" data-xs-items="3" data-sm-items="3" data-md-items="3" data-lg-items="3" data-xl-items="3"
                                data-slide-to-scroll="1" data-vertical="false" data-xs-vertical="false" data-sm-vertical="true" data-md-vertical="true" data-lg-vertical="true" data-center-mode="true">
                                <div class="item">
                                    <div class="slick-slider__inner">
                                        <div class="product-preview"><img src="<?php echo base_url();?>assets/images/single-product-1-226x284.png" alt="" width="226" height="284" />
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="slick-slider__inner">
                                        <div class="product-preview"><img src="<?php echo base_url();?>assets/images/single-product-2-282x293.png" alt="" width="282" height="293" />
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="slick-slider__inner">
                                        <div class="product-preview"><img src="<?php echo base_url();?>assets/images/single-product-3-338x256.png" alt="" width="338" height="256" />
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="slick-slider__inner">
                                        <div class="product-preview"><img src="<?php echo base_url();?>assets/images/single-product-4-214x326.png" alt="" width="214" height="326" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layout-horizontal__main">
                        <article class="single-product">
                            <div class="single-product__header">
                                <h3 class="single-product__title">Product1</h3>
                                <p class="single-product__price"><sup>$</sup><span>00</span><sup>00</sup></p>
                            </div>
                            <div class="single-product__main">
                                <!-- Tabs-->
                                <div class="tabs-custom tabs-horizontal tabs-line">
                                    <!-- Nav tabs-->
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link active" href="#tabs-product-1" data-toggle="tab">Description</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tabs-product-2" data-toggle="tab">Spefication</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tabs-product-1">
                                            <p>Dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy.</p>
                                        </div>
                                        <div class="tab-pane fade" id="tabs-product-2">
                                        <p>Dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy
                                        dummy dummy dummy dummy dummy.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="group group-buttons group-middle">
                                    <a class="button button-darker" href="contacts.html">get a quote</a>
                                    <p>or</p><a class="button button-primary" href="#">get price list</a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section-md bg-default">
            <div class="container">
                <div class="row row-70 justify-content-md-center justify-content-xl-between">
                <div class="col-md-10 col-lg-6 col-xl-5">
                    <h4>Product 1</h4>
                    <p>Dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy</p>
                    <p>Dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy.dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy. Dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy</p>
                    <!-- <h4>Our Mission</h4> -->
                    <p>dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy</p>
                </div>
                <div class="col-md-10 col-lg-6">
                    <div class="row grid-2">
                        <div class="col-6">
                            <img src="http://localhost/Projects/armwelders/assets/images/about-1-273x214.jpg" alt="" width="273" height="214">
                            <img src="http://localhost/Projects/armwelders/assets/images/project-6-320x262.jpg" alt="" width="273" height="214">
                        </div>
                        <div class="col-6">
                            <img src="http://localhost/Projects/armwelders/assets/images/project-1-639x524.jpg" alt="" width="273" height="214">
                            <img src="http://localhost/Projects/armwelders/assets/images/about-2-273x214.jpg" alt="" width="273" height="214">
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

         <!-- Page Footer-->
    <?php include('files/mainfooter.php'); ?>
  </div>
  <!-- Global Mailform Output-->
</body>..............................

