$(function(){
    $(".table").DataTable();

    $(".tab-page").on("click", function(){
        var href = $(this).attr("href");
        $(".content-current").removeClass("content-current");
        $(href).addClass("content-current");
        $(".tab-current").removeClass("tab-current");
        $(this).parent().addClass("tab-current");
    });

    var ctx = document.getElementById("chart").getContext("2d");
    var data = {
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
    
    var chart = new Chart(ctx).Bar(data, {
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
    /*
    var ctx_2 = document.getElementById("chart_2").getContext("2d");
    var data_2 = [
        
         {
            value: 50,
            color: "#b4c1d7",
            highlight: "#b4c1d7",
            label: "Dark"
        },
        {
            value: 50,
            color: "#b8edf0",
            highlight: "#b8edf0",
            label: "Megna"
        },
        {
            value: 100,
            color: "#fcc9ba",
            highlight: "#fcc9ba",
            label: "Orange"
        },
    ];
    
    var myPieChart = new Chart(ctx_2).Pie(data_2,{
        segmentShowStroke : true,
        segmentStrokeColor : "#fff",
        segmentStrokeWidth : 0,
        animationSteps : 100,
        tooltipCornerRadius: 0,
        animationEasing : "easeOutBounce",
        animateRotate : true,
        animateScale : false,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });
    */

});