
$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a,.links a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});

// ********************************** Loging & Registeration JS code ***********************************

$(function() {

    $("#signUp").click(function() {
       
       if(validator('frmSignup') && checksum==true){
          var data = JSON.stringify($('#frmSignup').serializeArray());
          $.ajax({
            url: BASEPATH+'loggerController/signUp',
            type: 'post',
            data: { formData : data },
            cache: false,
            success: function(res) {
              var data = JSON.parse(res);
              data['responseCode']=='1' ? toastr.success(data['responseMessage']) : toastr.error(data['responseMessage']);
              $('a[href="#signin-agile"]').click();
              $("#frmSignup")[0].reset();
            }
          });

       }
       
    });

    function validator(e){

      return $('#'+e+' :input').filter(function () {
        $(this).attr('placeholder',"This field is required").addClass('errorMessage');
        return $.trim($(this).val()).length == 0
      }).length == 0;

    }


    $("#signIn").click(function() {

       if(validator('frmLogin')){
          var data = JSON.stringify($('#frmLogin').serializeArray());
          var flag = $('.rememberMe').is(":checked") ? '1' : '0'; 
          $.ajax({
            url: BASEPATH+'loggerController/login',
            type: 'post',
            data: { formData : data, rememberMe : flag },
            cache: false,
            success: function(res) {
              var data = JSON.parse(res);
              if(data['responseCode']!='1'){
                toastr.error(data['responseMessage']);
                return false;
              }else{
                window.location.href = BASEPATH+''+data['redirect_url'];
              }
            }
          });
       }
       
    });

});


$(document).on('input', ".userConfirmPassword", function () {

    if ($('.user_password').val() != '' && $(this).val() !== $(".user_password").val()) {
      $(this).css('border-color','red');
      checksum = false;
    }else{
      $(this).css('border-color','green');
      checksum = true;
    }

});