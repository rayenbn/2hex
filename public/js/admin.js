$(document).ready(function(){
    setPercent();
    $('#filter_email').change(function(){
        $('#filter_form').submit();
    })
    $('.filter_email').select2();
    $('#select_date').select2();
    
    $('.id-select').click(function(){
        orderid = $(this).data('orderid');
        $('#order_id').val(orderid);
        $('#filter_form').submit();
    });
    $('#startdate').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#startdate').change(function(){
        $('#filter_form').submit();
    });
    $('#enddate').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#enddate').change(function(){
        $('#filter_form').submit();
    });
    $('.form_input').change(function(){
        $('.production-submit').click();
    });
    $('.remove-comment').click(function(){
        id = $(this).val();
        $('.remove_comment').val(id);
        $('.production-submit').click();
    });
    $('#add_date').datepicker({
        format: 'yyyy-mm-dd'
    });
    // $('#select_date').change(function(){
    //     setPercent();
    // });
    $('.download_all').click(function(){
        var temporaryDownloadLink = document.createElement("a");
        temporaryDownloadLink.style.display = 'none';

        document.body.appendChild( temporaryDownloadLink );
        $('.fileCheckbox').each(function(){

            if($(this).prop('checked') == true){
                link = $(this).attr('link');
                image = $(this).attr('imagename');
                temporaryDownloadLink.setAttribute('href', link );
                temporaryDownloadLink.setAttribute('download', image );
                temporaryDownloadLink.click();
            }
        });
        document.body.removeChild( temporaryDownloadLink );
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function submitValues(type, value){
        var selected = [];
        $('.fileCheckbox:checked').each(function() {
            selected.push({"name":$(this).val(), "created_by": $(this).attr('created') });
        });
        
        
        $.ajax({
            url: '/admin/add-upload-data',
            type: 'POST',
            data: {
                selected: selected,
                type: type,
                value: value
            },
            success: function(){
                window.location.reload();
            }
        })
    }

    function deleteValues(type){
        var selected = [];
        $('.fileCheckbox:checked').each(function() {
            selected.push({"name":$(this).val(), "created_by": $(this).attr('created') });
        });
        
        $.ajax({
            url: '/admin/delete-upload-data',
            type: 'POST',
            data: {
                selected: selected,
                type: type,
            },
            success: function(){
                window.location.reload();
            }
        })
    }
    $('#add-color-code').click(function(){
        value = $(this).prev().val();
        submitValues('color_code', value);
    });
    $('#add-color-date').click(function(){
        value = $(this).prev().val();
        submitValues('date', value);
    });
    $('#add-color-qty').click(function(){
        value = $(this).prev().val();
        submitValues('color_qty', value);
    });

    $('#delete-file').click(function(){
        deleteValues('file');
    });
    $('#delete-date').click(function(){
        deleteValues('date');
    });
    $('#delete-code').click(function(){
        deleteValues('color_code');
    });
});

function setPercent(){
    startdate = new Date($('#startdate').val());
    today = new Date();
    enddate = new Date($('#enddate').val());
    percent = Math.floor((today - startdate) / (enddate - startdate) * 100);
    if(enddate < today)
        percent = 100;
    if(startdate > today)
        percent = 0;
    
    $('.proccess_percent').css('width', percent + '%');
}