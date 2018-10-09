$(function () {

    $("#print").on("click", function () {
        window.print();
    });

    $("#btnConfirma").on("click", function () {
        var $codNota = $("#codNota").val();
        swal({
            title: "Confirmar Pagamento",
            text: "Deseja realmente confirmar o pagamento dessa nota?",
            type: "question",
            showCancelButton: true,
            cancelButtonText: "Não",
            confirmButtonText: "Sim",
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            closeOnConfirm: true
        }).then(function (result) {

            swal({
                title: "Confirmar Forma de Pagamento",
                text: "Qual a Forma de Pagamento Utilizada?",
                type: "question",
                showCancelButton: true,
                cancelButtonText: "Cartão",
                confirmButtonText: "Dinheiro",
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                closeOnConfirm: true
            }).then(function (isConfirm) {
                $.ajax({
                    url: "status/",
                    method: "POST",
                    data: {
                        "codNota": $codNota,
                        "status": 1,
                        "formaPagto": "DINHEIRO"
                    }
                }).success(function (response) {
                    var vet = JSON.parse(response);
                    $("#btnConfirma").hide("slow");
                    swal(vet.title, vet.msg, vet.type);
                    $("#btnConfirma").hide("slow");
                });

            }).catch(function () {

                $.ajax({
                    url: "status/",
                    method: "POST",
                    data: {
                        "codNota": $codNota,
                        "status": 1,
                        "formaPagto": "CARTAO"
                    }
                }).success(function (response) {
                    var vet = JSON.parse(response);
                    $("#btnConfirma").hide("slow");
                    swal(vet.title, vet.msg, vet.type);
                });
            });
        });
    });

});