<style>
.tables .panel-body, .tables .bs-example {
    padding: 0em 1em 0.5em !important;
}
</style>
<body class="cbp-spmenu-push" onload="getLogos();getActiveLogo()">
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
                                Add Logo's 
                            </div>
                            <div class="inbox-page">
                                <div class="form-body">
                                    <form name="frmAddLogo" id="frmAddLogo" action="#" method="post" enctype="multipart/form-data"> 
                                        <div class="form-group"> 
                                            <label for="listOfLogos">Brand Logo<span class='mandetory'> * </span></label> 
                                            <img id="brand-logo" class="img-responsive" src="http://localhost/Projects/armwelders/armadmin/avtar/bran-logo.png" alt="Logo Image">
                                        </div> 
                                        <div class="form-group"> 
                                            <label for="logoImage">Logo Image <span class='mandetory'> * </span></label> 
                                            <input type="file" class="form-control" id="logo_img" name="logo_img"> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label for="imageCaption">Image Caption<span class='mandetory'> * </span></label> 
                                            <input type="text" class="form-control" id="logo_caption" name="logo_caption" placeholder="Enter logo caption"> 
                                        </div> 
                                        <button type="button" name="btnAddLogo" id="btnAddLogo" class="btn btn-default">Submit</button> 
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
                                Logo's List 
                            </div>
                            <div class="inbox-page">
                                <div class="tables">
                                    <div class="table-responsive bs-example">
                                        <table class="table table-bordered tblLogo"> 
                                            <thead> 
                                                <tr> 
                                                    <th>Sr No.</th> 
                                                    <th>Logo Image</th> 
                                                    <th>Logo text</th> 
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
    <input type="hidden" name="formAction" id="formAction" value="addLogos">
    <input type="hidden" name="updateRowId" id="updateRowId" value="0">
    <!--footer-->
    <?php include('files/footer.php'); ?>
    <script src="<?php echo base_url('assets/js/logos.js'); ?>"></script>
</body>
</html>