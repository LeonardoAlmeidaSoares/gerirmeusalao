$(function () {

    $(".hid").hide();

    $('#myTable tbody').on('click', '.btnStart', function () {

        $this = $(this);

        var codFuncionario = $this.attr("codFuncionario");
        var codCompromisso = $this.attr("codCompromisso");

        $.ajax({
            url: "index.php/agenda/alterarStatus/",
            method: "POST",
            data: {
                "codEvento": codCompromisso,
                "status": 1
            }
        }).success(function (response) {

            $this.next().show();
            $this.hide();
            $this.next().hide();
            $this.next().next().show();
            $("#divFunc" + codFuncionario).children().css("border-color", "rgba(255,0,0,0.4)");
            $("#divFunc" + codFuncionario).children().children().children().next().find(".address").html("OCUPADO(A)");

        });

    });

    $('#myTable tbody').on('click', '.btnCancel', function () {

        $this = $(this);

        var codFuncionario = $this.attr("codFuncionario");
        var codCompromisso = $this.attr("codCompromisso");

        $.ajax({
            url: "index.php/agenda/alterarStatus/",
            method: "POST",
            data: {
                "codEvento": codCompromisso,
                "status": -1
            }
        }).success(function (response) {
            $('#myTable').DataTable()
                    .row($this.parents('tr'))
                    .remove()
                    .draw();
        });

    });

    $('#myTable tbody').on('click', '.btnFinish', function () {

        $this = $(this);

        var codFuncionario = $this.attr("codFuncionario");
        var codCompromisso = $this.attr("codCompromisso");

        $.ajax({
            url: "index.php/agenda/alterarStatus/",
            method: "POST",
            data: {
                "codEvento": codCompromisso,
                "status": 2
            }
        }).success(function (response) {
            $('#myTable').DataTable()
                    .row($this.parents('tr'))
                    .remove()
                    .draw();
            $("#divFunc" + codFuncionario).children().css("border-color", "rgba(0,255,0,0.4)");
            $("#divFunc" + codFuncionario).children().children().children().next().find(".address").html("LIVRE");
        });

    });

    $("#click-link-todos-clientes")
        .css("cursor", "pointer")
        .on("click", function(){
            location.href="icliente/";
    });

    $("#click-link-agenda-hoje")
        .css("cursor", "pointer")
        .on("click", function(){
            location.href="agenda/hoje";
    });

    $("#click-link-aniversariantes")
        .css("cursor", "pointer")
        .on("click", function(){
            location.href="cliente/aniversariantes";
    });

    $("#click-link-lembretes-hoje")
        .css("cursor", "pointer")
        .on("click", function(){
            location.href="lembrete/hoje";
    });

    $("#click-link-vencendo-hoje")
        .css("cursor", "pointer")
        .on("click", function(){
            location.href="contas_pagar/hoje";
    });

    $("#click-link-recebendo-hoje")
        .css("cursor", "pointer")
        .on("click", function(){
            location.href="contas_receber/hoje";
    });

    // Create the chart
    Highcharts.chart('graf1', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Número de Consultas nos últimos 12 meses.'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total de Atendimentos'
            }

        },
        credits: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{y} agendamentos'
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y} Agendamentos</b> <br/>'
        },
        series: [{
                name: 'Agendamentos',
                colorByPoint: true,
                data: dataGraf1
            }]
    });

    Highcharts.chart('graf2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Serviços Prestados nesse meês'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        credits: {
            enabled: false
        },
        series: [{
                name: 'Quantidade de Serviços',
                colorByPoint: true,
                data: dataGraf2
            }]
    });


})