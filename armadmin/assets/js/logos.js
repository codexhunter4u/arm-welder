function getActiveLogo() {

    $.ajax({
        type: 'GET',
        url: BASEPATH + 'logosController/getActiveLogo',
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            if (data['length'] > 0) {
                var data = JSON.parse(res);
                $("#brand-logo").attr("src", data[0]['logo_path']);
            }
        }
    });
}

function editLogo(rowId) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'logosController/editLogo',
        data: { id: rowId },
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            $("#formAction").val("addLogos");
            $("#logo_caption").val(data[0]['logo_caption']);
            $("#updateRowId").val(rowId);
        }
    });
}

function activateLogo(id, status) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'logosController/activateLogo',
        data: { id: id, status: status },
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            data['responseCode'] == '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
            getActiveLogo();
            getLogos();
        }
    });
}

$('#btnAddLogo').click(function() {
    var controllerAction = $("#formAction").val();
    var formData = new FormData($("#frmAddLogo")[0]);
    var id = $("#updateRowId").val();
    if ($('#logo_caption').val() != '' || $('#logo_img').val() != '') {
        $.ajax({
            url: BASEPATH + 'LogosController/' + controllerAction + '/' + id,
            type: "post",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(res) {
                var data = JSON.parse(res);
                data['responseCode'] == '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
                getLogos();
                getActiveLogo();
            }
        });
    } else {
        toastr.error('Please fill the mandetory fields');
        return false;
    }
});

// select2 Jquery pluging for Dropdown search
$('.select2').select2();

function getLogos() {

    $(".tblLogo").DataTable().destroy();
    $('.tblLogo').DataTable({
        "processing": true, //Feature control the processing indicator.
        "autoWidth": true,
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASEPATH + 'logosController/getLogos',
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
        "lengthMenu": [
            [2, 5, 10, 20, -1],
            [2, 5, 10, 20, 'All']
        ],
        "pageLength": 2
    });
}

function deleteLogo(rowId, img_path) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'logosController/deleteLogo',
        data: { id: rowId, image_path: img_path },
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            data['responseCode'] == '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
            getLogos();
        }
    });
}