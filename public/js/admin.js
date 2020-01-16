$(document).ready(function(){
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
});