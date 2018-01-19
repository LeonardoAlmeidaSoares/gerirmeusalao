<!-- Page Content -->

<?php 
function getDataAniversario($data){
    return substr($data, 8,2) . "/" . substr($data,5,2) . "/" . substr($data,0,4);
}
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Perfil do Cliente</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                <ol class="breadcrumb">
                    <li><a href="<?= base_url("index.php/cliente/");?>">Clientes</a></li>
                    <li class="active">Perfil do Cliente</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <!-- .row -->
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="white-box">
                    <div class="user-bg"> 
                        <img width="100%" alt="user" src="<?= base_url("assets/img/$dados->imagem"); ?>"> 
                    </div>
                    <div class="user-btm-box">
                        <!-- .row -->
                        <div class="row text-center m-t-10">
                            <div class="col-md-12 b-r"><strong>Nome</strong>
                                <p>
                                    <a href="#" id="txtNome" data-type="text" class="editable"
                                       data-pk="<?= $dados->codCliente; ?>" data-url="<?= base_url("index.php/cliente/alterarElemento/nome"); ?>" 
                                       data-title="Alterar Nome do Cliente">
                                           <?= $dados->nome; ?>
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-12"><strong>Nascimento</strong>
                                <p>
                                    <a href="#" id="txtNascimento" data-type="text" class="editable"
                                       data-pk="<?= $dados->codCliente; ?>" format="yyyy-mm-dd" viewformat="dd/mm/yyyy"
                                       data-url="<?= base_url("index.php/cliente/alterarElemento/nascimento"); ?>" 
                                       data-title="Alterar data de Nascimento do Cliente">
                                       <?= getDataAniversario($dados->nascimento); ?>
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-12 b-r"><strong>Email</strong>
                                <p>
                                    <a href="#" id="txtEmail" data-type="text" class="editable"
                                       data-pk="<?= $dados->codCliente; ?>" data-url="<?= base_url("index.php/cliente/alterarElemento/email"); ?>" 
                                       data-title="Alterar Email do Cliente">
                                           <?= $dados->email; ?>
                                    </a>
                            </div>
                            <div class="col-md-12"><strong>Telefone</strong>
                                <p>
                                    <a href="#" id="txtTelefone" data-type="text" class="editable"
                                       data-pk="<?= $dados->codCliente; ?>" data-url="<?= base_url("index.php/cliente/alterarElemento/telefone"); ?>" 
                                       data-title="Alterar Telefone do Cliente">
                                           <?= $dados->telefone; ?>
                                    </a>
                                </p>
                            </div>

                            <hr>
                            <!-- .row -->
                            <div class="col-md-12">
                                <strong>Endereço</strong>
                                <p>
                                    <a href="#" id="txtLogradouro" data-type="text" class="editable"
                                       data-pk="<?= $dados->codCliente; ?>" data-url="<?= base_url("index.php/cliente/alterarElemento/logradouro"); ?>" 
                                       data-title="Alterar Logradouro do Cliente">
                                           <?= $dados->logradouro; ?>
                                    </a> - <a href="#" id="txtNumero" data-type="text" class="editable"
                                              data-pk="<?= $dados->codCliente; ?>" data-url="<?= base_url("index.php/cliente/alterarElemento/numero"); ?>" 
                                              data-title="Alterar Numero da Casa do Cliente">
                                                  <?= $dados->numero; ?>
                                    </a> / <a href="#" id="txtComplemento" data-type="text" class="editable"
                                              data-pk="<?= $dados->codCliente; ?>" data-url="<?= base_url("index.php/cliente/alterarElemento/complemento"); ?>" 
                                              data-title="Alterar Complemento do endereço do Cliente">
                                                  <?= $dados->complemento; ?>
                                    </a>
                                    
                            </div>
                        </div>
                        <hr>
                        <!-- /.row >
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-purple"><i class="ti-facebook"></i></p>
                            <h1>258</h1> </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-blue"><i class="ti-twitter"></i></p>
                            <h1>125</h1> </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-danger"><i class="ti-google"></i></p>
                            <h1>140</h1> </div>-->
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <?php if($servicosprestados->num_rows() > 0){ ?>
                    <div class="row">
                        <div class="col-xs-12 b-r"> <strong><?= $dados->nome; ?></strong>
                            <br>
                            <h4 class="m-t-30">Serviços Feitos</h4>
                        </div>
                    </div>
                    <hr>
                    <?php foreach ($servicosprestados->result() as $item) { ?>
                        <h5><?= $item->descricao; ?><span class="pull-right"><?= $item->qtd; ?></span></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $item->qtd; ?>" aria-valuemin="0" aria-valuemax="<?= $item->total; ?>" style="width:<?= (($item->qtd * 100) / $item->total); ?>%;"> <span class="sr-only">50% Complete</span> </div>
                        </div>
                    <?php }} ?>

                    <hr>

                    <div style="height: 280px;">
                        <div id="placeholder" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <script src="<?= base_url("assets/plugins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js"); ?>" type="text/javascript"></script>
    <link href="<?= base_url("assets/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css"); ?>" rel="stylesheet" type="text/css"/>
    <script src="<?= base_url("assets/paginas/perfil_cliente.js"); ?>" type="text/javascript"></script>