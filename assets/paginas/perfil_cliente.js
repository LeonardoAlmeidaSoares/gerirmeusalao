$(function(){
    
    $.fn.editable.defaults.mode = 'inline';
    
    $('.editable').editable({
        error: function(response, newValue) {
            console.log(response);
        }
    });
    
});