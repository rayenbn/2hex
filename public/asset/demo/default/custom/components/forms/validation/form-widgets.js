//== Class definition

var FormWidgets = function () {
    //== Private functions
    var validator;

    var initWidgets = function() {
        // datepicker
        $('#m_datepicker').datepicker({
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });

        // datetimepicker
        $('#m_datetimepicker').datetimepicker({
            pickerPosition: 'bottom-left',
            todayHighlight: true,
            autoclose: true,
            format: 'yyyy.mm.dd hh:ii'
        });

        // timepicker
        $('#m_timepicker').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: true
        });

        // daterangepicker
        $('#m_daterangepicker').daterangepicker({
            buttonClasses: 'm-btn btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary'
        }, function(start, end, label) {
            var input = $('#m_daterangepicker').find('.form-control');
            
            input.val( start.format('YYYY/MM/DD') + ' / ' + end.format('YYYY/MM/DD'));
            validator.element(input); // validate element
        });

        // bootstrap switch
        $('[data-switch=true]').bootstrapSwitch();
        $('[data-switch=true]').on('switchChange.bootstrapSwitch', function() {
            validator.element($(this)); // validate element
        });

        // bootstrap select
        $('#m_bootstrap_select').selectpicker();
        $('#m_bootstrap_select').on('changed.bs.select', function() {
            validator.element($(this)); // validate element
        });

        // department select1
        $('#department').select2({
            placeholder: "Select a Company",
        });
        $('#department').on('select2:change', function(){
            validator.element($(this)); // validate element
        });

        // select1
        $('#country_list').select2({
            placeholder: "Select a Country",
        });
        $('#country_list').on('select2:change', function(){
            validator.element($(this)); // validate element
        });

        // select2
        $('#state_select2').select2({
            placeholder: "Select a State",
        });
        $('#state_select2').on('select2:change', function(){
            validator.element($(this)); // validate element
        });

        // User select2
        $('#user_list').select2({
            placeholder: "Select a User",
        });
        $('#user_list').on('select2:change', function(){
            validator.element($(this)); // validate element
        });

        $('#m_typeahead').bind('typeahead:select', function(ev, suggestion) {
            validator.element($('#m_typeahead')); // validate element
        });

        // summernote
        $('#m_summernote').summernote({
            height: 150, 
        });
    }
    
    var initValidation = function () {
        validator = $( "#m_form_1" ).validate({
            // define validation rules
            rules: {
                date: {
                    required: true,
                    date: true 
                },
                daterange: {
                    required: true
                },
                datetime: {
                    required: true
                },
                time: {
                    required: true
                },

                select: {
                    required: true,
                    minlength: 2,
                    maxlength: 4
                },
                country_list: {
                    required: true
                },
                typeahead: {
                    required: true
                },

                switch: {
                    required: true
                },

                summernote: {
                    required: true
                },
                markdown: {
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
                //form[0].submit(); // submit the form
            }
        });       
    }

    return {
        // public functions
        init: function() {
            initWidgets(); 
            initValidation();
        }
    };
}();

jQuery(document).ready(function() {    
    FormWidgets.init();
});