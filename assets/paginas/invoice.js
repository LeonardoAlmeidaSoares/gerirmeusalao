$(function(){

	$("#btnConfirma").on("click", function(){
		var $codNota = $("#codNota").val();
		swal({
			title : "Confirmar Pagamento",
			text : "Deseja realmente confirmar o pagamento dessa nota?", 
			type : "question",
			showCancelButton: true,
			cancelButtonText: "Não",
			confirmButtonText: "Sim",
			confirmButtonClass: 'btn btn-success',
  			cancelButtonClass: 'btn btn-danger',
  			closeOnConfirm: true
		}).then(function(result) {
			$.ajax({
                url: "../alterarStatus/",
                method: "POST",
                data: {
                    "codNota" : $codNota,
                    "status": 1
                }
            }).success(function (response) {
            	swal('Finalizado!','Seu Pagamento foi recebido pelo sistema','success');
            });
		});
	});
	
});