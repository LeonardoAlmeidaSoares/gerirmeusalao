$(function () {
    var dominio = document.URL;
    
    $(".pagar").on("click", function (event) {
        event.preventDefault();
        var cod = parseInt($(this).attr("cod"));
        
        swal({
            title: "Serviço Ainda Não Finalizado",
            text: "Deseja imprimir um comprovante de pagamento antes do término do serviço?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "SIM",
            cancelButtonText: "NÃO"
        }).then(function(result) {
            if (result) {
                window.location.href = dominio + "criarNotaServicoNaoFinalizado/" + cod;
            }   
        });
    });
});