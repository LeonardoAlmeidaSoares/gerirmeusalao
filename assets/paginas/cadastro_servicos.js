$(function(){
    
    $("#txtValor").mask('000.000.000.000.000,00', {reverse: true});
    $("#txtValorP").mask('000.000.000.000.000,00', {reverse: true});
    
    $("#frmCad").validate({
        rules: {
            txtDescricao: {
                required: true,
                minlength: 6
            },
            txtValor: "required"
        },
        messages: {
            txtDescricao: {
                required: "Campo não pode ser vazio",
                minlength: "Valor muito curto"
            },
            txtValor: "Campo não pode ser vazio"
        }
    });

});