var isFormValid = true;

function activateMember(id, status) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'OurTeamController/activateMember',
        data: { id: id, status: status },
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            data['responseCode'] == '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
            getTeam();
        }
    });
}

function editTeam(rowId) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'OurTeamController/editTeam',
        data: { id: rowId },
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            $("#formAction").val("addTeam");
            $("#member_name").val(data.member_name);
            $("#member_designation").val(data.member_designation);
            $("#member_desc").text(data.member_desc);
            $("#updateRowId").val(rowId);
        }
    });
}

$('#btnAddTeam').click(function() {
    var controllerAction = $("#formAction").val();
    var formData = new FormData($("#frmAddTeam")[0]);
    var id = $("#updateRowId").val();
    if (isFormValid) {
        $.ajax({
            url: BASEPATH + 'OurTeamController/' + controllerAction + '/' + id,
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
                    $('#frmAddTeam')[0].reset();
                }
                getTeam();
            }
        });
    } else {
        toastr.error('Please fill the mandetory fields');
        return false;
    }
});

// select2 Jquery pluging for Dropdown search
$('.select2').select2();

function getTeam() {

    $(".tblTeam").DataTable().destroy();
    $('.tblTeam').DataTable({
        "processing": true, //Feature control the processing indicator.
        "autoWidth": true,
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASEPATH + 'OurTeamController/getTeam',
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

function deleteTeam(rowId, img_path) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'OurTeamController/deleteTeam',
        data: { id: rowId, image_path: img_path },
        cache: false,
        success: function(res) {
            console.log(res);
            var data = JSON.parse(res);
            data['responseCode'] == '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
            getTeam();
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