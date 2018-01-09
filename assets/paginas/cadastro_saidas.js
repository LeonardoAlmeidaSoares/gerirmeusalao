$(function(){
    
    $('#txtValor').mask('000.000.000.000.000,00', {reverse: true});
    $("#txtVencimento").mask('00/00/0000');
    
    CKEDITOR.replace("txtDiscriminacao");
    
});