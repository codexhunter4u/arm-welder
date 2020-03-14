<style>
.tables .panel-body, .tables .bs-example {
    padding: 0em 1em 0.5em !important;
}
</style>
<body class="cbp-spmenu-push" onload="getTeam()">
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
                                Team Member Image 
                            </div>
                            <div class="inbox-page">
                                <div class="form-body">
                                    <form name="frmAddTeam" id="frmAddTeam" action="#" method="post" enctype="multipart/form-data"> 
                                        <div class="form-group"> 
                                            <label for="imageCaption">Member Name<span class='mandetory'> * </span></label> 
                                            <input type="text" class="form-control" id="member_name" name="member_name" placeholder="Enter member name"> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label for="imageCaption">Member Designation<span class='mandetory'> * </span></label> 
                                            <input type="text" class="form-control" id="member_designation" name="member_designation" placeholder="Enter member desgination"> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label for="imageCaption">Member description</label> 
                                            <textarea class="form-control" name="member_desc" id="member_desc" rows="2"></textarea> 
                                        </div> 
                                        <div class="form-group"> 
                                            <label for="TeamImages">Member Photo <span class='mandetory'> * </span></label> 
                                            <input type="file" class="form-control" id="member_image" name="member_image"> 
                                        </div> 
                                        <button type="button" name="btnAddTeam" id="btnAddTeam" class="btn btn-default">Submit</button> 
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
                               Member List 
                            </div>
                            <div class="inbox-page">
                                <div class="tables">
                                    <div class="table-responsive bs-example">
                                        <table class="table table-bordered tblTeam"> 
                                            <thead> 
                                                <tr> 
                                                    <th>Sr. No.</th>
                                                    <th>Image</th>  
                                                    <th>Name</th> 
                                                    <th>Designation</th> 
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
    <input type="hidden" name="formAction" id="formAction" value="addTeam">
    <input type="hidden" name="updateRowId" id="updateRowId" value="0">
    <!--footer-->
    <?php include('files/footer.php'); ?>
    <script src="<?php echo base_url('assets/js/ourteam.js'); ?>"></script>
</body>
</html>