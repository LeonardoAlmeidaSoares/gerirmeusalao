$(function(){

	$("#frmChangeInst").on("submit", function(evt){
		evt.preventDefault();
		$.ajax({
            url: "update/",
            method: "POST",
            data: {
                "nome": $("#txtNomeEmpresa").val(),
                "cnpj": $("#txtCnpj").val(),
                "email": $("#txtEmail").val(),
                "telefone": $("#txtTelefone").val()
            }
        }).success(function (response) {
        	swal("Parabéns","Alterações Realizadas com sucesso","success");
        });
	});

	$("#frmRedesSociais").on("submit", function(evt){
		evt.preventDefault();
		$.ajax({
            url: "update/",
            method: "POST",
            data: {
                "facebook": $("#txtFacebook").val(),
                "twitter": $("#txtTwitter").val(),
                "instagram": $("#txtInstagram").val(),
                "googleplus": $("#txtGooglePlus").val()
            }
        }).success(function (response) {
        	swal("Parabéns","Alterações Realizadas com sucesso","success");
        });
	});
})