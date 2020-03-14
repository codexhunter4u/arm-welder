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
				<h2 class="title1">Our Offices</h2>
				<div class="col-md-4">
					<div class="widget-shadow">
                        <div class="panel-default">
                            <div class="panel-heading">
                                Add Row
                            </div>
                            <div class="inbox-page">
                                <div class="form-body">
                                    <form name="frmAddRow" id="frmAddRow" action="#" method="post">  
                                        <div class="form-group"> 
                                            <label for="imageCaption">Office Location<span class='mandetory'> * </span></label> 
                                            <input type="text" class="form-control" id="office_location" name="office_location" placeholder="Enter office location"> 
                                        </div>
                                        <div class="form-group"> 
                                            <label for="imageCaption">Office Phone<span class='mandetory'> * </span></label> 
                                            <input type="number" class="form-control" id="office_phone" min="6" max="11" name="office_phone" placeholder="Enter phone no (+91)-"> 
                                        </div>
                                        <div class="form-group"> 
                                            <label for="imageCaption">Office fax</label> 
                                            <input type="number" class="form-control" id="office_fax" min="6" max="11" name="office_fax" placeholder="Enter fax no."> 
                                        </div>
                                        <div class="form-group"> 
                                            <label for="imageCaption">Office Email</label> 
                                            <input type="email" class="form-control" id="office_email" name="office_email" placeholder="Enter email Id."> 
                                        </div>
                                        <div class="form-group"> 
                                            <label for="imageCaption">Office Address <span class='mandetory'> * </span></label>
                                            <textarea class="form-control" name="office_address" id="office_address" rows="2"></textarea> 
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
    <script src="<?php echo base_url('assets/js/offices.js'); ?>"></script>
</body>
</html>