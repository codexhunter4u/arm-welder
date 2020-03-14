<body>
  <!-- Page Loader-->
  <?php include('files/v_hm_pageLoader.php'); ?>
  <!-- Page-->
  <div class="page">
    <!-- Page Header-->
    <?php include('files/v_hm_mainHeader.php'); ?>
    <!-- Breadcrumbs-->
    <section class="breadcrumbs-custom bg-image" style="background-image: url(<?php echo base_url();?>assets/images/bg-image-12.jpg);">
      <div class="container">
        <h2 class="breadcrumbs-custom__title">Maintenance</h2>
        <ul class="breadcrumbs-custom__path">
          <li><a href="index.html">Home</a></li>
          <li><a href="#">Pages</a></li>
          <li class="active">Maintenance</li>
        </ul>
      </div>
    </section>
    <!-- Maintenance-->
    <section class="section section-sm bg-default text-center">
      <div class="container">
        <div class="row justify-content-lg-center">
          <div class="col-lg-10 col-xl-8">
            <p class="large">We are currently working on</p>
            <h2>This page will appear in</h2>
            <div class="countdown" data-countdown="data-countdown" data-to="2019-12-31">
              <div class="countdown-block countdown-block-days">
                <svg class="countdown-circle" x="0" y="0" width="200" height="200" viewbox="0 0 200 200" data-progress-days="">
                  <circle class="countdown-circle-bg" cx="100" cy="100" r="90"></circle>
                  <circle class="countdown-circle-fg clipped" cx="100" cy="100" r="90"></circle>
                </svg>
                <div class="countdown-wrap">
                  <div class="countdown-counter" data-counter-days="">00</div>
                  <div class="countdown-title">days</div>
                </div>
              </div>
              <div class="countdown-block countdown-block-hours">
                <svg class="countdown-circle" x="0" y="0" width="200" height="200" viewbox="0 0 200 200" data-progress-hours="">
                  <circle class="countdown-circle-bg" cx="100" cy="100" r="90"></circle>
                  <circle class="countdown-circle-fg clipped" cx="100" cy="100" r="90"></circle>
                </svg>
                <div class="countdown-wrap">
                  <div class="countdown-counter" data-counter-hours="">00</div>
                  <div class="countdown-title">hours</div>
                </div>
              </div>
              <div class="countdown-block countdown-block-minutes">
                <svg class="countdown-circle" x="0" y="0" width="200" height="200" viewbox="0 0 200 200" data-progress-minutes="">
                  <circle class="countdown-circle-bg" cx="100" cy="100" r="90"></circle>
                  <circle class="countdown-circle-fg clipped" cx="100" cy="100" r="90"></circle>
                </svg>
                <div class="countdown-wrap">
                  <div class="countdown-counter" data-counter-minutes="">00</div>
                  <div class="countdown-title">minutes</div>
                </div>
              </div>
              <div class="countdown-block countdown-block-seconds">
                <svg class="countdown-circle" x="0" y="0" width="200" height="200" viewbox="0 0 200 200" data-progress-seconds="">
                  <circle class="countdown-circle-bg" cx="100" cy="100" r="90"></circle>
                  <circle class="countdown-circle-fg clipped" cx="100" cy="100" r="90"></circle>
                </svg>
                <div class="countdown-wrap">
                  <div class="countdown-counter" data-counter-seconds="">00</div>
                  <div class="countdown-title">seconds</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Page Footer-->
    <?php include('files/footer.php'); ?>
  </div>
  <!-- Global Mailform Output-->
  <div class="snackbars" id="form-output-global"> </div>
</body>