$(function(){

	$("#table").dataTable();

	$("#btn-open-caixa").on("click", function(){
		$.ajax({
            url: "../fluxoCaixa/getUltimoCaixa/",
            method: "POST"
        }).success(function (response) {
        	
        	var vet = JSON.parse(response);
			console.log(vet);

			if(vet.HorarioFinal.length == 0){
				
			}

			swal("Dinheiro Em Caixa","O Caixao do Dia Iniciará com Qual Valor?","question");
		});
	});
});