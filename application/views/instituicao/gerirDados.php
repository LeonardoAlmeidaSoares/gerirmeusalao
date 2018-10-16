
<!-- Page Content -->
<div id="page-wrapper">

    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Perfil Institucional</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("salao/fluxoCaixa"); ?>" 
                   class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">
                    <li class="active">Instituição</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <!-- .row -->
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="white-box">
				
                    <div class="user-bg text-center" id="div_img_logo"
                         style="width:100%; text-align:center; margin-left:auto; margin-top:10px; margin-right:auto; height:220px;">
						 <div class="subss" style="z-index:9999;">Clique para substituir imagem</div>
                         <img style="height:85%; position:relative; top:11%;" alt="user" src="<?= base_url($dadosInstituicao->logo); ?>" id="logo_atual" class="align-middle dz-message">
						 
                    </div>
                    <div class="user-btm-box">
                        <!-- .row -->
                        <div class="row text-center m-t-10">
                            <div class="col-md-12 b-r">
                                <strong>Nome</strong>
                                <p><?= $dadosInstituicao->nome; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center m-t-10">
                            <div class="col-md-12">
                                <strong>Usuário</strong>
                                <p><?= $_SESSION["usuario"]->nome; ?></p>
                            </div>
                        </div>
                        <!-- /.row -->
                        <hr>
                        <!-- .row -->
                        <div class="row text-center m-t-10">
                            <div class="col-md-12 b-r">
                                <strong>Email</strong>
                                <p><?= $dadosInstituicao->email; ?></p>
                            </div>

                        </div>
                        <hr>
                        <div class="row text-center m-t-10">
                            <div class="col-md-12 b-r">
                                <strong>Telefone</strong>
                                <p><?= $dadosInstituicao->telefone; ?></p>
                            </div>
                        </div>
                        <!-- /.row -->
                        <hr>
                        <!-- .row -->
                        <div class="row text-center m-t-10">
                            <div class="col-md-12">
                                <strong>Endereço</strong>
                                <p><?= $dadosInstituicao->logradouro; ?>, <?= $dadosInstituicao->numero; ?>, <?= $dadosInstituicao->bairro; ?><br> <?= $dadosInstituicao->cep; ?>
                                    <br> <?= $dadosInstituicao->cidade; ?>/<?= $dadosInstituicao->UF; ?></p>
                            </div>
                        </div>
                        <hr>
                        <!-- /.row ->
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-purple">
                                <i class="ti-facebook"></i>
                            </p>
                            <h1>258</h1> 
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-blue">
                                <i class="ti-twitter"></i>
                            </p>
                            <h1>125</h1> 
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-danger">
                                <i class="ti-google"></i>
                            </p>
                            <h1>140</h1> 
                        </div-->
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <!-- .tabs -->
                    <ul class="nav nav-tabs sttabs tabs-style-iconbox">
                        <li class="active tab">
                            <a href="#tab-funcionarios" data-toggle="tab"> 
                                <span class="visible-xs">
                                    <i class="fa fa-home"></i>
                                </span> 
                                <span class="hidden-xs">Funcionários</span> 
                            </a>
                        </li>
                        <li class="tab">
                            <a href="#dados-empresa" data-toggle="tab"> 
                                <span class="visible-xs">
                                    <i class="fa fa-home"></i>
                                </span> 
                                <span class="hidden-xs">Dados da Empresa</span> 
                            </a>
                        </li>
                        <li class="tab">
                            <a href="#redes-sociais" data-toggle="tab"> 
                                <span class="visible-xs">,
                                    <i class="fa fa-home"></i>
                                </span> 
                                <span class="hidden-xs">Redes Sociais</span> 
                            </a>
                        </li>
                    </ul>
                    <!-- /.tabs -->
                    <div class="tab-content">
                        <!-- .tabs 1 -->
                        <div class="tab-pane active" id="tab-funcionarios">
                            <div class="row">
                                <?php foreach ($listaFuncionarios->result() as $item) { ?>
                                    <div class="col-md-12 col-sm-12" >
                                        <div class="white-box">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-4 text-center">
                                                    <a href="#">
                                                        <img src="<?= base_url($item->imagem); ?>" alt="user" style="height:100px; width:100px;" class="img-circle img-responsive">
                                                    </a>
                                                </div>
                                                <div class="col-md-9 col-sm-6">
                                                    <h3 class="box-title m-b-0"><?= $item->nome; ?></h3> 
                                                    <small><?= $item->cargo; ?></small>
                                                    <p> </p>
                                                    <address>
                                                        <abbr title="Telefone">
                                                            <span class="fa fa-phone"></span>&nbsp;
                                                        </abbr> 
                                                        <?= $item->telefone; ?>
                                                    </address> 
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.tabs1 -->
                        <!-- .tabs 3 -->
                        <div class="tab-pane" id="dados-empresa">
                            <form class="form-material form-horizontal" id="frmChangeInst">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Nome</label>
                                    <div class="col-md-12">
                                        <input type="text" id="txtNomeEmpresa" name="txtNomeEmpresa" class="form-control" placeholder="Nome da empresa" value="<?= $dadosInstituicao->nome; ?>"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">CNPJ</label>
                                    <div class="col-md-12">
                                        <input type="text" id="txtCnpj" name="txtCnpj" class="form-control" placeholder="CNPJ da Empresa" value="<?= $dadosInstituicao->cnpj; ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Email</label>
                                    <div class="col-md-12">
                                        <input type="text" id="txtEmail" name="txtEmail" class="form-control" placeholder="Email da Empresa" value="<?= $dadosInstituicao->email; ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="btelefone">Telefone</label>
                                    <div class="col-md-12">
                                        <input type="text" id="txtTelefone" name="txtTelefone" class="form-control" placeholder="CNPJ da Empresa" value="<?= $dadosInstituicao->telefone; ?>"> </div>
                                </div>

                                <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Cadastrar</button>
                                <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancelar</button>
                            </form>
                        </div>
                        <!-- /.tabs 3 -->
                        <!-- .tabs 4 -->
                        <div class="tab-pane" id="redes-sociais">
                            <form class="form-material form-horizontal" id="frmRedesSociais">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Facebook</label>
                                    <div class="col-md-12">
                                        <input type="text" id="txtFacebook" name="txtFacebook" class="form-control" placeholder="Página do Facebook" value="<?= $dadosInstituicao->facebook; ?>"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="">Instagram</label>
                                    <div class="col-md-12">
                                        <input type="text" id="txtInstagram" name="txtInstagram" class="form-control" placeholder="Página do Instagram" value="<?= $dadosInstituicao->instagram; ?>"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Twitter</label>
                                    <div class="col-md-12">
                                        <input type="text" id="txtTwitter" name="txtTwitter" class="form-control" placeholder="Página do Twitter" value="<?= $dadosInstituicao->twitter; ?>"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="">Google+</label>
                                    <div class="col-md-12">
                                        <input type="text" id="txtGooglePlus" name="txtGooglePlus" class="form-control" placeholder="Página do Google+" value="<?= $dadosInstituicao->googleplus; ?>"> 
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Cadastrar</button>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancelar</button>
                            </form>
                        </div>
                        <!-- /.tabs 3 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
<script src="<?= base_url("assets/plugins/sweetalert/sweetalert.min.js"); ?>" type="text/javascript"></script>
<link href="<?= base_url("assets/plugins/sweetalert/sweetalert.css"); ?>" rel="stylesheet" type="text/css"/>    
<script src="<?= base_url("assets/plugins/mask-plugin/dist/jquery.mask.min.js"); ?>" type="text/javascript"></script>
<link href="<?= base_url("assets/plugins/dropzone/basic.css"); ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url("assets/plugins/dropzone/dropzone.css"); ?>" rel="stylesheet" type="text/css"/>
<script src="<?= base_url("assets/plugins/dropzone/dropzone.js"); ?>" type="text/javascript"></script>

<script type="text/javascript" src="<?= base_url("assets/paginas/instituicao.js"); ?>"></script>
<style>

    .dz-message, .dz-image-preview
    {
        cursor: pointer;
    }
    
</style>