$(document).ready(function(){

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
});