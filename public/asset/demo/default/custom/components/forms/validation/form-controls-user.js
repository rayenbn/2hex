//== Class definition

var FormControls = function () {
    //== Private functions

    var demo1 = function () {
        $( "#m_form_1" ).validate({
            // define validation rules
            rules: {
                companyname: {
                    required: true
                },
                address1: {
                    required: true
                },
                email: {
                    required: true,
                    email: true 
                },
                country_list: {
                    required: true 
                },
                city: {
                    required: true 
                },
                dayphone: {
                    required: true 
                },
                digits: {
                    required: true,
                    digits: true
                },
                creditcard: {
                    required: true,
                    creditcard: true 
                },
                phone: {
                    required: true,
                    phoneUS: true 
                },
                zipcode: {
                    required: true
                },
                options: {
                    required: true,
                    minlength: 2,
                    maxlength: 4
                },
                checkbox: {
                    required: true
                },
                checkboxes: {
                    required: true,
                    minlength: 1,
                    maxlength: 2
                },
                radio: {
                    required: true
                }
            },
            
            //display error alert on form submit  
            invalidHandler: function(event, validator) {     
                var alert = $('#m_form_1_msg');
                alert.removeClass('m--hide').show();
                mApp.scrollTo(alert, -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });       
    }

    var demo2 = function () {
        $( "#masterinvitationform" ).validate({
            // define validation rules
            rules: {
                master_name: {
                    required: true
                },
                master_email: {
                    required: true,
                    email: true 
                }
            },
            
            //display error alert on form submit  
            invalidHandler: function(event, validator) {     
                var alert = $('#m_form_3_msg');
                alert.removeClass('m--hide').show();
                mApp.scrollTo(alert, -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });       
    }

    var demo3 = function () {
        $( "#userinvitationform" ).validate({
            // define validation rules
            rules: {
                user_name: {
                    required: true
                },
                user_email: {
                    required: true,
                    email: true 
                }
            },
            
            //display error alert on form submit  
            invalidHandler: function(event, validator) {     
                var alert = $('#m_form_3_msg');
                alert.removeClass('m--hide').show();
                mApp.scrollTo(alert, -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });       
    }


    return {
        // public functions
        init: function() {
            demo1();
            demo2();
            demo3(); 
        }
    };
}();

jQuery(document).ready(function() {    
    FormControls.init();
});