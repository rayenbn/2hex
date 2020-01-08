$(document).ready(function(){
    $('#filter_email').change(function(){
        $('#filter_form').submit();
    })
    $('.select2').select2();
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
});