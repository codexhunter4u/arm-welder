var isFormValid = true;

function activateRow(id, status) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'officesController/activateRow',
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
        url: BASEPATH + 'officesController/editRow',
        data: { id: rowId },
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            console.log(data);
            $("#formAction").val("addRow");
            $("#office_location").val(data.office_location);
            $("#office_phone").val(data.office_phone);
            $("#office_fax").val(data.office_fax);
            $("#office_email").val(data.office_email);
            $("#office_address").val(data.office_address);
            $("#updateRowId").val(rowId);
        }
    });
}

$('#btnAddRow').click(function() {
    var controllerAction = $("#formAction").val();
    var data = JSON.stringify($('#frmAddRow').serializeArray());
    var id = $("#updateRowId").val();
    validate("frmAddRow");
    if (isFormValid) {
        $.ajax({
            url: BASEPATH + 'officesController/' + controllerAction + '/' + id,
            type: "post",
            data: { formData: data },
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
            "url": BASEPATH + 'officesController/getRows',
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
        url: BASEPATH + 'officesController/deleteRow',
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
            $(this).addClass("required");
            return isFormValid = false;
        } else {
            $(this).removeClass("required");
            return isFormValid = true;
        }
    });
}