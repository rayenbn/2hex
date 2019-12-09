$(document).ready(function(){

	var url = document.location.href;
	if(url.indexOf('#') != -1){
		sub = url.slice(url.indexOf('#'));
		if(sub == "#invoice_address"){
			$('#m_user_profile_tab_2').addClass('active');
			$('#m_user_profile_tab_1').removeClass('active');
			$('.m-tabs__link').eq(0).removeClass('active')
			$('.m-tabs__link').eq(1).addClass('active')
		}
		if(sub == "#my_detail"){
			$('#m_user_profile_tab_3').addClass('active');
			$('#m_user_profile_tab_1').removeClass('active');
			$('.m-tabs__link').eq(0).removeClass('active')
			$('.m-tabs__link').eq(2).addClass('active')
		}
		if(sub == "#submitted_orders"){
			$('#m_user_profile_tab_4').addClass('active');
			$('#m_user_profile_tab_1').removeClass('active');
			$('.m-tabs__link').eq(0).removeClass('active')
			$('.m-tabs__link').eq(3).addClass('active')
		}
	}

	$('.file-dropdown').click(function(){
	    var filename = $(this).html();
	    let parent = $(this).parent().parent().prev().prev();
	    $(this).parent().prev().html(filename);
	    $('input[type="file"]', parent).attr('fileName',filename);
	    // $('button', parent).removeClass('unchecked');
	    $('label', parent).html(filename);
	    // $('label', parent.addClass('unchecked')
	});

	$("#vendor-code-form").submit(function(e) {
    	e.preventDefault(); // avoid to execute the actual submit of the form.
	    var form = $(this);
	    var url = form.attr('action');

	    $.ajax({
           	type: "POST",
	        url: url,
	        data: form.serialize(), // serializes the form's elements.
	        success: function(data){
            	alert("Promocode successfully entered");
            	document.location.reload(true);
	    	},
	    	error: function (jqXHR, exception) {
	    		alert('The given data was invalid.');
	    		form.trigger('reset');
	    	}
    	});
	});

    $("#quantity").TouchSpin({
        min: 50,
        max: 1000000000,
        step: 10,
        buttondown_class: 'btn btn-secondary',
        buttonup_class: 'btn btn-secondary',
        verticalbuttons: true,
        verticalupclass: 'la la-angle-up',
        verticaldownclass: 'la la-angle-down'
    });

    $("#quantity_grip").TouchSpin({
        min: 0,
        max: 1000000000,
        step: 200,
        buttondown_class: 'btn btn-secondary',
        buttonup_class: 'btn btn-secondary',
        verticalbuttons: true,
        verticalupclass: 'la la-angle-up',
        verticaldownclass: 'la la-angle-down'
    });

    $("#quantity_heater").TouchSpin({
        min: 50,
        max: 1000000000,
        step: 10,
        buttondown_class: 'btn btn-secondary',
        buttonup_class: 'btn btn-secondary',
        verticalbuttons: true,
        verticalupclass: 'la la-angle-up',
        verticaldownclass: 'la la-angle-down'
    });

    $('#size').select2({
        placeholder: "Select a size"
    });
});
