$(function(){
	
	$(".visualizar").on("click", function(){
		$this = $(this);
		//alert($this.attr("cod"));
		$.ajax({
            url: "lembrete/getLembrete/",
            method: "POST",
            data: {
                codLembrete: $this.attr("cod")
            }
        }).success(function (response) {
        	var vet = JSON.parse(response);
            swal(vet[0].titulo,vet[0].mensagem,"info");
        });
		
	});
	
});