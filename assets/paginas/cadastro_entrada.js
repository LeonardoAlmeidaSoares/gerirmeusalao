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
$(function(){
    
    $('#txtValor').mask('000.000.000.000.000,00', {reverse: true});
    $("#txtVencimento").mask('00/00/0000');
    
    CKEDITOR.replace("txtDiscriminacao");
    
    $('.typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        name: 'clientes',
        source: substringMatcher(clients)
    });
    
    $("#frmCad").validate({
        rules: {
            txtCliente: "required",
            txtValor: "required",
            txtVencimento: "required",
            txtCategoria: "required",
            txtStatus: "required"
        },
        messages: {
            txtCliente: "Campo Necessário",
            txtValor: "Campo Necessário",
            txtVencimento: "Campo Necessário",
            txtCategoria: "Campo Necessário",
            txtStatus: "Campo Necessário"
        }
    });
    
});