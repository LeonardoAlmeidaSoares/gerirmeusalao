$(function(){
   
    $("#frmCad").validate({
        rules:{
            txtFuncionario: "required",
            txtSenha: {
                required: true,
                minlength: 8
            },
            txtSenhaC: {
                required: true,
                equalTo: "#txtSenha"
            }
        },
        messages: {
            txtFuncionario: "Selecione um funcionário",
            txtSenha: {
                required: "Campo não pode ser vazio",
                minlength: "Senha muito curta"
            },
            txtSenhaC: {
                required: "Campo deve ser preenchido",
                equalTo: "Senhas não conferem"
            }
        }
    });
    
});