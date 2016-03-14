var ControllerJS = function () {

	var handleValidationUserInfo = function () {
		var form = $('#form_user_info');
		var error = $('.alert-danger');
		var info = $('.alert-info');

		form.validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			ignore: "",  // validate all fields including form hidden input
			rules: {
				user_email: {
					required: true,
					email: true
				},
			    new_password: {
			        minlength: 8,
			        required: true
			    },
			    confirm_password: {
			    	required: true,
			    	equalTo: "#new_password"
			    }	        
			},

			invalidHandler: function (event, validator) { //display error alert on form submit              
			    error.show();
			    info.hide();
			    App.scrollTo(error, -200);
			},

			highlight: function (element) { // hightlight error inputs
			    $(element)
			        .closest('.form-group').addClass('has-error'); // set error class to the control group
			},

			unhighlight: function (element) { // revert the change done by hightlight
			    $(element)
			        .closest('.form-group').removeClass('has-error'); // set error class to the control group
			},

			success: function (label) {
			    label
			        .closest('.form-group').removeClass('has-error'); // set success class to the control group
			},

			submitHandler: function (form) {
			    error.hide();
			    form.submit();
			}
		});
	}

    return {
        //main function to initiate the module
        init: function () {
            handleValidationUserInfo();
        }

    };

}();