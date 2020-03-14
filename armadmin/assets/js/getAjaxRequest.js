/*
 Author: Mohan jadhav<mohan212jadhav@gmail.com>
 Author URL: http://codexhunter.com
 Date : 14-07-18
 Description : This files includes all insert JS function over the CRM ADMIN
 License: All license resverd by codexhunter.com
 License URL: http://codexhunter.com/licenses/crmAdmin/3.0/
 */

/*Get Roles*/
function getRoles() {

    $('#tblRoles').DataTable({
        "iDisplayLength": 5,
        "bDestroy": true,
        "fixedHeader": true,
        "ajax": {
            url: BASEPATH + 'getRecordsController/getRoles',
            type: 'post'
        },
    });

}
