$(function () {
    
    var dominio = document.URL;
    
    $(".pagar").on("click", function () {
        
        var cod = parseInt($(this).attr("cod"));
        
        swal({
            title: "",
            text: "Deseja imprimir um comprovante de pagamento?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "SIM",
            closeOnConfirm: false,
            cancelButtonText: "NÃO"
        },
        function () {
            window.location.href = dominio + "nota/" + cod;
        });
    });
});