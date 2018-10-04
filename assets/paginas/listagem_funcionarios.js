$(function () {
    $(".btnDelete").on("click", function (evt) {
        evt.preventDefault();
        $this = $(this);
        swal({
            title: "Excluir Colaborador",
            text: "Tem certeza que deseja fazer isso?",
            type: "question",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sim",
            cancelButtonText: "Não"
        }).then(function (result) {
            $.ajax({
                url: "deletar/",
                method: "POST",
                data: {
                    "codigo": $this.attr("codigo")
                }
            }).success(function (response) {
                $this.parent().parent().hide('slow');
                swal("Feito", "Colaborador Excluído com sucesso", "success");
            });
        });
    })
});