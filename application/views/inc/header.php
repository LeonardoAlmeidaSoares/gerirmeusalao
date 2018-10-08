<!DOCTYPE html>
<html lang="pt-BR">
    <?php $nome = isset($_SESSION["empresa"]) ? $_SESSION["empresa"]->nome : NOME_DO_SISTEMA;?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="PL Sitemas">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(FAV_DEFAULT); ?>">
        <title><?= $nome; ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url("assets/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?= base_url("assets/plugins/bootstrap-extension/css/bootstrap-extension.css"); ?>" rel="stylesheet">
        <!-- Menu CSS -->
        <link href="<?= base_url("assets/plugins/sidebar-nav/dist/sidebar-nav.min.css"); ?>" rel="stylesheet">
        <!-- animation CSS -->
        <link href="<?= base_url("assets/css/animate.css"); ?>" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?= base_url("assets/css/style.css"); ?>" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?= base_url("assets/plugins/jquery/dist/jquery.min.js"); ?>"></script>
        <!-- color CSS -->
        <link href="<?= base_url("assets/css/colors/megna.css"); ?>" id="theme" rel="stylesheet">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

       <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url("assets/bootstrap/dist/js/tether.min.js"); ?>"></script>
        <script src="<?= base_url("assets/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>
        <script src="<?= base_url("assets/plugins/bootstrap-extension/js/bootstrap-extension.min.js"); ?>"></script>
        <script src="<?= base_url("assets/js/functions.js");?>"></script>

        <script src="<?= base_url("assets/plugins/sweetalert/sweetalert.min.js");?>" type="text/javascript"></script>

        <link href="<?= base_url("assets/plugins/sweetalert/sweetalert.css");?>" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url("assets/plugins/shortcut.js");?>" type="text/javascript"></script>
		
		<script type="text/javascript">
		function bs_input_file() {
	$(".input-file").before(
		function() {
			if ( ! $(this).prev().hasClass('input-ghost') ) {
				var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
				element.attr("name",$(this).attr("name"));
				element.change(function(){
					element.next(element).find('input').val((element.val()).split('\\').pop());
				});
				$(this).find("button.btn-choose").click(function(){
					element.click();
				});
				$(this).find("button.btn-reset").click(function(){
					element.val(null);
					$(this).parents(".input-file").find('input').val('');
				});
				$(this).find('input').css("cursor","pointer");
				$(this).find('input').mousedown(function() {
					$(this).parents('.input-file').prev().click();
					return false;
				});
				return element;
			}
		}
	);
}
$(function() {
	bs_input_file();
});
		</script>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>