$(function(){
    /* Mascaras */
    $("#txtNascimento").mask('00/00/0000');
    $("#txtCep").mask('00000-000');
    $("#txtTelefone").mask('(00) 0 0000-0000');
    $("#txtCpf").mask('000.000.000-00');

    /* Validação */
    $("#frmCad").validate({
        rules:{
            txtNome: "required",
            txtEmail:{
                required: true,
                email: true,
                minlength: 6
            },
            txtTelefone: {
                required: true,
                minlength: 16
            },
            txtLogradouro: "required"
        }, 
        messages: {
            txtNome: "Campo Necessário",
            txtEmail: {
                required: "Campo Necessário",
                email: "Insira um email válido",
                minlength: "Muito curto pra ser email, não acha?"
            },
            txtTelefone: {
                required: "Campo Necessário",
                minlength: "Valor incorreto"
            },
            txtLogradouro : "Campo Necessário",
        }
    })

});