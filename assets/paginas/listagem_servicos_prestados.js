$(function(){
    $(".lnk-sel").on("click", function(evt){
        evt.preventDefault();
        
        $this = $(this);
        
        $.ajax({
            url: "getRelatorioServicosPrestados/",
            method: "POST",
            data: {
                "codFuncionario": $this.attr("cod")
            }
        }).success(function (response) {
            $("#div_report").html(response);
        });
        
        
    });
});