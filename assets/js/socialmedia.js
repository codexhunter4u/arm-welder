$(document).ready(function () {

});

function get_gmail_details() {

    $(".socialMedia").DataTable().destroy();

    var thead = '';
    var thead = '<tr>';
    jQuery.each(socialMediaTablesHeading.gmail, function (i, val) {
        thead += '<td>' + val + '</td>';
    });
    thead += '</tr>';

    $('.socialMedia thead').html(thead);

    $('.socialMedia').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASEPATH + 'socialMediaController/get_gmail_details',
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            },
        ],
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'Todos']],

    });
    
   setTimeout(function(){
      is_read();
   },1000);

}

/*
 * @author Mohan J.<mohan212jadahv@gmail.com3>
 * Check the input value for mail read or not.If not then highlight them
 * @param {null} null
 * @returns {null}
 */
function is_read(){
    $(".is_read").each(function () {
        if ($(this).val() == 0) {
            $(this).parent().parent().addClass("mail_not_read");
        }
    });
}

function get_facebook_details() {

    $(".socialMedia").DataTable().destroy();

    var thead = '';
    var thead = '<tr>';
    jQuery.each(socialMediaTablesHeading.facebook, function (i, val) {
        thead += '<td>' + val + '</td>';
    });
    thead += '</tr>';

    $('.socialMedia thead').html(thead);

    $('.socialMedia').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASEPATH + 'socialMediaController/get_facebook_details',
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            },
        ],

    });
    
    setTimeout(function(){
        is_read();
    },1000);

}

function view_mails(id){
 alert(id);
    $.ajax({
        type: 'GET',
        url : BASEPATH + 'socialMediaController/view_mails',
        data: { id: id },
        cache: false,
        success: function (res) {
           alert(res);
           console.log(res);
        }
    });
    
}