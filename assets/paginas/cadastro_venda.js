$(function(){
    
    var parameters = {
        currency: 'BRL', // If currency is not supplied, defaults to USD
        symbol: 'R$', // Overrides the currency's default symbol
        locale: 'pt_BR', // Overrides the currency's default locale (see supported locales)
        decimal: '.', // Overrides the locale's decimal character
        group: '.', // Overrides the locale's group character (thousand separator)
        pattern: '#.##0,00 !'       // Overrides the locale's default display pattern 
    }

    var valorTotal = 0;
    var listaItens = [];
    
    $("#table").dataTable();
    
    $("#txtProduto").on("change", function(){
        $("#txtQtd").val("0");
        $("#txtQtd").attr("max", $("#txtProduto :selected").attr("estoque"));
    });

    $("#btnAddCart").on("click", function(evt){
       
        evt.preventDefault(); 
        
        $option = $("#txtProduto :selected");
        $qtd = parseInt($("#txtQtd").val());
        
        var t = $('#table').DataTable();
        var linha = [ 
            $option.html(),
            $qtd,
            OSREC.CurrencyFormatter.format(parseFloat($option.attr("valor")), {currency: 'BRL'}),
            OSREC.CurrencyFormatter.format($qtd * parseFloat($option.attr("valor")), {currency: 'BRL'})
        ];

        t.row.add(linha).draw( false );

        listaItens.push({
            produto: $option.val(),
            quantidade: $qtd,
            valorUnitario: $option.attr("valor"),
            valorTotal: $qtd * parseFloat($option.attr("valor"))
        });
        
        valorTotal += $qtd * parseFloat($option.attr("valor"));
        $("#spnValor").html(OSREC.CurrencyFormatter.format(valorTotal, {currency: 'BRL'}));
        $("#txtValorTotal").val(OSREC.CurrencyFormatter.format(valorTotal, {currency: 'BRL'}));
        $("#txtListaItens").val(JSON.stringify(listaItens));
        
    });
    
    $("#selectFPCard").on("click", function(evt){
       
        evt.preventDefault();
        $("#txtFormaPagto").val("CARTAO");
        $(this).addClass("fmActive");
       
    });
    
    $("#selectFPMoney").on("click", function(evt){
       
        evt.preventDefault();
        $("#txtFormaPagto").val("DINHEIRO");
        //$(this).addClass("fmActive");
       
    });

})