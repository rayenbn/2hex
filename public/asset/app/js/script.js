$(document).ready(function(){

  var value = 0;
  var perdeck = 0;
  var quantity = 0;

  $.ajax({
    url: '/getdata',
    type: 'GET',
    data: {},
    success: function(data){

      app.total_quantity = data.quantity * 1;
      $('#totalconprice').html('TOTAL: $ '+ (+data.total).toFixed(2));
    }
  })

  $('.file-dropdown').click(function(){
    filename = $(this).html();
    $(this).parent().prev().html(filename);
    $('input[type="file"]', $(this).parent().parent().prev()).attr('fileName',filename);
    $('input[type="file"]', $(this).parent().parent().prev()).removeClass('unchecked');
    $('label', $(this).parent().parent().prev()).html(filename);
    $('label', $(this).parent().parent().prev()).addClass('unchecked')

  });

  $('input[type="file"]').click(function(e){
    if($('body').attr('signed') == 0){
       e.stopPropagation();
       e.preventDefault();
        swal({
            title: "",
            text: "You need to login to upload file",
            type: "alert",
            confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
        }).then((value) => {
            window.location.href = "../login";
        });
    }
  });
  $('input[type="file"]').change(function(event){
      var formData = new FormData();
      formData.append('typeUpload', event.currentTarget.dataset.typeUpload);
      
      if($(this).attr('filename') == "" && $(this).attr('id') != "engraveryFile" && $(this).attr('id') != "cardboardFile")
        app.fixedprice += 120;
      else if($(this).attr('filename') == "" && $(this).attr('id') == "engraveryFile")
        app.fixedprice += 80;
      else if($(this).attr('filename') == "" && $(this).attr('id') == "cardboardFile")
        app.fixedprice += 500;
      formData.append('file', $(this)[0].files[0]);
      self = this;
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
             url : '/configurator-fileupload',
             type : 'POST',
             data : formData,
             processData: false,  // tell jQuery not to process the data
             contentType: false,  // tell jQuery not to set contentType
             success : function(data) {
                 if(data != 'failed')
                   $(self).attr('fileName',data);
                   $(self).next().removeClass('unchecked');
                   $('button', $(self).parent().parent().next()).addClass('unchecked');
                   $('button', $(self).parent().parent().next()).html(data);
             }
      });  

      
  });

  $('#save_address').click(function(){
    var formData = new FormData();

    formData.append('invoice_company',$('#invoice_company').val());
    formData.append('invoice_name',$('#invoice_name').val());
    formData.append('invoice_country',$('#invoice_country').val());
    formData.append('invoice_taxid',$('#invoice_taxid').val());
    formData.append('shipping_company',$('#shipping_company').val());
    formData.append('shipping_address',$('#shipping_address').val());
    formData.append('shipping_city',$('#shipping_city').val());
    formData.append('shipping_state',$('#shipping_state').val());
    formData.append('shipping_postcode',$('#shipping_postcode').val());
    formData.append('shipping_contactperson',$('#shipping_contactperson').val());
    formData.append('shipping_phone',$('#shipping_phone').val());
    formData.append('shipping_country',$('#shipping_country').val());

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
           url : '/address_save',
           type : 'POST',
           data : formData,
           processData: false,  // tell jQuery not to process the data
           contentType: false,  // tell jQuery not to set contentType
           success : function(data) {
              //window.location.href = "/profile"
               
           }
    });

  });

  $('#save_details').click(function(e){
    if($('body').attr('signed') == 0){
       e.preventDefault();
        swal({
            title: "",
            text: "You need to login to upload file",
            type: "alert",
            confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
        }).then((value) => {
            window.location.href = "../login";
        });
    }
  });


});
  
