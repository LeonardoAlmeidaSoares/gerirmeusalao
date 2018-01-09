$(function () {
    $("#frmCad").validate({
        rules: {
            txtNome: "required",
            txtEmail: {
                required: true,
                email: true,
                minlength: 6
            },
            txtSenha1: {
                required: true,
                minlength: 6
            },
            txtSenha2: {
                required: true,
                equalTo: "#txtSenha1"
            }
        },
        messages: {
            txtNome: "Campo Necessário",
            txtEmail: {
                required: "Campo Necessário",
                email: "Insira um email válido",
                minlength: "Muito curto pra ser email, não acha?"
            },
            txtSenha1: {
                required: "Campo Necessário",
                minlength: "Campo muito curto"
            },
            txtSenha2: {
                required: "Campo Necessário",
                equalTo: "Senhas Não conferem"
            }
        }
    });
});