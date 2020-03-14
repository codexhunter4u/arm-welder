var isFormValid = true;

function activateRow(id, status) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'socialController/activateRow',
        data: { id: id, status: status },
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            data['responseCode'] == '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
            getRows();
        }
    });
}

function editRow(rowId) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'socialController/editRow',
        data: { id: rowId },
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            $("#formAction").val("addRow");
            $("#media_name").val(data.media_name);
            $("#media_url").val(data.media_url);
            $("#temp-img").attr("src", data.img_path);
            $("#updateRowId").val(rowId);
        }
    });
}

$('#btnAddRow').click(function() {
    var controllerAction = $("#formAction").val();
    var formData = new FormData($("#frmAddRow")[0]);
    var id = $("#updateRowId").val();
    if (isFormValid) {
        $.ajax({
            url: BASEPATH + 'socialController/' + controllerAction + '/' + id,
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
                    $('#frmAddRow')[0].reset();
                }
                getRows();
            }
        });
    } else {
        toastr.error('Please fill the mandetory fields');
        return false;
    }
});

// select2 Jquery pluging for Dropdown search
$('.select2').select2();

function getRows() {

    $(".tblRow").DataTable().destroy();
    $('.tblRow').DataTable({
        "processing": true, //Feature control the processing indicator.
        "autoWidth": true,
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASEPATH + 'socialController/getRows',
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

function deleteRow(rowId) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'socialController/deleteRow',
        data: { id: rowId },
        cache: false,
        success: function(res) {
            console.log(res);
            var data = JSON.parse(res);
            data['responseCode'] == '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
            getRows();
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
            $('#temp-img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#upload_img").change(function() {
    readIMG(this);
});