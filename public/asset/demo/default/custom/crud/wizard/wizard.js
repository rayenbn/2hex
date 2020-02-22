var WizardDemo = function() {
    $("#m_wizard");
    var e, r, i = $("#m_form");
    return {
        init: function() {
            var n;
            $("#m_wizard"), i = $("#m_form"), (r = new mWizard("m_wizard", {
                startStep: 1,
                manualStepForward: true,
            })).on("beforeNext", function(r) {
                !0 !== e.form() && r.stop()
            }), r.on("change", function(e) {
                mUtil.scrollTop()
            }), r.on("change", function(e) {
                1 === e.getStep()
            }), e = i.validate({
                ignore: ":hidden",
                rules: {
                    name: {
                        required: !0
                    },
                    email: {
                        required: !0,
                        email: !0
                    },
                    phone: {
                        required: !0,
                    },
                    address1: {
                        required: !0
                    },
                    city: {
                        required: !0
                    },
                    state: {
                        required: !0
                    },
                    city: {
                        required: !0
                    },
                    country: {
                        required: !0
                    },
                    account_url: {
                        required: !0,
                        url: !0
                    },
                    account_username: {
                        required: !0,
                        minlength: 4
                    },
                    account_password: {
                        required: !0,
                        minlength: 6
                    },
                    account_group: {
                        required: !0
                    },
                    "account_communication[]": {
                        required: !0
                    },
                    billing_card_name: {
                        required: !0
                    },
                    billing_card_number: {
                        required: !0,
                        creditcard: !0
                    },
                    billing_card_exp_month: {
                        required: !0
                    },
                    billing_card_exp_year: {
                        required: !0
                    },
                    billing_card_cvv: {
                        required: !0,
                        minlength: 2,
                        maxlength: 3
                    },
                    billing_address_1: {
                        required: !0
                    },
                    billing_address_2: {},
                    billing_city: {
                        required: !0
                    },
                    billing_state: {
                        required: !0
                    },
                    billing_zip: {
                        required: !0,
                        number: !0
                    },
                    billing_delivery: {
                        required: !0
                    },
                    accept: {
                        required: !0
                    }
                },
                messages: {
                    "account_communication[]": {
                        required: "You must select at least one communication option"
                    },
                    accept: {
                        required: "You must accept the Terms and Conditions agreement!"
                    }
                },
                invalidHandler: function(e, r) {
                    mUtil.scrollTop(), swal({
                        title: "",
                        text: "There are some errors in your submission. Please correct them.",
                        type: "error",
                        confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                    })
                },
                submitHandler: function(e) {
                }
            }),
            (n = i.find('[data-wizard-action="submit"]')).on("click", function(r) {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                r.preventDefault();
                $(this).prop('disabled', true);
                isok = 1;
                $('.alert').hide();
                
                $('input').each(function(){
                    if($(this).val() == ""){
                        if($(this).attr('id') == 'website'){
                            if($('#nowebsite').prop('checked'))
                                return;
                        }
                        if($(this).attr('id') == 'social'){
                            if($('#nosocial').prop('checked'))
                                return;
                        }
                        if($(this).attr('id') == 'product_link'){
                            if($('#noproduct').prop('checked'))
                                return;
                        }
                        $(this).css('border-color', 'red');
                        isok = 0;
                        $('.alert-danger span').html('Please Fill Blank Fields');
                    }
                    else{
                        $(this).css('border-color', '#ebedf2');
                    }
                });
                if(!$('#accept').prop('checked')){
                    if(isok == 1)
                        $('.alert-danger span').html('Please Accept Our Terms Policy');
                    isok = 0;
                }
                if(isok == 0){
                    $('.alert-danger').show();
                    $(this).prop('disabled', false);
                    return;
                }
                    
                if($('#inq_type').val() == 'company'){
                    var formData = new FormData();
                    formData.append('product',$('#product').val());
                    formData.append('quantity',$('#quantities').val());
                    formData.append('name',$('#name').val());
                    formData.append('phone',$('#phone').val());
                    formData.append('country',$('#country').val());
                    formData.append('companyname',$('#companyname').val());
                    if($('#nowebsite').prop('checked') == true)
                        formData.append('website','No Website');
                    else
                        formData.append('website',$('#website').val());
                    if($('#nosocial').prop('checked') == true)
                        formData.append('social','No Social');
                    else
                        formData.append('social',$('#social').val());
                    if($('#noproduct').prop('checked') == true)
                        formData.append('link','No Social');
                    else
                        formData.append('link',$('#product_link').val());
                    //formData.append('productlink',$('#productlink').val());
                    formData.append('email',$('#email').val());
                    
                    
                    $.ajax({
                        url: '/inquiries',
                        type: 'post',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data){
                            $('.alert-success').show();
                            $(this).prop('disabled', false);
                        }
                    });
                }
                else if($('#inq_type').val() == 'private'){
                    var formData = new FormData();
                    formData.append('product',$('#product').val());
                    formData.append('question',$('#question').val());
                    formData.append('name',$('#name').val());
                    formData.append('email',$('#email').val());
                    
                    $.ajax({
                        url: '/inquiriesprivate',
                        type: 'post',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data){
                            $('.alert-success').show();
                            $(this).prop('disabled', false);
                        }
                    });
                }
                
                // debugger;
                

                
            }) 
            // $('#save_order').click(function(event){
            //     $.ajaxSetup({
            //       headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //       }
            //     });

            //     var formData = new FormData();
            //     formData.append('id',$('#saved_order_id').val());
            //     formData.append('quantity',app.quantity);
            //     formData.append('size',$('#size').val());
            //     formData.append('concave',app.steps[1].state?'Deep Concave':'Mediumn Concave');
            //     formData.append('wood',app.steps[2].state?'European Maple Wood':'American Maple Wood');
            //     formData.append('glue',app.steps[3].state?'American Glue':'Epoxy Glue');
            //     formData.append('bottomprint',app.steps[4].state?$('#bottomPrintFile').attr('fileName'):'');
            //     formData.append('topprint',app.steps[5].state?$('#topPrintFile').attr('fileName'):'');
            //     formData.append('engravery',app.steps[6].state?$('#engraveryFile').attr('fileName'):'');
            //     formData.append('veneer',JSON.stringify(app.currentColors));
            //     formData.append('extra',JSON.stringify(app.steps[8]));
            //     formData.append('cardboard',app.steps[9].state?$('#cardboardFile').attr('fileName'):'');
            //     formData.append('carton',app.steps[10].state?$('#cartonFile').attr('fileName'):'');
            //     formData.append('perdeck',app.perdeck);
            //     formData.append('total',(app.quantity*app.perdeck + app.fixedprice).toFixed(2));
            //     formData.append('fixedprice',app.fixedprice);
                
            //     $.ajax({
            //         url: '/skateboard-deck-configurator',
            //         type: 'post',
            //         data: formData,
            //         processData: false,
            //         contentType: false,
            //         success: function(data){
            //             event.currentTarget.innerHTML = '<span><i class="la la-check"></i> <span> Use standards</span></span>';
            //             setTimeout(function() {
            //                 window.location.href = "/summary";
            //             }, 1000);
                        
            //         }
            //     });                
            // })
        },
        gotoStep: function(step){
            r.goTo(step)
        }
    }
}();
jQuery(document).ready(function() {
    WizardDemo.init();
    $('#nowebsite').change(function(){
        if($(this).prop('checked')){
            $('#website').prop('disabled', true);
            $('#website').prop('required', false);
            $('#website').prop('placeholder', '');
            $('#website').val('');
        }
        else{
            $('#website').prop('disabled', false);
            $('#website').prop('required', true);
            $('#website').prop('placeholder', 'www.yourskateboardco.com');
        }
    });
    $('#nosocial').change(function(){
        if($(this).prop('checked')){
            $('#social').prop('disabled', true);
            $('#social').prop('required', false);
            $('#social').prop('placeholder', '');
            $('#social').val('');
        }
        else{
            $('#social').prop('disabled', false);
            $('#social').prop('required', true);
            $('#social').prop('placeholder', '@YourInstagram');
        }
    });
    $('#noproduct').change(function(){
        if($(this).prop('checked')){
            $('#product_link').prop('disabled', true);
            $('#product_link').prop('required', false);
            $('#product_link').prop('placeholder', '');
            $('#product_link').val('');
        }
        else{
            $('#product_link').prop('disabled', false);
            $('#product_link').prop('placeholder', 'https://www.zumiez.com/skate/skateboard-decks.html?d=4294967250');
            $('#product_link').prop('required', true);
        }
    });
});
