var isFormValid = true;

function activateClient(id, status) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'ClientController/activateClient',
        data: { id: id, status: status },
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            data['responseCode'] == '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
            getClient();
        }
    });
}

function editClient(rowId) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'ClientController/editClient',
        data: { id: rowId },
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            $("#formAction").val("addClient");
            $("#client_name").val(data.client_name);
            $("#client_content").val(data.client_content);
            $("#client-img").attr("src", data.client_img_path);
            $("#updateRowId").val(rowId);
        }
    });
}

$('#btnAddClient').click(function() {
    var controllerAction = $("#formAction").val();
    var formData = new FormData($("#frmAddClient")[0]);
    var id = $("#updateRowId").val();
    if (isFormValid) {
        $.ajax({
            url: BASEPATH + 'ClientController/' + controllerAction + '/' + id,
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
                if (data['responseCode'] === '1') {
                    $('#frmAddClient')[0].reset();
                }
                getClient();
            }
        });
    } else {
        toastr.error('Please fill the mandetory fields');
        return false;
    }
});

// select2 Jquery pluging for Dropdown search
$('.select2').select2();

function getClient() {

    $(".tblClient").DataTable().destroy();
    $('.tblClient').DataTable({
        "processing": true, //Feature control the processing indicator.
        "autoWidth": true,
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASEPATH + 'ClientController/getClient',
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
}

function deleteClient(rowId, img_path) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'ClientController/deleteClient',
        data: { id: rowId, image_path: img_path },
        cache: false,
        success: function(res) {
            console.log(res);
            var data = JSON.parse(res);
            data['responseCode'] == '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
            getClient();
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
            $('#client-img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#client_image").change(function() {
    readIMG(this);
});