$(function(){
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
            cancelButtonText: "Não",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "EfetuarPagamento/",
                    method: "POST",
                    data: {
                        "codigo": cod
                    }
                }).success(function (response) {
                    $this.hide('slow');
                    $this.parent().prev().html("Pago");
                    swal("Feito", "Nota Finalizada com sucesso", "success");
                });
            }
        });
    });
})