$(function(){
    /* Mascaras */
    $("#txtNascimento").mask('00/00/0000');
    $("#txtCep").mask('00000-000');
    $("#txtTelefone").mask('(00) 0 0000-0000');
    $("#txtCpf").mask('000.000.000-00');

    $("#txtCpf").on("blur", function(){
        if($("#txtCpf").val().length > 0){
            if(!(ValidaCPF($(this).val()))){
                $("#txtCpf").val("");
                swal("CPF Inválido","Favor inserir um CPF válido","error");
            }
        }
    });    

    /* Validação */
    $("#frmCad").validate({
        rules:{
            txtNome: "required",
            txtTelefone: {
                required: true,
                minlength: 16
            },
            txtLogradouro: "required"
        }, 
        messages: {
            txtNome: "Campo Necessário",
            txtTelefone: {
                required: "Campo Necessário",
                minlength: "Valor incorreto"
            },
            txtLogradouro : "Campo Necessário",
        }
    });

});