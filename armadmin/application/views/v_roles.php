<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<body class="cbp-spmenu-push" onload="getRoles()">
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
                <h2 class="title1">Roles</h2>


                <div class="row">
                    <div class="col-md-4 grid_box1">
                        <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
                            <div class="form-title">
                                <h4> Add Roles :</h4>
                            </div>
                            <div class="form-body">
                                <form action="#" id="addRoleFrm"> 
                                    <div class="form-group"> 
                                        <label for="exampleInputEmail1"> Role </label> 
                                        <input type="text" class="form-control" id="roleName" name="roleName" placeholder="Enter role name"> 
                                    </div> 
                                    <button type="button" class="btn btn-primary" onclick="insertRoles()">Submit</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-grids row widget-shadow"> 
                            <div class="form-title">
                                <h4> Roles List  :</h4>
                            </div>
                            <div class="form-body">
                                <table class="table table-bordered" id="tblRoles"> 
                                    <thead> 
                                        <tr> 
                                            <th>Sr.No</th> <th>Username</th> 
                                        </tr> 
                                    </thead> 
                                    <tbody id="tblRolesBody"> 

                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>

            </div>
        </div>

        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
    <!--footer-->
    <?php include('files/footer.php'); ?>
    <!--//footer-->
</body>
</html>