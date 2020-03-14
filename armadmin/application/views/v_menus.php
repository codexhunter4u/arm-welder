<style>
.tables .panel-body, .tables .bs-example {
    padding: 0em 1em 0.5em !important;
}
</style>
<body class="cbp-spmenu-push" onload="getMenuList()">
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
                                Add Menu's 
                            </div>
                            <div class="inbox-page">
                                <div class="form-body">
                                    <form name="frmAddMenu" id="frmAddMenu" action="#" method="post"> 
                                        <div class="form-group"> 
                                            <label for="listOfMenus">List of Menu's<span class='mandetory'> * </span></label> 
                                            <select class="form-control select2" name="parent_id" id="menu_list">
                                                <option value="">Select</option> 
                                                <option value="0">Main Menu</option>
                                            </select>
                                        </div> 
                                        <div class="form-group"> 
                                            <label for="menus">Menu <span class='mandetory'> * </span></label> 
                                            <input type="text" class="form-control" id="menu_name" name="menu_name" placeholder="Enter menu name"> 
                                        </div> 
                                        <button type="button" name="btnAddMenu" id="btnAddMenu" class="btn btn-default">Submit</button> 
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
                                Menu's List 
                            </div>
                            <div class="inbox-page">
                                <div class="tables">
                                    <div class="table-responsive bs-example">
                                        <table class="table table-bordered tblMenu"> 
                                            <thead> 
                                                <tr> 
                                                    <th>Sr No.</th> 
                                                    <th>Menu Name</th> 
                                                    <th>Parent Menu</th> 
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
    <input type="hidden" name="formAction" id="formAction" value="addMenus">
    <input type="hidden" name="updateRowId" id="updateRowId" value="0">
    <!--footer-->
    <?php include('files/footer.php'); ?>
    <script src="<?php echo base_url('assets/js/menus.js'); ?>"></script>
</body>
</html>