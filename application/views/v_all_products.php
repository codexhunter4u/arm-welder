<body>
  <!-- Page Loader-->
  <?php include('files/v_hm_pageLoader.php'); ?>
  <!-- Page-->
  <div class="page">
    <!-- Page Header -->
    <?php include('files/v_hm_mainHeader.php'); ?>

      <!-- Breadcrumbs-->
      <section class="breadcrumbs-custom bg-image" style="background-image: url(<?php echo base_url();?>assets/images/bg-image-13.jpg);">
        <div class="container">
          <h2 class="breadcrumbs-custom__title">Products</h2>
          <ul class="breadcrumbs-custom__path">
            <li><a href="index.html">Home</a></li>
            <li class="active">Products</li>
          </ul>
        </div>
      </section>

      <!-- Our Products-->
      <section class="section section-md bg-default text-center">
        <div class="container">
          <div class="isotope-wrap isotope-modern-wrap">
            <!-- Section Header-->
            <div class="section__header">
              <h4>Our Products</h4>
              <div class="section__header-element">
                <div class="navigation-custom">
                  <button class="button navigation-custom__toggle" data-custom-toggle=".navigation-custom__content" data-custom-toggle-hide-on-blur="true">Filter</button>
                  <div class="navigation-custom__content">
                    <div class="isotope-filters isotope-filters_modern">
                      <ul class="inline-list">
                        <li><a class="active" data-isotope-filter="*" data-isotope-group="products" href="#">All products</a></li>
                        <li><a data-isotope-filter="Category 1" data-isotope-group="products" href="#">Tools</a></li>
                        <li><a data-isotope-filter="Category 2" data-isotope-group="products" href="#">accessories</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Isotope-->
            <div class="isotope" data-isotope-layout="fitRows" data-isotope-group="products">
              <div class="row">
                <div class="col-6 col-md-4 col-lg-3 isotope-item" data-filter="Category 1">
                  <!-- Product-->
                  <article class="product"> <a class="product__image-wrap" href="<?php echo base_url('singleProductsController');?>">
                      <img class="product__image" src="<?php echo base_url();?>assets/images/product-1.jpg" alt="" width="179" height="141"/></a>
                    <div class="product__main">
                      <p class="product__title"><a href="<?php echo base_url('singleProductsController');?>">Product 1</a></p>
                      <p class="product__price">from $00</p>
                    </div>
                    <div class="product__footer"><a class="button button-xs button-gray-2" href="<?php echo base_url('singleProductsController');?>">details</a></div>
                  </article>
                </div>
                <div class="col-6 col-md-4 col-lg-3 isotope-item" data-filter="Category 2">
                  <!-- Product-->
                  <article class="product"> <a class="product__image-wrap" href="<?php echo base_url('singleProductsController');?>">
                      <img class="product__image" src="<?php echo base_url();?>assets/images/product-2.jpg" alt="" width="179" height="141"/></a>
                    <div class="product__main">
                      <p class="product__title"><a href="<?php echo base_url('singleProductsController');?>">Product 2</a></p>
                      <p class="product__price">from $00</p>
                    </div>
                    <div class="product__footer"><a class="button button-xs button-gray-2" href="<?php echo base_url('singleProductsController');?>">details</a></div>
                  </article>
                </div>
                <div class="col-6 col-md-4 col-lg-3 isotope-item" data-filter="Category 1">
                  <!-- Product-->
                  <article class="product"> <a class="product__image-wrap" href="<?php echo base_url('singleProductsController');?>">
                  <img class="product__image" src="<?php echo base_url();?>assets/images/product-3.jpg" alt="" width="179" height="141"/></a>
                    <div class="product__main">
                      <p class="product__title"><a href="<?php echo base_url('singleProductsController');?>">Product 3</a></p>
                      <p class="product__price">from $00</p>
                    </div>
                    <div class="product__footer"><a class="button button-xs button-gray-2" href="<?php echo base_url('singleProductsController');?>">details</a></div>
                  </article>
                </div>
                <div class="col-6 col-md-4 col-lg-3 isotope-item" data-filter="Category 2">
                  <!-- Product-->
                  <article class="product"> <a class="product__image-wrap" href="<?php echo base_url('singleProductsController');?>">
                  <img class="product__image" src="<?php echo base_url();?>assets/images/product-4.jpg" alt="" width="179" height="141"/></a>
                    <div class="product__main">
                      <p class="product__title"><a href="<?php echo base_url('singleProductsController');?>">Product 4</a></p>
                      <p class="product__price">from $00</p>
                    </div>
                    <div class="product__footer"><a class="button button-xs button-gray-2" href="<?php echo base_url('singleProductsController');?>">details</a></div>
                  </article>
                </div>
                <div class="col-6 col-md-4 col-lg-3 isotope-item" data-filter="Category 1">
                  <!-- Product-->
                  <article class="product"> <a class="product__image-wrap" href="<?php echo base_url('singleProductsController');?>">
                  <img class="product__image" src="<?php echo base_url();?>assets/images/product-5.jpg" alt="" width="179" height="141"/></a>
                    <div class="product__main">
                      <p class="product__title"><a href="<?php echo base_url('singleProductsController');?>">Product 5</a></p>
                      <p class="product__price">from $00</p>
                    </div>
                    <div class="product__footer"><a class="button button-xs button-gray-2" href="<?php echo base_url('singleProductsController');?>">details</a></div>
                  </article>
                </div>
                <div class="col-6 col-md-4 col-lg-3 isotope-item" data-filter="Category 2">
                  <!-- Product-->
                  <article class="product"> <a class="product__image-wrap" href="<?php echo base_url('singleProductsController');?>">
                  <img class="product__image" src="<?php echo base_url();?>assets/images/product-6.jpg" alt="" width="179" height="141"/></a>
                    <div class="product__main">
                      <p class="product__title"><a href="<?php echo base_url('singleProductsController');?>">Product 6</a></p>
                      <p class="product__price">from $00</p>
                    </div>
                    <div class="product__footer"><a class="button button-xs button-gray-2" href="<?php echo base_url('singleProductsController');?>">details</a></div>
                  </article>
                </div>
                <div class="col-6 col-md-4 col-lg-3 isotope-item" data-filter="Category 1">
                  <!-- Product-->
                  <article class="product"> <a class="product__image-wrap" href="<?php echo base_url('singleProductsController');?>">
                  <img class="product__image" src="<?php echo base_url();?>assets/images/product-7.jpg" alt="" width="179" height="141"/></a>
                    <div class="product__main">
                      <p class="product__title"><a href="<?php echo base_url('singleProductsController');?>">Product 7</a></p>
                      <p class="product__price">from $00</p>
                    </div>
                    <div class="product__footer"><a class="button button-xs button-gray-2" href="<?php echo base_url('singleProductsController');?>">details</a></div>
                  </article>
                </div>
                <div class="col-6 col-md-4 col-lg-3 isotope-item" data-filter="Category 2">
                  <!-- Product-->
                  <article class="product"> <a class="product__image-wrap" href="<?php echo base_url('singleProductsController');?>">
                  <img class="product__image" src="<?php echo base_url();?>assets/images/product-8.jpg" alt="" width="179" height="141"/></a>
                    <div class="product__main">
                      <p class="product__title"><a href="<?php echo base_url('singleProductsController');?>">Product 8</a></p>
                      <p class="product__price">from $00</p>
                    </div>
                    <div class="product__footer"><a class="button button-xs button-gray-2" href="<?php echo base_url('singleProductsController');?>">details</a></div>
                  </article>
                </div>
              </div>
            </div>
            <!-- Pagination-->
            <ul class="pagination-custom">
              <li class="pagination-control"><a href="#">Prev</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li class="active"><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li class="pagination-control"><a href="#">Next</a></li>
            </ul>
          </div>
        </div>
      </section>

      <!-- Page Footer-->
    <?php include('files/mainfooter.php'); ?>
  </div>
  <!-- Global Mailform Output-->
</body>