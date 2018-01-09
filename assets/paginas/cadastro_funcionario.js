$(function(){
    /* Mascaras */
    $("#txtNascimento").mask('00/00/0000');
    $("#txtCep").mask('00000-000');    
    $("#txtTelefone").mask('(00) 0 0000-0000');
    $('#txtSalario').mask('000.000.000.000.000,00', {reverse: true});

    /* Validação */
    $("#frmCad").validate({
        rules: {
            txtNome: {
                required: true,
                minlenght: 6
            },
            txtCargo: "required",
            txtNascimento: "required",
            txtSexo: "required",
            txtEmail: {
                required: true,
                email: true,
                minlength: 6
            },
            txtTelefone: {
                required: true,
                minlength: 16
            }
        }, 
        messages: {
            txtNome: {
                required: "Campo não pode ser vazio",
                minlenght: "Nome muito curto"
            },
            txtCargo: "Selecione uma opção de cargo",
            txtNascimento: "Campo não pode ser vazio",
            txtSexo: "Selecione o sexo do funcionário",
            txtEmail: {
                required: "Campo não pode ser vazio",
                email: "Campo precisa ser um email válido",
                minlength: "Campo muit curto"
            },
            txtTelefone: {
                required: "Campo não pode ser vazio",
                minlength: "Campo faltando caracteres"
            }
        }
    });
});