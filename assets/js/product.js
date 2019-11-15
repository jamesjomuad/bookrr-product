/*
*   Barcode Listener
*/
$.fn.barcoder = function(){
    var $target = $(this);
    var barcode = '';

    if($target.length){ return $(this); }

    $(document).on('keypress',function(e){
        if((e.keyCode || e.which) == 13) // Enter key hit
        {
            $target.val(barcode);
            $target.focus();
            $('[data-request="onSave"][data-request-data="redirect:0"]').click();
            barcode = '';
        }else{
            barcode += e.originalEvent.key ? e.originalEvent.key : null;
        }
    });

    return $(this);
}


/*
*   List page
*/
$(function(){
    if($('[name*=listToolbarSearch]').length){
        var barcode = '';
        var $searchInput = $('[name*=listToolbarSearch]');

        $(document).on('keypress',function(e){
            if((e.keyCode || e.which) == 13){
                $('.flash-message.error').hide();
                $searchInput.val(barcode).submit();
                barcode = '';
            }else{
                barcode += e.originalEvent.key;
            }
        });
    }
});


$(document).on('ready',function(){
    $('#Form-field-Products-barcode').barcoder();
});