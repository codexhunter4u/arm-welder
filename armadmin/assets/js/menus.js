function getMenuList() {
    $.ajax({
        type: 'GET',
        url: BASEPATH + 'menusController/getMenuList',
        cache: false,
        success: function(res) {
            var data = JSON.parse(res);
            var menuList = '';
            for (var i = 0; i < data.length; i++) {
                menuList += '<option value="' + data[i].menu_id + '">' + data[i].menu_name + '</option>';
            }
            $('#menu_list').append(menuList);
            getMenus();
        }
    });
}

function activateMenu(id, status) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'menusController/activateMenu',
        data: { id: id, status: status },
        cache: false,
        success: function(res) {
            console.log(res);
            var data = JSON.parse(res);
            data['responseCode'] == '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
            getMenus();
        }
    });
}

function editMenu(rowId, menuName, parentId) {
    $("#formAction").val("updateMenu");
    $("#menu_name").val(menuName);
    $("#updateRowId").val(rowId);
    $("#menu_list").val(parentId).trigger('change');
}

$("#btnAddMenu").click(function() {
    var controllerAction = $("#formAction").val();
    var id = $("#updateRowId").val();
    if ($('#menu_name').val() != '' && $('#menu_list').val() != '') {
        var data = JSON.stringify($('#frmAddMenu').serializeArray());
        $.ajax({
            url: BASEPATH + 'menusController/' + controllerAction + '/' + id,
            type: 'post',
            data: { formData: data },
            success: function(res) {
                console.log(res);
                var data = JSON.parse(res);
                data['responseCode'] == '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
                $("#frmAddMenu")[0].reset();
                getMenuList();
            }
        });
    } else {
        toastr.error('Please fill the mandetory fields');
        return false;
    }
});

// select2 Jquery pluging for Dropdown search
$('.select2').select2();

function getMenus() {

    $(".tblMenu").DataTable().destroy();
    $('.tblMenu').DataTable({
        "processing": true, //Feature control the processing indicator.
        "autoWidth": true,
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASEPATH + 'menusController/getMenus',
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
        "pageLength": 5
    });
}

function deleteMenu(rowId) {
    $.ajax({
        type: 'POST',
        url: BASEPATH + 'menusController/deleteMenu',
        data: { id: rowId },
        cache: false,
        success: function(res) {
            console.log(res);
            var data = JSON.parse(res);
            data['responseCode'] == '1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
            getMenus();
        }
    });
}