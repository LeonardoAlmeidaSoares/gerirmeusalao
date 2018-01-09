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

    $("#txtCodFunc").val(codFuncionarioSelecionado);

    $("#btnDeleteEvent").hide();

    $("#calendar").fullCalendar({
        locale: "pt-BR",
        defaultView: "agendaWeek",
        events: events,
        allDaySlot: false,
        dayClick: function (date, jsEvent, view) {
            console.log(codFuncionarioSelecionado);
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
                                );
                    });
                    $("#my-event").modal();
                });
            } else {
                alert("Selecione antes o funcionário");
            }
        },
        eventClick: function (calEvent, jsEvent, view) {
            swal({
                title: "O que aconteceu?",
                text: "O Compromisso foi finalizado ou cancelado?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Cancela-lo",
                cancelButtonText: "Finaliza-lo",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    //Cancelado
                    $data = {"status": -1, "codEvento": calEvent.id};
                    swal("Cancelado!", "Esse compromisso foi cancelado com sucesso", "error");
                } else {
                    //finalizado
                    $data = {"status": 2, "codEvento": calEvent.id};
                    //swal("Finalizado", "Finalização computada com sucesso", "success");
                }

                $.ajax({
                    url: "/agenda/alterarStatus/",
                    method: "POST",
                    data: $data
                }).success(function (response) {
                    if (isConfirm) {
                        $('#calendar').fullCalendar('removeEvents', calEvent.id);
                    } else {
                        swal({
                            title: "Finalização computada com sucesso",
                            text: "Criar Uma nota de entrada?",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Sim",
                            cancelButtonText: "Não",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        }, function (isConfirm) {
                            if (isConfirm) {
                                window.location.href = "/contasReceber/cadastrar/" + calEvent.id;
                            }
                        });
                    }
                });
            });
        },
        eventRender: function eventRender(event, element, view) {
            if (codFuncionarioSelecionado > 0) {
                return ['all', event.codFuncionario].indexOf(codFuncionarioSelecionado) >= 0;
            }
        }
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

    $(".my-check").bootstrapSwitch({
        "onText" : "VALOR COMUM",
        "offText": "DESCONTO"
    });

    $(".twitter-typeahead").css("width", '100%');
    $(".bootstrap-switch-id-txtValor").css("width","100% !important;");

});