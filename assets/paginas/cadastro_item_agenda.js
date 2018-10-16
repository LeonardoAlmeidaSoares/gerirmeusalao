$(function () {

    $('#txtHorario').Zebra_DatePicker({
        format: 'd/m/Y H:i',
        direction: [true, 7]
    });

    $("#calendarioCadastro").fullCalendar({
        locale: "pt-BR",
        defaultView: "listDay",
        events: {
            url: '../agenda/getListaCompromissos',
            type: 'POST',
            data: {
                codColaborador: 0
            }
        }
    });

    $("#txtCodColaborador").on("change", function () {

        codColaborador = $("#txtCodColaborador :selected").val();

        $("#calendarioCadastro").fullCalendar('destroy');
        $("#calendarioCadastro").fullCalendar({
            locale: "pt-BR",
            defaultView: "listDay",
            events: {
                url: '../agenda/getListaCompromissos',
                type: 'POST',
                data: {
                    codColaborador: codColaborador
                }
            }
        });
    });

    $("#frmCad").validate({
        rules: {
            txtCliente: "required",
            txtHorario: {
                required: true,
                minlength: 16,
                maxlength: 16
            },
            txtServico: "required",
            txtCodColaborador: "required"
        },
        messages: {
            txtCliente: "Campo Necessário",
            txtHorario: {
                required: "Campo Necessário",
                minlength: "Valor incorreto",
                maxlength: "Valor Incorreto"
            },
            txtServico: "Campo Necessário",
            txtCodColaborador: "Campo Necessário"
        }
    });

});