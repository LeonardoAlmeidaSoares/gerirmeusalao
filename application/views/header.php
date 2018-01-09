<!DOCTYPE html>
<html lang="pt-BR">
    <?php $nome = isset($_SESSION["empresa"]) ? $_SESSION["empresa"]->nome : NOME_DO_SISTEMA;?>
    <?php $fav = isset($_SESSION["empresa"]) ? $_SESSION["empresa"]->favicon : FAV_DEFAULT;?>    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= $fav; ?>">
        <title><?= $nome; ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url("assets/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?= base_url("assets/plugins/bootstrap-extension/css/bootstrap-extension.css"); ?>" rel="stylesheet">
        <!-- Menu CSS -->
        <link href="<?= base_url("assets/plugins/sidebar-nav/dist/sidebar-nav.min.css"); ?>" rel="stylesheet">
        <!-- animation CSS -->
        <link href="<?= base_url("assets/css/animate.css"); ?>" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?= base_url("assets/css/style.min.css"); ?>" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?= base_url("assets/plugins/jquery/dist/jquery.min.js"); ?>"></script>
        <!-- color CSS -->
        <link href="<?= base_url("assets/css/colors/megna.css"); ?>" id="theme" rel="stylesheet">

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url("assets/bootstrap/dist/js/tether.min.js"); ?>"></script>
        <script src="<?= base_url("assets/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>
        <script src="<?= base_url("assets/plugins/bootstrap-extension/js/bootstrap-extension.min.js"); ?>"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>