$(function(){
	swal({position: 'top-end',title:'Por favor,\n forneça uma nova senha'});

	$("#loginform").validate({
        rules:{
            txtSenha1: {
                required: true,
                minlength: 6
            },
            txtSenha2: {
            	required:true,
            	equalTo: "#txtSenha1"
            }
        }, 
        messages: {
            txtSenha1: {
                required: "Campo Necessário",
                minlength: "Senha muito curta?"
            },
            txtSenha2: {
                required: "Campo Necessário",
                equalTo: "Senhas não conferem"
            }
        }
    })
});