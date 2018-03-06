<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/plugins/images/favicon.png");?>">
    <title>Elite Hospital Admin Template - Hospital admin dashboard web app kit</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url("assets/bootstrap/dist/css/bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?= base_url("assets/plugins/bootstrap-extension/css/bootstrap-extension.css");?>" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?= base_url("assets/css/animate.css");?>" rel="stylesheet">
    <!-- Wizard CSS -->
    <link href="<?= base_url("assets/plugins/register-steps/steps.css");?>" rel="stylesheet">
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
    <section id="wrapper" class="step-register">
        <div class="register-box">
            <div class="">
                <!--a href="javascript:void(0)" class="text-center db m-b-40">
                    <img src="../plugins/images/eliteadmin-logo-dark.png" alt="Home" />
                    <br/>
                    <img src="../plugins/images/eliteadmin-text-dark.png" alt="Home" />
                </a-->
                <!-- multistep form -->
                <form id="msform" method="POST" action="<?= base_url("index.php/instituicao/cadastrarEmpresa");?>">
                    <!-- progressbar -->
                    <ul id="eliteregister">
                        <li class="active">Dados da Empresa</li>
                        <li>Localização</li>
                        <li>Usuário Principal</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Sobre Sua Empresa</h2>
                        <h3 class="fs-subtitle">Conte-nos Sobre Voce</h3>
                        <input type="text" name="txtNome" id="txtNome" placeholder="Nome da Empresa" />
                        <input type="text" name="txtCNPJ" id="txtCNPJ" placeholder="CNPJ da Empresa" />
                        <input type="text" name="txtTelefone" id="txtTelefone" placeholder="Telefone da Empresa" />
                        <input type="button" name="next" class="next action-button" value="Próximo" /> 
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Localização</h2>
                        <h3 class="fs-subtitle">Queremos Saber Onde Voce Está</h3>
                        <select id="txtUF" name="txtUF">
                            <option selected hidden value="">SELECIONE O ESTADO</option>
                            <?php foreach($estados->result() as $item){ ?>
                                <option value="<?= $item->codEstado;?>"><?= $item->descricao;?></option>
                            <?php } ?>
                        </select>
                        <select id="txtCidade" name="txtCidade">
                            <option selected hidden value="">SELECIONE A CIDADE</option>
                        </select>
                        <input type="text" name="txtEndereco" id="txtEndereco" placeholder="Logradouro" />
                        <input type="text" name="txtNumero" id="txtNumero" placeholder="Numero" />
                        <input type="text" name="txtComplemento" id="txtComplemento" placeholder="Complemento" />
                        <input type="text" name="txtCep" id="txtCep" placeholder="CEP" />
                        <input type="text" name="txtBairro"  id="txtBairro" placeholder="Bairro" />
                        <input type="button" name="previous" class="previous action-button" value="Anterior" />
                        <input type="button" name="next" class="next action-button" value="Próximo" /> 
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Dados de Acesso</h2>
                        <h3 class="fs-subtitle">Precisamos dos dados do Usuário Principal</h3>
                        <input type="text" name="txtNomeUsuario" id="txtNomeUsuario" placeholder="Nome" />
                        <input type="email" name="txtEmail" id="txtEmail" placeholder="Email" />
                        <input type="password" name="txtSenha" id="txtSenha" placeholder="Senha" />
                        <input type="password" name="txtCSenha" id="txtCSenha" placeholder="Confirme Sua Senha" />
                        <input type="button" name="previous" class="previous action-button" value="Anterior" />
                        <input type="submit" class="action-button" value="Finalizar" /> 
                    </fieldset>
                    
                </form>
                <div class="clear"></div>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="<?= base_url("assets/plugins/jquery/dist/jquery.min.js");?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url("assets/bootstrap/dist/js/tether.min.js");?>"></script>
    <script src="<?= base_url("assets/bootstrap/dist/js/bootstrap.min.js");?>"></script>
    <script src="<?= base_url("assets/plugins/bootstrap-extension/js/bootstrap-extension.min.js");?>"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url("assets/plugins/sidebar-nav/dist/sidebar-nav.min.js");?>"></script>
    <script src="<?= base_url("assets/plugins/register-steps/jquery.easing.min.js");?>"></script>
    <script src="<?= base_url("assets/plugins/register-steps/register-init.js");?>"></script>
    <!--slimscroll JavaScript -->
    <script src="<?= base_url("assets/js/jquery.slimscroll.js");?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url("assets/js/waves.js");?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url("assets/js/custom.min.js");?>"></script>
    <script src="<?= base_url("assets/paginas/custom.min.js");?>"></script>
    
</body>

</html>

<style>
#msform select{
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    margin-bottom: 18px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 13px;
}
</style>