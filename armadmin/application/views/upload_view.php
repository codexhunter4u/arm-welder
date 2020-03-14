<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Upload files using Codeigniter and Ajax</title>
<link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel='stylesheet' type='text/css' />
</head>
<body>
    <div class="container">
        <div class="col-sm-4 col-md-offset-4">
        <h4>Upload files using Codeigniter and Ajax</h4>
            <form class="form-horizontal" id="submit" >
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <input type="file" name="logo_img">
                </div>
 
                <div class="form-group">
                    <button class="btn btn-success" id="btn_upload" type="button">Upload</button>
                </div>
            </form>   
        </div>
    </div>
<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js');?>"> </script>
<script type="text/javascript">

$(document).ready(function(){
    $('#btn_upload').click(function(){
        var formData = new FormData($("#submit")[0]);
        $.ajax({
            url:'<?php echo base_url();?>/upload/do_upload',
            type:"post",
            data:formData,
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(data){
                console.log(data);
                alert("Upload Image Successful.");
            }
        });
    });
});

</script>
</body>
</html>