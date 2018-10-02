<?php 

    function Dataget($field){

        if(isset($dados)){

            return $dados->$field;

        }

    }

?>



<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Cadastrar Usuário do Sistema</h4> 

            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" 
                    class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">

                    <li><a href="<?= base_url(); ?>">Início</a></li>

                    <li class="active">Cadastrar Usuário do Sistema</li>

                </ol>

            </div>

            <!-- /.col-lg-12 -->

        </div>

        <form id="frmCad" enctype="multipart/form-data" class="form-material form-horizontal" 

              method="POST" action="<?= base_url("index.php/usuario/realizar_cadastro/");?>">

            <div class="row">

                <div class="col-sm-12">

                    <div class="white-box">

                        <h3 class="box-title">Informações de Cadastro</h3>

                        <?php if(!isset($codProcesso)){ ?>

                        <div class="form-group">

                            <label class="col-md-12" for="txtUsuario">Funcionário</label>

                            <div class="col-md-12">

                                <select id="txtFuncionario" name="txtFuncionario" class="form-control">

                                    <option value="" selected hidden>Selecione o Funcionario</option>

                                <?php foreach($funcionarios->result() as $item){ ?>

                                    <option value="<?= $item->codFuncionario;?>"><?= $item->nome;?></option>

                                <?php } ?>

                                </select>

                            </div>

                        </div>

                        <?php } else {  ?>

                            <input type="hidden" name="txtUsuario" id="txtUsuario" value="<?= $codProcesso;?>" />

                        <?php } ?>

                        <div class="form-group">

                            <label class="col-md-12" for="txtSenha">Senha</label>

                            <div class="col-md-12">

                                <input type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="Insira sua senha"> 

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-12" for="txtSenhaC">Confirme sua Senha</label>

                            <div class="col-md-12">

                                <input type="password" id="txtSenhaC" name="txtSenhaC" class="form-control" placeholder="Confirme sua senha"> 

                            </div>

                        </div>

                            <div class="form-group">

                            <label class="col-sm-12">Permissões Pré Definidas</label>

                            <div class="col-sm-12">

                                <select class="form-control" id="txtPermissao" name="txtPermissao">

                                    <option value="">Selecione a Permissão</option>

                                    <?php foreach($permissoes->result() as $item){ ?>

                                        <option value="<?=$item->codTipoPermissao;?>"  <?= (Dataget("codTipoPermissao") == $item->codTipoPermissao) ? "selected" : "";?>>
                                            <?= $item->descricao;?> 
                                        </option>

                                    <?php } ?>

                                </select>

                            </div>

                        </div>

                        

                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Cadastrar</button>

                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Apagar</button>

                    </div>

                </div>

            </div>

        </form> 

    </div>

    <script src="<?= base_url("assets/plugins/jquery.validate.js");?>" type="text/javascript"></script>

    <script src="<?= base_url("assets/paginas/cadastro_usuario.js");?>" type="text/javascript"></script>