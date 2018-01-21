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

			swal({
				title : "Confirmar Forma de Pagamento",
				text : "Qual a Forma de Pagamento Utilizada?", 
				type : "question",
				showCancelButton: true,
				cancelButtonText: "Cartão",
				confirmButtonText: "Dinheiro",
				confirmButtonClass: 'btn btn-success',
	  			cancelButtonClass: 'btn btn-danger',
	  			closeOnConfirm: true
			}).then(function(isConfirm) {
				$.ajax({
	                url: "../alterarStatus/",
	                method: "POST",
	                data: {
	                    "codNota" : $codNota,
	                    "status": 1,
	                    "formaPagto": "DINHEIRO"
	                }
	            }).success(function (response) {
	            	var vet = JSON.parse(response);
	            	swal(vet.title,vet.msg,vet.type);
	            });
		        	
			}).catch(function(){
				
				$.ajax({
	                url: "../alterarStatus/",
	                method: "POST",
	                data: {
	                    "codNota" : $codNota,
	                    "status": 1,
	                    "formaPagto": "CARTAO"
	                }
	            }).success(function (response) {
	            	var vet = JSON.parse(response);
	            	swal(vet.title,vet.msg,vet.type);
	            });
			});
		});
	});
	
});


/*
$.ajax({
    url: "../alterarStatus/",
    method: "POST",
    data: {
        "codNota" : $codNota,
        "status": 1,
        "formaPagto": "CARTAO"
    }
}).success(function (response) {
	swal('Finalizado!','Seu Pagamento foi recebido pelo sistema','success');
});*/