$(function () {
    $(".pagar").on("click", function () {
        $this = $(this);
        var cod = parseInt($this.attr("cod"));
        swal({
            title: "Finalizar a Nota Pendente",
            text: "Tem certeza que deseja fazer isso?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sim",
            cancelButtonText: "Não"
        }).then(function (result) {
            swal({
                title: "Utilizar Dinheiro do Caixa?",
                text: "Pretende usar dinheiro do caixa ou de outra origem?",
                type: "question",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "CAIXA",
                cancelButtonText: "OUTRO"
            }).then(function (json_data) {
                $.ajax({
                    url: "pagar/",
                    method: "GET",
                    data: {
                        "codigo": cod,
                        "formaPagto": "DINHEIRO",
                        "origem": "caixa"
                    }
                }).success(function (response) {
                    console.log(response);
                    $this.hide('slow');
                    $this.parent().prev().html("Pago");
                    swal("Feito", "Nota Finalizada com sucesso", "success");
                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    $.ajax({
                    url: "pagar/",
                    method: "GET",
                    data: {
                        "codigo": cod,
                        "formaPagto": "DINHEIRO",
                        "origem": "outro"
                    }
                }).success(function (response) {
                    console.log(response);
                    $this.hide('slow');
                    $this.parent().prev().html("Pago");
                    swal("Feito", "Nota Finalizada com sucesso", "success");
                });
                } else {
                    throw dismiss;
                }
            });
                  
        });
    });
});