<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/plugins/images/favicon.png");?>">
    <title>Gerir Meu Salão - Gestão de Salão de Beleza</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url("assets/bootstrap/dist/css/bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?= base_url("assets/plugins/bootstrap-extension/css/bootstrap-extension.css");?>" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?= base_url("assets/css/animate.css");?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url("assets/css/style.min.css");?>" rel="stylesheet">
                              
    <!-- color CSS -->
    <link href="<?= base_url("assets/css/colors/megna.css");?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material" id="loginform" method="post" action="<?= base_url('index.php/usuario/efetuarTrocaDeSenha');?>">
                    <h3 class="box-title m-b-20">Alterar Senha</h3>
                    <input type="hidden" value="<?= $_SESSION["usuario"]->email;?>" name="txtEmail"  />
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="txtSenha1" id="txtSenha1" type="password" required="" placeholder="Senha"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="txtSenha2" id="txtSenha2" type="password" required="" placeholder="Confirme sua Senha"> 
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Confirmar Mudança</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Naão deseja alterar <a href="<?= base_url();?>" class="text-primary m-l-5"><b>Volte para o site</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="<?= base_url("assets/plugins/jquery/dist/jquery.min.js");?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url("assets/bootstrap/dist/js/tether.min.js");?>"></script>
    <script src="<?= base_url("assets/bootstrap/dist/js/bootstrap.min.js");?>"></script>
    <script src="<?= base_url("assets/plugins/bootstrap-extension/js/bootstrap-extension.min.js");?>"></script>
    <script src="<?= base_url("assets/plugins/sweetalert/sweetalert.min.js");?>" type="text/javascript"></script>
    <link href="<?= base_url("assets/plugins/sweetalert/sweetalert.css");?>" rel="stylesheet" type="text/css"/>
    <!--slimscroll JavaScript -->
    <script src="<?= base_url("assets/js/jquery.slimscroll.js");?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url("assets/js/waves.js");?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url("assets/js/custom.min.js");?>"></script>
    <script src="<?= base_url("assets/plugins/jquery.validate.js");?>"></script>
    <script src="<?= base_url("assets/paginas/alterar_propria_senha.js");?>"></script>

</body>

</html>