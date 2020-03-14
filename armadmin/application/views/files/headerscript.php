<!DOCTYPE HTML>
<html>
<head>
<title>CRM ADMIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js');?>"></script>
<!-- Bootstrap Core JavaScript -->
<link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel='stylesheet' type='text/css' />
<script src="<?php echo base_url('assets/js/bootstrap.js');?>"> </script>
<!-- //Bootstrap Core JavaScript -->
<!-- Custom CSS -->
<link href="<?php echo base_url('assets/css/style.css');?>" rel='stylesheet' type='text/css' />
<!-- font-awesome icons CSS -->
<link href="<?php echo base_url('assets/css/font-awesome.css');?>" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->
<!-- side nav css file -->
<link href="<?php echo base_url('assets/css/SidebarNav.min.css');?>" media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
<!-- js-->
<script src="<?php echo base_url('assets/js/modernizr.custom.js');?>"></script>
<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 
<!-- chart -->
<script src="<?php echo base_url('assets/js/Chart.js');?>"></script>
<!-- //chart -->
<!-- Metis Menu -->
<script src="<?php echo base_url('assets/js/metisMenu.min.js');?>"></script>
<!-- //All custome js function -->
<script src="<?php echo base_url('assets/js/custom.js');?>"></script>

<link href="<?php echo base_url('assets/css/custom.css');?>" rel="stylesheet">
<!--//Metis Menu -->
<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>
<!--pie-chart --><!-- index page sales reviews visitors pie chart -->
<script src="<?php echo base_url('assets/js/pie-chart.js');?>" type="text/javascript"></script>
 <script type="text/javascript">
        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });
        });
    </script>
<!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

<!-- requried-jsfiles-for owl -->
<link href="<?php echo base_url('assets/css/owl.carousel.css');?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/owl.carousel.js');?>"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel({
				items : 3,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
				nav:true,
			});
		});
	</script>
<!-- //requried-jsfiles-for owl -->
<!-- All custome files are included here -->
<script type="text/javascript" language="javascript">
    var BASEPATH = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url('assets/js/toastr.min.js');?>"></script>
<link href="<?php echo base_url('assets/css/toastr.min.css');?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/setAjaxRequest.js');?>"></script>
<script src="<?php echo base_url('assets/js/getAjaxRequest.js');?>"></script>
<script src="<?php echo base_url('assets/js/external.js');?>"></script>
<link href="<?php echo base_url('assets/css/external.css');?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/setGlobalVariables.js');?>"></script>
<!--- //Datatables CSS & JS -->
<script src="<?php echo base_url('assets/dataTables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/dataTables/dataTables.bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/dataTables/select2.min.js');?>"></script>
<link href="<?php echo base_url('assets/dataTables/select2.min.css');?>" rel="stylesheet">

</head>