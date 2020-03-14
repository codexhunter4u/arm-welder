<style>
.tables .panel-body, .tables .bs-example {
    padding: 0em 1em 0.5em !important;
}
</style>
<body class="cbp-spmenu-push" onload="getRows()">
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
				<h2 class="title1">Social Icons</h2>
				<div class="col-md-4">
					<div class="widget-shadow">
                        <div class="panel-default">
                            <div class="panel-heading">
                                Add Row
                            </div>
                            <div class="inbox-page">
                                <div class="form-body">
                                    <form name="frmAddRow" id="frmAddRow" action="#" method="post" enctype="multipart/form-data"> 
                                        <div class="form-group"> 
                                            <img id="temp-img" class="img-responsive" src="http://localhost/Projects/armwelders/armadmin/avtar/user_img.png" style="width:200px;height:150px;margin-left:20px;" alt="Temp Image">
                                        </div> 
                                        <div class="form-group"> 
                                            <label for="imageCaption">Media Name<span class='mandetory'> * </span></label> 
                                            <input type="text" class="form-control" id="media_name" name="media_name" placeholder="Enter media name"> 
                                        </div>
                                        <div class="form-group"> 
                                            <label for="imageCaption">Media Link<span class='mandetory'> * </span></label>
                                            <input type="text" class="form-control" id="media_url" name="media_url" placeholder="Enter media url"> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label for="TeamImages">Media Icon <span class='mandetory'> * </span></label> 
                                            <input type="file" class="form-control" id="upload_img" name="upload_img"> 
                                        </div> 
                                        <button type="button" name="btnAddRow" id="btnAddRow" class="btn btn-default">Submit</button> 
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
                               Data List 
                            </div>
                            <div class="inbox-page">
                                <div class="tables">
                                    <div class="table-responsive bs-example">
                                        <table class="table table-bordered tblRow"> 
                                            <thead> 
                                                <tr> 
                                                    <th>Sr. No.</th>
                                                    <th>Image</th>  
                                                    <th>Name</th> 
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
    <input type="hidden" name="formAction" id="formAction" value="addRow">
    <input type="hidden" name="updateRowId" id="updateRowId" value="0">
    <!--footer-->
    <?php include('files/footer.php'); ?>
    <script src="<?php echo base_url('assets/js/social.js'); ?>"></script>
</body>
</html>