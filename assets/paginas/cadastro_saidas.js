$(function(){
    
    $('#txtValor').mask('000.000.000.000.000,00', {reverse: true});
    $("#txtVencimento").mask('00/00/0000');
    
    CKEDITOR.replace("txtDiscriminacao");
    
    $("#frmCad").on("submit", function(evt){
    	if(evt.originalEvent){
	    	evt.preventDefault();
	    	console.log(evt);

	    	if($("#txtStatus :selected").val() == 1){
	    		swal({
	                title: "Pagamento pelo Caixa?",
	                text: "Devemos Retirar o dinheiro do pagamento do produto do seu caixa?",
	                type: "question",
	                showCancelButton: true,
	                cancelButtonColor: "#DD6B55",
	                confirmButtonText: "Sim",
	                cancelButtonText: "Não",
	                closeOnConfirm: false,
	                closeOnCancel: false
	            }).then(function(isConfirm) {
	            	$("#txtDescontaCaixa").val("1");
	            	$("#frmCad").submit();
	            });
	    	} else {
		    	$("#frmCad").submit();
		    }

	    	//$("#frmCad").submit();
	    }
    });

});