/*
Author: Mohan jadhav<mohan212jadhav@gmail.com>
Author URL: http://codexhunter.com
Date : 14-07-18
Description : This files includes all insert JS function over the CRM ADMIN
License: All license resverd by codexhunter.com
License URL: http://codexhunter.com/licenses/crmAdmin/3.0/
*/

/*Add Roles*/
function insertRoles(data){

	if($('#roleName').val()!=''){

		$.ajax({
            url: BASEPATH+'setRecordsController/insertRoles',
			type: 'post',
            data: { formData : $('#addRoleFrm').serializeArray() },
        	cache: false,
            success: function(res) {
                var data = jQuery.parseJSON(res);
                getRoles() // get the roles dynamic without reloading the page
                data['responseCode']=='1' ? toastr.success(data['responseMessage']) : toastr.success(data['responseMessage']);
                $('#roleName').val('');
            }
        });

	}else{

		toastr.error('Please enter the <b>Role</b> name');
	}	

}