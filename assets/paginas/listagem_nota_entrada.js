function format(d) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>oi</tr>' +
            '</table>';
}


$(function () {
    var dominio = document.URL;

    var table = $("#tabela").DataTable();

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
        }).then(function (result) {
            if (result) {
                //console.log(dominio);
                document.location = dominio + "/servico_pendente/" + cod;
                //window.location.href = dominio + "/criarNotaServicoNaoFinalizado/" + cod;
            }
        });
    });

    // Add event listener for opening and closing details
    $('#tabela tbody').on('click', '.details-control', function () {
        
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            $.ajax({
                url: "contas_receber/detalhes_conta/",
                method: "POST",
                data: {
                    "id": row.data()[0]
                }
            }).success(function (response) {
                
                row.child(response).show();
                tr.addClass('shown');

            });
        }
    });

});