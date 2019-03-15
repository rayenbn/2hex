//== Class definition

var FormControls = function () {
    //== Private functions

    var demo1 = function () {
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