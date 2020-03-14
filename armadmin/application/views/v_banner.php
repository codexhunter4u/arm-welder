<style>
.tables .panel-body, .tables .bs-example {
    padding: 0em 1em 0.5em !important;
}
</style>
<body class="cbp-spmenu-push" onload="getBanner()">
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
				<h2 class="title1">Menu Details</h2>
				<div class="col-md-4">
					<div class="widget-shadow">
                        <div class="panel-default">
                            <div class="panel-heading">
                                Banner Image 
                            </div>
                            <div class="inbox-page">
                                <div class="form-body">
                                    <form name="frmAddBanner" id="frmAddBanner" action="#" method="post" enctype="multipart/form-data"> 
                                        <div class="form-group"> 
                                            <img id="banner-img" class="img-responsive" src="http://localhost/Projects/armwelders/armadmin/avtar/bran-logo.png" alt="Banner Image">
                                        </div> 
                                        <div class="form-group"> 
                                            <label for="BannerImage">Banner Image <span class='mandetory'> * </span></label> 
                                            <input type="file" class="form-control" id="banner_image" name="banner_image"> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label for="imageCaption">Image Caption<span class='mandetory'> * </span></label> 
                                            <input type="text" class="form-control" id="banner_caption" name="banner_caption" placeholder="Enter logo caption"> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label for="imageCaption">Image Content<span class='mandetory'> * </span></label> 
                                            <textarea class="form-control" name="banner_content" id="banner_content" rows="2"></textarea> 
                                        </div> 
                                        <button type="button" name="btnAddBanner" id="btnAddBanner" class="btn btn-default">Submit</button> 
                                    </form> 
                                </div>
                            </div>
                        </div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="widget-shadow">
                        <div class="panel-default">
                            <div class="panel-heading">
                                Banner's List 
                            </div>
                            <div class="inbox-page">
                                <div class="tables">
                                    <div class="table-responsive bs-example">
                                        <table class="table table-bordered tblBanner"> 
                                            <thead> 
                                                <tr> 
                                                    <th>Sr. No.</th> 
                                                    <th>Banner Image</th> 
                                                    <th>Banner text</th> 
                                                    <th>Status</th> 
                                                    <th>Actions</th> 
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                                
                                            </tbody> 
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>		
			        </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
        </div>
    </div>
    <div class="clearfix"> </div>
    <input type="hidden" name="formAction" id="formAction" value="addBanner">
    <input type="hidden" name="updateRowId" id="updateRowId" value="0">
    <!--footer-->
    <?php include('files/footer.php'); ?>
    <script src="<?php echo base_url('assets/js/banner.js'); ?>"></script>
</body>
</html>