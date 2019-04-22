/*----------------------------------------------------------------- Login form */ 
	
	$('#login-form').validate({

                focusInvalid: false, 
                ignore: "",
                rules: {
                    email: {
                        email: true,
                        required: true
                    },
                    password: {
                        required: true,
                    }
                },

                invalidHandler: function (event, validator) {
					//display error alert on form submit    
                },

                errorPlacement: function (label, element) { // render error placement for each input type   
					$('<span class="error"></span>').insertAfter(element).append(label)
                    var parent = $(element).parent();
                    parent.removeClass('success-control').addClass('error-control');  
                },

                highlight: function (element) { // hightlight error inputs
                    var parent = $(element).parent('div');
                    parent.removeClass('success-control').addClass('error-control'); 
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    var parent = $(element).parent('div');
                    parent.removeClass('error-control').addClass('success-control'); 
                },

                success: function (label, element) {
					var parent = $(element).parent();
					parent.removeClass('error-control').addClass('success-control'); 
                },
			    submitHandler: function(form) {
						form.submit();
				}
            });	


/*----------------------------------------------------------------- Forgot form */ 
    
    $('#forgot-form').validate({

                focusInvalid: false, 
                ignore: "",
                rules: {
                    email: {
                        email: true,
                        required: true
                    }
                },

                invalidHandler: function (event, validator) {
                    //display error alert on form submit    
                },

                errorPlacement: function (label, element) { // render error placement for each input type   
                    $('<span class="error"></span>').insertAfter(element).append(label)
                    var parent = $(element).parent();
                    parent.removeClass('success-control').addClass('error-control');  
                },

                highlight: function (element) { // hightlight error inputs
                    var parent = $(element).parent('div');
                    parent.removeClass('success-control').addClass('error-control'); 
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    var parent = $(element).parent('div');
                    parent.removeClass('error-control').addClass('success-control'); 
                },

                success: function (label, element) {
                    var parent = $(element).parent();
                    parent.removeClass('error-control').addClass('success-control'); 
                },
                submitHandler: function(form) {
                        form.submit();
                }
            }); 

    
/*----------------------------------------------------------------- Reser Password form */ 
    
    $('#resetpassword-form').validate({

                focusInvalid: false, 
                ignore: "",
                rules: {
                    password: { 
                        required: true,
                        minlength: 6,
                    }, 
                    confirmPassword: { 
                        equalTo: "#password",
                        minlength: 6,
                    }
                },

                invalidHandler: function (event, validator) {
                    //display error alert on form submit    
                },

                errorPlacement: function (label, element) { // render error placement for each input type   
                    $('<span class="error"></span>').insertAfter(element).append(label)
                    var parent = $(element).parent();
                    parent.removeClass('success-control').addClass('error-control');  
                },

                highlight: function (element) { // hightlight error inputs
                    var parent = $(element).parent('div');
                    parent.removeClass('success-control').addClass('error-control'); 
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    var parent = $(element).parent('div');
                    parent.removeClass('error-control').addClass('success-control'); 
                },

                success: function (label, element) {
                    var parent = $(element).parent();
                    parent.removeClass('error-control').addClass('success-control'); 
                },
                submitHandler: function(form) {
                        form.submit();
                }
            }); 
/*----------------------------------------------------------------- Registration form */ 
    
    $('#userRegister').validate({

                focusInvalid: false, 
                ignore: "",
                rules: {
                    first_name: {
                        minlength: 3,
                        required: true
                    },
                    last_name: {
                        minlength: 3,
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    mobile: {
                        number: true,
                        required: true,
                    },
                    password: { 
                        required: true,
                        minlength: 6,
                    }, 
                    confirmPassword: { 
                        equalTo: "#password",
                        minlength: 6,
                    }, 
                    company_name: {
                        minlength: 3,
                        required: true
                    }, 
                    company_email: {
                        minlength: 3,
                        email: true,
                        required: true
                    }, 
                    company_mobile: {
                        number: true,
                        required: true
                    }
                },

                invalidHandler: function (event, validator) {
                    //display error alert on form submit    
                },

                errorPlacement: function (label, element) { // render error placement for each input type   
                    $('<span class="error"></span>').insertAfter(element).append(label)
                    var parent = $(element).parent('div');
                    parent.removeClass('success-control').addClass('error-control');  
                },

                highlight: function (element) { // hightlight error inputs
                    var parent = $(element).parent('div');
                    parent.removeClass('success-control').addClass('error-control'); 
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    var parent = $(element).parent('div');
                    parent.removeClass('error-control').addClass('success-control'); 
                },

                success: function (label, element) {
                    var parent = $(element).parent('div');
                    parent.removeClass('error-control').addClass('success-control'); 
                },
                submitHandler: function(form) {
                        form.submit();
                }
            }); 


    
///////////////////////////////////////// END
