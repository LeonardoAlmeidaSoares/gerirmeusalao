var substringMatcher = function (strs) {
    return function findMatches(q, cb) {
        var matches, substringRegex;
        // an array that will be populated with substring matches
        matches = [];
        // regex used to determine if a string contains the substring `q`
        substrRegex = new RegExp(q, 'i');
        // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array
        $.each(strs, function (i, str) {
            if (substrRegex.test(str)) {
                matches.push(str);
            }
        });
        cb(matches);
    };
};
$(function () {

    $("#modalCadastro").hide();

    $("#btnDeleteEvent").hide();
    var vetorServicos = [];
    var codFuncionarioSelecionado = 0;

    $("#calendar").fullCalendar({
        locale: "pt-BR",
        defaultView: "listWeek",
        events: events,
        ignoreTimezone: false,

        allDaySlot: false,
        dayClick: function (date, jsEvent, view) {
            if (codFuncionarioSelecionado > 0) {
                $.ajax({
                    url: "getListaPossibilidades/",
                    method: "POST",
                    data: {
                        "horarioClicado": date.format(),
                        "funcionarioSelecionado": codFuncionarioSelecionado
                    }
                }).success(function (response) {
                    var vet = JSON.parse(response);
                    $("#lblNomeFuncionario").val(vet.Funcionario.nome);
                    $("#txtServico").empty();
                    $("#txtHorario").empty();
                    $.each(vet.Horarios, function ($index, $value) {
                        $("#txtHorario").append(
                                $("<option>")
                                .html($value)
                                .val($index)
                                );
                    });
                    $.each(vet.Servicos, function ($index, $value) {
                        $("#txtServico").append(
                                $("<option>")
                                .html($value.descricao)
                                .val($value.codServico)
                                .attr("duracao", $value.horariosEstimados * 15)
                                .attr("valor", $value.valorComum)
                                );
                    });
                    $.blockUI({
                        message: $('#modalCadastro'),
                        overlayCSS: {
                            backgroundColor: '#01c0c8'
                        }
                    });
                });
            } else {
                swal('Não Se Esqueça', 'Voce deve selecionar o colaborador antes', 'info');
            }
        },
        eventClick: function (calEvent, jsEvent, view) {
            var $data = {};
            swal({
                title: "O que aconteceu?",
                text: "O Compromisso foi finalizado ou cancelado?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Cancelar",
                cancelButtonText: "Finalizar"
            }).then(function ($return) {
                //Cancelado

                $.ajax({
                    url: "alterarStatus/",
                    method: "POST",
                    data: {
                        "status": -1,
                        "codEvento": calEvent.id
                    }
                }).success(function (response) {
                    $('#calendar').fullCalendar('removeEvents', calEvent.id);
                    swal("Cancelado!", "Esse compromisso foi cancelado com sucesso", "error");
                });

            }, function (dismiss) {
                //Finalizado
                $.ajax({
                    url: "alterarStatus/",
                    method: "POST",
                    data: {
                        "status": 2,
                        "codEvento": calEvent.id
                    }
                }).success(function (response) {
                    $('#calendar').fullCalendar('removeEvents', calEvent.id);
                    swal({
                        title: "Finalização computada com sucesso",
                        text: "Criar Uma nota de entrada?",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Sim",
                        cancelButtonText: "Não"
                    }).then(function ($return) {
                        document.location = "../contas_receber/novo/" + calEvent.id;
                    });
                });
            });
        },
        eventRender: function eventRender(event, element, view) {
            if (codFuncionarioSelecionado > 0) {
                return ['all', event.codFuncionario].indexOf(codFuncionarioSelecionado) >= 0;
            }
        }
    });

    $("#listaItens").dataTable();

    $("#divServicosPrestados").hide();
    /*
     $("#btnFinalServico").on("click", function(evt){
     evt.preventDefault();
     $.ajax({
     url: "cadastrarNovo/",
     method: "POST",
     data: {
     "txtCodFunc": codFuncionarioSelecionado,
     "txtHorario": $("#txtHorario").val(),
     "nomeCliente": $("#txtCliente").val(),
     "listaServicos": JSON.stringify(vetorServicos)
     }
     }).success(function (response) {
     console.log(response);
     });
     });
     */

    $("#btnClose").on("click", function () {
        $.unblockUI();
    });

    $(".lnk-sel-func").on("click", function (evt) {
        evt.preventDefault();
        $(".white-box").css("border", "none");
        codFuncionarioSelecionado = parseInt($(this).attr("codFunc"));
        $("#txtCodFunc").val(codFuncionarioSelecionado);
        $("#calendar").fullCalendar('rerenderEvents');
        $(this).children().children().css("border", "2px solid #01C0C8");
        $('html,body').animate({scrollTop: $("#calendar").offset().top}, 'slow');

    });

    $('.typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        name: 'clientes',
        source: substringMatcher(clients)
    }).on('change', function (obj, datum, name) {
        $.ajax({
            url: "../cliente/getByNome/",
            method: "POST",
            data: {
                nome: $(this).val()
            }
        }).success(function (response) {
            var vet = JSON.parse(response);
            $("#imgCliente").attr("src", vet[0].imagem);
        });
    });

    $(".twitter-typeahead").css("width", '100%');

});