/* Webarch Admin Dashboard 
/* This JS is only for DEMO Purposes - Extract the code that you need
-----------------------------------------------------------------*/ 
		
	
	//Traditional form validation sample
		$('#form_traditional_validation').validate({
			focusInvalid: false, 
			ignore: "",
			rules: {
				form1Amount: {
					minlength: 2,
					required: true
				},
				form1CardHolderName: {
					minlength: 2,
					required: true,
				},
				form1CardNumber: {
					required: true,
					creditcard: true
				},
				cardType:{
					required: true
				}
			},

			invalidHandler: function (event, validator) {
				//display error alert on form submit    
			},

			errorPlacement: function (label, element) { // render error placement for each input type   
				$('<span class="error"></span>').insertAfter(element).append(label)
				var parent = $(element).parent('.input-with-icon');
				parent.removeClass('success-control').addClass('error-control');  
			},

			highlight: function (element) { // hightlight error inputs
				var parent = $(element).parent();
				parent.removeClass('success-control').addClass('error-control'); 
			},

			unhighlight: function (element) { // revert the change done by hightlight
				
			},

			success: function (label, element) {
				var parent = $(element).parent('.input-with-icon');
				parent.removeClass('error-control').addClass('success-control'); 
			},

			submitHandler: function (form) {
			
			}
		});	

	

	    $('#subscriptionPlan').validate({
                errorElement: 'span', 
                errorClass: 'error', 
                focusInvalid: false, 
                ignore: "",
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                    price: {
                        required: true
                    },
                    trial_days: {
                        required: true
                    },                    
                },

                invalidHandler: function (event, validator) {
                    //display error alert on form submit                       
                },

                errorPlacement: function (label, element) { // render error placement for each input type  
                    $('<span class="is_error"></span>').insertAfter(element).append(label)
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
                    var isValid = true;
                        var atLeastOneIsChecked = $('input[name="feature[]"]:checked').length > 0;

                         if (atLeastOneIsChecked) {
                            $('input[name="feature[]"]').removeClass('error_border');                            
                        } else {
                            $('input[name="feature[]"]').addClass('error_border');
                            isValid = false;
                        }     

                    if(isValid) {
                        form.submit();
                    }                       
                }
           
            });
          
	   
            	
              $('#userUpdate').validate({
                errorElement: 'span', 
                errorClass: 'error', 
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
                    address: {
                        required: true,
                        minlength: 5,
                    },
                    about_me: {
                        required: true,
                        minlength: 15,
                    },
                    password: { 
                        required: false,
                        minlength: 6,
                    }, 
                    confirmPassword: { 
                        equalTo: "#password",
                        minlength: 6,
                    },
                 },

                invalidHandler: function (event, validator) {
                    //display error alert on form submit                       
                },

                errorPlacement: function (label, element) { // render error placement for each input type  
                    $('<span class="is_error"></span>').insertAfter(element).append(label)
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
      
          	
 $('#subscribe').validate({
                errorElement: 'span', 
                errorClass: 'error', 
                focusInvalid: false, 
                ignore: "",
                rules: {
                    email: {
                        email: true,
                        required: true
                    },
                    
                },
                invalidHandler: function (event, validator) {
                    //display error alert on form submit    
                },                          
                errorPlacement: function (label, element) { // render error placement for each input type
                    $('<span class="error"></span>').insertAfter(element).append(label)
                    var icon = $(element).parent('.input-with-icon').children('i');
                    var parent = $(element).parent('.input-with-icon');
                    icon.removeClass('fa fa-check').addClass('fa fa-exclamation');  
                    parent.removeClass('success-control').addClass('error-control');  
                },

                highlight: function (element) { // hightlight error inputs
                    var parent = $(element).parent();
                    parent.removeClass('success-control').addClass('error-control'); 
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    
                },

                success: function (label, element) {
                    
                    var icon = $(element).parent('.input-with-icon').children('i');
                    var parent = $(element).parent('.input-with-icon');
                    icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
                    parent.removeClass('error-control').addClass('success-control'); 
                
                    },
                submitHandler: function (form) {
                    var email= $('#subscribe #email').val();
                    var token= $('input[name="_token"]').val();

                    $.post('/subscribe',{email:email,_token:token},function(data){
                        console.log(data);
                     if(data=='false'){
                    $('#showSuccess').hide();
                    $('#showError').html('Email address already in use');
                    $('#showError').show();
                    setTimeout(function(){
                    $('#email').val('');
                    $('#showError').hide('slow');
                    },4000)
                    }if(data=='true'){

                        
                     $('#showError').hide();
                    $('#showSuccess').html('You have been successfully subscribed to our newsletter.');
                    $('#showSuccess').show();
                    setTimeout(function(){
                     $('#email').val('');   
                    $('#showSuccess').hide('slow');
                    },4000)

                    }
                    
                    });
                    return false;
                               
                   }
               });
    
        $("#subscribe").change(function () {
                $('#subscribe').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });
           ////////////////////////////////Iconic form validation sample    
           $(".next").click(function(){
             var form = $("#analysis");
             form.validate({
                errorElement: 'span',
                    errorClass: 'help-block',
                    highlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').addClass("has-error");
                    },
                     errorPlacement: function (error, element) { // render error placement for each input type
                    var icon = $(element).parent('.input-with-icon').children('i');
                    var parent = $(element).parent('.input-with-icon');
                    icon.removeClass('fa fa-check').addClass('fa fa-exclamation');  
                    parent.removeClass('success-control').addClass('error-control');  
                },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').removeClass("has-error");
                    },
                rules: {
                    name: {
                        minlength: 3,
                        required: true
                    },
                    business: {
                        minlength: 3,
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        minlength: 10,
                       required: true
                    },
                    current_rate: {
                         required: true,
                    },
                    state: {
                        required: true,
                    },
                    city: {
                        minlength: 3,
                        required: true
                    },
                    hear_about: {
                       required: true
                    },
                    hear_about_other: {
                        minlength: 3
                    },
                    confirmcapcha: { 
                        required: true
                        }, 
                    capcha: { 
                    equalTo: "#confirmcapcha",
                    number: true,
                    required: true
                    }
                },
                
                success: function (label, element) {
                    var icon = $(element).parent('.input-with-icon').children('i');
                    var parent = $(element).parent('.input-with-icon');
                    icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
                    parent.removeClass('error-control').addClass('success-control'); 
                },

                submitHandler: function (form) {
                 form.submit();
                }
           
            });
      
            if (form.valid() === true){
            
                    if ($('.account_information').is(":visible")){
                        current_fs = $('.account_information');
                        next_fs = $('.company_information');
                    }else if($('.company_information').is(":visible")){
                        current_fs = $('.company_information');
                        next_fs = $('.personal_information');
                    }
                    
                    next_fs.show(); 
                    current_fs.hide();
                }
            });

            $('.previous').click(function(){
                if($('.company_information').is(":visible")){
                    current_fs = $('.company_information');
                    next_fs = $('.account_information');
                }else if ($('.personal_information').is(":visible")){
                    current_fs = $('.personal_information');
                    next_fs = $('.company_information');
                }
                next_fs.show(); 
                current_fs.hide();
            });
            
           
            
             $("#contact").validate({
                errorElement: 'span', 
                errorClass: 'error', 
                focusInvalid: false, 
                ignore: "",
                rules: {
                    name: {
                        minlength: 3,
                        required: true
                    },
                    business: {
                        minlength: 3,
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        minlength: 10,
                       required: true
                    },
                    current_rate: {
                         required: true,
                    },
                    state: {
                        required: true,
                    },
                    city: {
                        minlength: 3,
                        required: true
                    },
                    hear_about: {
                       required: true
                    },
                    hear_about_other: {
                        minlength: 3
                    },
                    confirmcapcha: { 
                        required: true
                        }, 
                    capcha: { 
                    equalTo: "#confirmcapcha",
                    number: true,
                    required: true
                    }
                },invalidHandler: function (event, validator) {
                    //display error alert on form submit    
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var icon = $(element).parent('.input-with-icon').children('i');
                    var parent = $(element).parent('.input-with-icon');
                    icon.removeClass('fa fa-check').addClass('fa fa-exclamation');  
                    parent.removeClass('success-control').addClass('error-control');  
                },

                highlight: function (element) { // hightlight error inputs
                    var parent = $(element).parent();
                    parent.removeClass('success-control').addClass('error-control'); 
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    
                },

                success: function (label, element) {
                    var icon = $(element).parent('.input-with-icon').children('i');
                    var parent = $(element).parent('.input-with-icon');
                    icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
                    parent.removeClass('error-control').addClass('success-control'); 
                },
                submitHandler: function (form) {
                 form.submit();
                }
           
            });
      
            
             
            //////////////////end popup//////////////////////////

	//Form Condensed Validation
	$('#addpage').validate({
               focusInvalid: false, 
                ignore: "",
                rules: {
                    category_id: {
                      required: true
                    },
                    chkTerms: {
                      required: true
                    },
                    title: {
                        minlength: 3,
                        required: true
                    },
					heading: {
                        minlength: 3,
                        required: true
                    },
                    short_content: {
						 minlength: 10,
                        required: true,
                    },
                    headerTextH1: {
						 minlength: 5
                      },                  
                    headerTextH2: {
						 minlength: 10
                      },
                    hiddenfeaturedImage: {
					    required: true,
                    },
                    hiddenheaderimage: {
					    required: true,
                    }
                },
				messages: {
					hiddenfeaturedImage: {
					required: "Featured Image's Height and Width must not exceed 1500x720.",
					},
					hiddenheaderimage: {
					required: "Header Image's Height and Width must not exceed 2260x860.",
					}
				},           
                
				invalidHandler: function (event, validator) {
					//display error alert on form submit    
                },
			                
                errorPlacement: function (label, element) { // render error placement for each input type
					$('<span class="error"></span>').insertAfter(element).append(label)
                    var icon = $(element).parent('.input-with-icon').children('i');
                    var parent = $(element).parent('.input-with-icon');
                    icon.removeClass('fa fa-check').addClass('fa fa-exclamation');  
                    parent.removeClass('success-control').addClass('error-control');  
                },

                highlight: function (element) { // hightlight error inputs
					var parent = $(element).parent();
                    parent.removeClass('success-control').addClass('error-control'); 
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    
                },

                success: function (label, element) {
                    var icon = $(element).parent('.input-with-icon').children('i');
					var parent = $(element).parent('.input-with-icon');
                    icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
					parent.removeClass('error-control').addClass('success-control'); 
                },
                submitHandler: function (form) {
                form.submit();
                }
            });	
	
	    $('.select2', "#addpage").change(function () {
                $('#addpage').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });
	//////////////////////////////////////////////File Upload validation
	$(document).ready(function(){
	$('#featuredImage').val('ok');	
	$('#headerImage').val('ok');	
	});
	
	$("#headerImageUpload").bind("change", function (element) {
                var fileUpload = $("#headerImageUpload")[0];
                var reader = new FileReader();

                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {

                 var image = new Image();

                    image.src = e.target.result;
                    image.onload = function () {

                        var height = this.height;
                        var width = this.width;
                        if (height > 860 || width > 2260) {
							$('#headerImage').val('');
			          
                        }else{
						$('span.error').find('label[for="headerImage"]').text(''); 
						$('#headerImage').val('ok');	
						}
                        
                    };
                }
    });
    
	$("#featuredImageUpload").bind("change", function (element) {
                var fileUpload = $("#featuredImageUpload")[0];
                var reader = new FileReader();

                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {

                 var image = new Image();

                    image.src = e.target.result;
                    image.onload = function () {

                        var height = this.height;
                        var width = this.width;
                        if (height > 720 || width > 1500) {
							$('#featuredImage').val('');
			          
                        }else{
						$('span.error').find('label[for="featuredImageUpload"]').text(''); 
						$('#featuredImage').val('ok');	
						}
                        
                    };
                }
    });
  
	////////////////////////////////////////////////////////////////////////
	
	$('#userEdit').validate({
                errorElement: 'span', 
                errorClass: 'error', 
                focusInvalid: false, 
                ignore: "",
                rules: {
                    username: {
                        minlength: 3,
                        required: true
                    },
                    FirstName: {
                        minlength: 3,
                        required: true
                    },
					LastName: {
                        minlength: 3,
                        required: true
                    },
                    Gender: {
                        required: true,
                    },
					Occupation: {
						 minlength: 3,
                        required: true,
                    },
					email: {
                        required: true,
						email: true
                    },
                    Address: {
						minlength: 10,
                        required: true,
                    },
					City: {
						minlength: 5,
                        required: true,
                    },
					State: {
						minlength: 3,
                        required: true,
                    },
					Country: {
						minlength: 3,
                        required: true,
                    },
					PostalCode: {
						number: true,
						maxlength: 6,
                        required: true,
                    },
					CunCode: {
						minlength: 3,
						maxlength: 4,
                        required: true,
                    },
					Mobile: {
						maxlength: 10,
                        required: true,
                    },
                    password: { 
					required: false,
                    minlength: 6,
                 	}, 
					confirmPassword: { 
					equalTo: "#Password",
					minlength: 6,
					}
                },

                invalidHandler: function (event, validator) {
					//display error alert on form submit    
                },

                errorPlacement: function (label, element) { // render error placement for each input type   
					$('<span class="error"></span>').insertAfter(element).append(label)
                },

                highlight: function (element) { // hightlight error inputs
					
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    
                },

                success: function (label, element) {
                  
                },

                submitHandler: function (form) {
                form.submit();
                }
            });	
	
	//Form Wizard Validations
	var $validator = $("#commentForm").validate({
		  rules: {
		    emailfield: {
		      required: true,
		      email: true,
		      minlength: 3
		    },
		    txtFullName: {
		      required: true,
		      minlength: 3
		    },
			txtFirstName: {
		      required: true,
		      minlength: 3
		    },
			txtLastName: {
		      required: true,
		      minlength: 3
		    },
			txtCountry: {
		      required: true,
		      minlength: 3
		    },
			txtPostalCode: {
		      required: true,
		      minlength: 3
		    },
			txtPhoneCode: {
		      required: true,
		      minlength: 3
		    },
			txtPhoneNumber: {
		      required: true,
		      minlength: 3
		    },
		    urlfield: {
		      required: true,
		      minlength: 3,
		      url: true
		    }
		  },
		  errorPlacement: function(label, element) {
				$('<span class="arrow"></span>').insertBefore(element);
				$('<span class="error"></span>').insertAfter(element).append(label)
			}
		});


//  Post management validations

$('#addpost').validate({
               focusInvalid: false, 
                ignore: "",
                rules: {
                    category_id: {
                      required: true
                    },
                    title: {
                        minlength: 3,
                        required: true
                    },
                    heading: {
                        minlength: 3,
                        required: true
                    },
                    short_content: {
                         minlength: 10,
                        required: true,
                    },
                    headerTextH1: {
                         minlength: 5
                      },                  
                    headerTextH2: {
                         minlength: 10
                      },
                    hiddenfeaturedImage: {
                        required: true,
                    },
                    hiddenheaderimage: {
                        required: true,
                    }
                },
                messages: {
                    hiddenfeaturedImage: {
                    required: "Featured Image's Height and Width must not exceed 1500x720.",
                    },
                    hiddenheaderimage: {
                    required: "Header Image's Height and Width must not exceed 2260x860.",
                    }
                },           
                
                invalidHandler: function (event, validator) {
                    //display error alert on form submit    
                },
                            
                errorPlacement: function (label, element) { // render error placement for each input type
                    $('<span class="error"></span>').insertAfter(element).append(label)
                    var icon = $(element).parent('.input-with-icon').children('i');
                    var parent = $(element).parent('.input-with-icon');
                    icon.removeClass('fa fa-check').addClass('fa fa-exclamation');  
                    parent.removeClass('success-control').addClass('error-control');  
                },

                highlight: function (element) { // hightlight error inputs
                    var parent = $(element).parent();
                    parent.removeClass('success-control').addClass('error-control'); 
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    
                },

                success: function (label, element) {
                    var icon = $(element).parent('.input-with-icon').children('i');
                    var parent = $(element).parent('.input-with-icon');
                    icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
                    parent.removeClass('error-control').addClass('success-control'); 
                },
                submitHandler: function (form) {
                form.submit();
                }
            });  

	 $('#addblogcategory').validate({
               focusInvalid: false, 
                ignore: "",
                rules: {
                    name: {
                      required: true
                    },
                    slug: {
                        minlength: 3,
                        required: true
                    },
                    intro: {
                        minlength: 10,
                        required: true
                    }
                },
                messages: {
                    
                },           
                
                invalidHandler: function (event, validator) {
                    //display error alert on form submit    
                },
                            
                errorPlacement: function (label, element) { // render error placement for each input type
                    $('<span class="error"></span>').insertAfter(element).append(label)
                    var icon = $(element).parent('.input-with-icon').children('i');
                    var parent = $(element).parent('.input-with-icon');
                    icon.removeClass('fa fa-check').addClass('fa fa-exclamation');  
                    parent.removeClass('success-control').addClass('error-control');  
                },

                highlight: function (element) { // hightlight error inputs
                    var parent = $(element).parent();
                    parent.removeClass('success-control').addClass('error-control'); 
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    
                },

                success: function (label, element) {
                    var icon = $(element).parent('.input-with-icon').children('i');
                    var parent = $(element).parent('.input-with-icon');
                    icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
                    parent.removeClass('error-control').addClass('success-control'); 
                },
                submitHandler: function (form) {
                form.submit();
                }
            }); 

//Username uniqueness check validation for Front register module.

$('#Username').blur(function(){
var username = $(this).val();
var token= $('input[name="_token"]').val();


$.post('usernameCheck',{username:username,_token:token},function(data){
                if(data=='false'){
                $('#showSuccess').hide();
                $('#showError').html('Username'+' '+username+' '+'has already been taken');
                $('#showError').show();
                setTimeout(function(){
                $('#Username').val('');
                $('#showError').hide('slow');
                },4000)
                }if(data=='true'){
                    
                 $('#showError').hide();
                $('#showSuccess').html('Username'+' '+username+' '+'is available');
                $('#showSuccess').show();
                setTimeout(function(){
                 $('#email').val('');   
                $('#showSuccess').hide('slow');
                },4000)

                }
                
                });

});