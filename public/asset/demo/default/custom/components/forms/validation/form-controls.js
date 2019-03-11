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
                country_list: {
                    required: true
                },
                email: {
                    required: true,
                    email: true 
                },
                city: {
                    required: true 
                },
                dayphone: {
                    required: true 
                },
                zipcode: {
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

    return {
        // public functions
        init: function() {
            demo1(); 
        }
    };
}();

jQuery(document).ready(function() {    
    FormControls.init();
});