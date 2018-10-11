$(function () {

    var url = "http://localhost/gerirmeusalao/";

    shortcut.add("F2", function () {
        swal({
            title: 'Inserir Atendimento?',
            text: "Deseja cadastrar um novo atendimento agora?",
            type: 'question',
            allowEscapeKey: false,
            allowOutsideClick: false,
            allowEnterKey: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            cancelButtonText: "Não"
        }).then(function () {
            window.location = url + "index.php/agenda/cadastro";
        });

    });

    $("#myTable").dataTable({
        aaSorting: [[0, 'desc']]
    });
    
    $(".select2").select2();


});