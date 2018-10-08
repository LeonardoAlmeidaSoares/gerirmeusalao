$(function () {

    $("#txtCnpj").mask("99.999.999/0001-99");

    var myDropzone = new Dropzone("div#div_img_logo", {
        url: "../instituicao/nova_logo",
        clickable: true
    });

    myDropzone.on("addedfile", function (file) {

        if ($(".dz-preview").length > 1) {
            $(".dz-preview").first().remove();
        } else {
            $("#logo_atual").hide("css");
        }
        swal({
            title: "Logo Alterada",
            text: "Sua Imagem foi alterada com sucesso",
            type: "success"
        }).then(function (isConfirm) {
            window.location.reload();
        });
    });

    $(".tab a").on("click", function () {
        $aria = $(this).attr("href");
        $(".tab-pane").removeClass("active");
        $($aria).addClass("active");
    });

    $("#txtCnpj").on("blur", function () {
        if ($("#txtCnpj").val().length > 0) {
            if (!(validarCNPJ($(this).val()))) {
                $("#txtCnpj").val("");
                swal("CNPJ Inválido", "Favor inserir um CNPJ válido", "error");
            }
        }
    });

    $("#frmChangeInst").on("submit", function (evt) {
        evt.preventDefault();
        $.ajax({
            url: "update/",
            method: "POST",
            data: {
                "nome": $("#txtNomeEmpresa").val(),
                "cnpj": $("#txtCnpj").val(),
                "email": $("#txtEmail").val(),
                "telefone": $("#txtTelefone").val()
            }
        }).success(function (response) {
            swal("Parabéns", "Alterações Realizadas com sucesso", "success");
        });
    });

    $("#frmRedesSociais").on("submit", function (evt) {
        evt.preventDefault();
        $.ajax({
            url: "update/",
            method: "POST",
            data: {
                "facebook": $("#txtFacebook").val(),
                "twitter": $("#txtTwitter").val(),
                "instagram": $("#txtInstagram").val(),
                "googleplus": $("#txtGooglePlus").val()
            }
        }).success(function (response) {
            swal("Parabéns", "Alterações Realizadas com sucesso", "success");
        });
    });
})