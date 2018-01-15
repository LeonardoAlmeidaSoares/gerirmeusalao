$(function(){
    $(".table").DataTable();

    $(".tab-page").on("click", function(){
        var href = $(this).attr("href");
        $(".content-current").removeClass("content-current");
        $(href).addClass("content-current");
        $(".tab-current").removeClass("tab-current");
        $(this).parent().addClass("tab-current");
    });

var ctx2 = document.getElementById("chart2").getContext("2d");
    var data2 = {
        labels: labels,
        datasets: [
            {
                label: "Pagamentos Recebidos",
                fillColor: "rgba(252,201,186,0.8)",
                strokeColor: "rgba(252,201,186,0.8)",
                highlightFill: "rgba(252,201,186,1)",
                highlightStroke: "rgba(252,201,186,1)",
                data: itensPagos
            },
            {
                label: "Pagamentos Não Recebidos",
                fillColor: "rgba(180,193,215,0.8)",
                strokeColor: "rgba(180,193,215,0.8)",
                highlightFill: "rgba(180,193,215,1)",
                highlightStroke: "rgba(180,193,215,1)",
                data: itensNPagos
            }
        ]
    };
    
    var chart2 = new Chart(ctx2).Bar(data2, {
        scaleBeginAtZero : true,
        scaleShowGridLines : true,
        scaleGridLineColor : "rgba(0,0,0,.005)",
        scaleGridLineWidth : 0,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        barShowStroke : true,
        barStrokeWidth : 0,
        display: false,
		tooltipCornerRadius: 2,
        barDatasetSpacing : 3,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label;%><%}%></li><%}%></ul>",
        responsive: true
    });

});