var isFormValid = true;

function getActiveBanner() {

    $.ajax({
        type: 'GET',
        url: BASEPATH + 'BannerController/getActiveBanner',
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            if (data['length'] > 0) {
                var data = JSON.parse(res);
                $("#banner-img").attr("src", data[0]['banner_img_path']);
            }
        }
    });
}

function editBanner(rowId) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'BannerController/editBanner',
        data: { id: rowId },
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            $("#formAction").val("addBanner");
            $("#banner-img").attr("src", data.banner_img_path);
            $("#banner_caption").val(data.banner_caption);
            $("#banner_content").val(data.banner_content);
            $("#updateRowId").val(rowId);
        }
    });
}

function activateBanner(id, status) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'BannerController/activateBanner',
        data: { id: id, status: status },
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            data['responseCode'] == '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
            getActiveBanner();
            getBanner();
        }
    });
}

$('#btnAddBanner').click(function() {
    var controllerAction = $("#formAction").val();
    var formData = new FormData($("#frmAddBanner")[0]);
    var id = $("#updateRowId").val();
    if (isFormValid) {
        $.ajax({
            url: BASEPATH + 'BannerController/' + controllerAction + '/' + id,
            type: "post",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(res) {
                console.log(res);
                var data = JSON.parse(res);
                data['responseCode'] === '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
                getBanner();
                $('#frmAddBanner')[0].reset();
            }
        });
    } else {
        toastr.error('Please fill the mandetory fields');
        return false;
    }
});

// select2 Jquery pluging for Dropdown search
$('.select2').select2();

function getBanner() {

    $(".tblBanner").DataTable().destroy();
    $('.tblBanner').DataTable({
        "processing": true, //Feature control the processing indicator.
        "autoWidth": true,
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASEPATH + 'BannerController/getBanner',
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
        "lengthMenu": [
            [5, 10, 20, -1],
            [5, 10, 20, 'All']
        ],
        "pageLength": 3
    });
    getActiveBanner();
}

function deleteBanner(rowId, img_path) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'BannerController/deleteBanner',
        data: { id: rowId, image_path: img_path },
        cache: false,
        success: function(res) {
            console.log(res);
            var data = JSON.parse(res);
            data['responseCode'] == '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
            getBanner();
        }
    });
}

function validate(form) {
    $("#" + form + " input").each(function() {
        if ($.trim($(this).val()).length == 0) {
            $(this).addClass("highlight");
            $(this).focus();
            return isFormValid = false;
        } else {
            $(this).removeClass("highlight");
            return isFormValid = true;
        }
    });
}

function readIMG(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#banner-img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#banner_image").change(function() {
    readIMG(this);
});