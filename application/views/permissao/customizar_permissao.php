<!-- Page Content -->

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Alterar Permissões</h4> </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" 
                    class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">

                    <li><a href="<?= base_url(); ?>">Início</a></li>

                    <li class="active">Alterar Permissões</li>

                </ol>

            </div>

            <!-- /.col-lg-12 -->

        </div>

        <form id="frmCad" enctype="multipart/form-data" class="form-material form-horizontal" 

              method="POST" action="<?= base_url("index.php/permissao/alterar/"); ?>">

            <input type="hidden" name="txtcodUsuario" value="<?= $dadosUsuario->codUsuario;?>" />

            <div class="row">

                <div class="col-lg-12">

                    <div class="white-box">

                        <h3 class="box-title m-b-0">Permissões </h3>

                        <p class="text-muted m-b-20">Editar permissões do usuário <code><?= $dadosUsuario->nome;?></code></p>

                        <div class="table-responsive">

                            <table class="table">

                                <thead>

                                    <tr>

                                        <th>Permissão</th>

                                        <th>Sem Acesso</th>

                                        <th>Somente Visualizar</th>

                                        <th>Controle Total</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php foreach($permissoes->result() as $item) { ?>

                                    <tr>

                                        <td>Cadastro de Clientes</td>

                                        <td>

                                            <input type="radio" name="txtCadastro" <?= $item->perm_efetuarCadastro == 0 ? "checked" : "";?> value="0" class="radio-switch bootstrap-switch-default my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtCadastro" <?= $item->perm_efetuarCadastro == 1 ? "checked" : "";?> value="1" class="radio-switch bootstrap-switch-info my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtCadastro" <?= $item->perm_efetuarCadastro == 2 ? "checked" : "";?> value="2" class="radio-switch bootstrap-switch-warning my-check check3" style="width: 63px;" />

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>Alteração de Dados</td>

                                        <td>

                                            <input type="radio" name="txtAlteracao" <?= $item->perm_efetuarAlteracao == 0 ? "checked" : "";?> value="0" class="radio-switch bootstrap-switch-default my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtAlteracao" <?= $item->perm_efetuarAlteracao == 1 ? "checked" : "";?> value="1" class="radio-switch bootstrap-switch-info my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtAlteracao" <?= $item->perm_efetuarAlteracao == 2 ? "checked" : "";?> value="2" class="radio-switch bootstrap-switch-warning my-check check3" style="width: 63px;" />

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>Cadastro de Funcionários</td>

                                        <td>

                                            <input type="radio" name="txtFuncionario" <?= $item->perm_cadastrarFuncionario == 0 ? "checked" : "";?> value="0" class="radio-switch bootstrap-switch-default my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtFuncionario" <?= $item->perm_cadastrarFuncionario == 1 ? "checked" : "";?> value="1" class="radio-switch bootstrap-switch-info my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtFuncionario" <?= $item->perm_cadastrarFuncionario == 2 ? "checked" : "";?> value="2" class="radio-switch bootstrap-switch-warning my-check check3" style="width: 63px;" />

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>Cadastro de Compromissos</td>

                                        <td>

                                            <input type="radio" name="txtAgenda" <?= $item->perm_marcarCompromissos == 0 ? "checked" : "";?> value="0" class="radio-switch bootstrap-switch-default my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtAgenda" <?= $item->perm_marcarCompromissos == 1 ? "checked" : "";?> value="1" class="radio-switch bootstrap-switch-info my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtAgenda" <?= $item->perm_marcarCompromissos == 2 ? "checked" : "";?> value="2" class="radio-switch bootstrap-switch-warning my-check check3" style="width: 63px;" />

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>Cadastro de Serviços e Produtos</td>

                                        <td>

                                            <input type="radio" name="txtServicos"  <?= $item->perm_cadastrarUsuario == 0 ? "checked" : "";?> value="0" class="radio-switch bootstrap-switch-default my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtServicos"  <?= $item->perm_cadastrarUsuario == 1 ? "checked" : "";?> value="1" class="radio-switch bootstrap-switch-info my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtServicos"  <?= $item->perm_cadastrarUsuario == 2 ? "checked" : "";?> value="2" class="radio-switch bootstrap-switch-warning my-check check3" style="width: 63px;" />

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>Cadastro de Notas</td>

                                        <td>

                                            <input type="radio" name="txtNotas"  <?= $item->perm_verNotas == 0 ? "checked" : "";?> value="0" class="radio-switch bootstrap-switch-default my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtNotas"  <?= $item->perm_verNotas == 1 ? "checked" : "";?> value="1" class="radio-switch bootstrap-switch-info my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtNotas"  <?= $item->perm_verNotas == 2 ? "checked" : "";?> value="2" class="radio-switch bootstrap-switch-warning my-check check3" style="width: 63px;" />

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>Cadastro de Usuários</td>

                                        <td>

                                            <input type="radio" name="txtUsuarios" <?= $item->perm_cadastrarUsuario == 0 ? "checked" : "";?> value="0" class="radio-switch bootstrap-switch-default my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtUsuarios" <?= $item->perm_cadastrarUsuario == 1 ? "checked" : "";?> value="1" class="radio-switch bootstrap-switch-info my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtUsuarios" <?= $item->perm_cadastrarUsuario == 2 ? "checked" : "";?> value="2" class="radio-switch bootstrap-switch-warning my-check check3" style="width: 63px;" />

                                        </td>

                                    </tr>

                                     <tr>

                                        <td>Gerir Permissões</td>

                                        <td>

                                            <input type="radio" name="txtPermissoes" <?= $item->perm_alterarPermissoes == 0 ? "checked" : "";?> value="0" class="radio-switch bootstrap-switch-default my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtPermissoes" <?= $item->perm_alterarPermissoes == 1 ? "checked" : "";?> value="1" class="radio-switch bootstrap-switch-info my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtPermissoes" <?= $item->perm_alterarPermissoes == 2 ? "checked" : "";?> value="2" class="radio-switch bootstrap-switch-warning my-check check3" style="width: 63px;" />

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>Visualizar Relatórios</td>

                                        <td>

                                            <input type="radio" name="txtRelatorios" <?= $item->perm_verRelatorios == 0 ? "checked" : "";?> value="0" class="radio-switch bootstrap-switch-default my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtRelatorios" <?= $item->perm_verRelatorios == 1 ? "checked" : "";?> value="1" class="radio-switch bootstrap-switch-info my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtRelatorios" <?= $item->perm_verRelatorios == 2 ? "checked" : "";?> value="2" class="radio-switch bootstrap-switch-warning my-check check3" style="width: 63px;" />

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>Alterar Dados da Empresa</td>

                                        <td>

                                            <input type="radio" name="txtEmpresa" <?= $item->perm_alterarDadosEmpresa == 0 ? "checked" : "";?> value="0" class="radio-switch bootstrap-switch-default my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtEmpresa" <?= $item->perm_alterarDadosEmpresa == 1 ? "checked" : "";?> value="1" class="radio-switch bootstrap-switch-info my-check" style="width: 63px;" />

                                        </td>

                                        <td>

                                            <input type="radio" name="txtEmpresa" <?= $item->perm_alterarDadosEmpresa == 2 ? "checked" : "";?> value="2" class="radio-switch bootstrap-switch-warning my-check check3" style="width: 63px;" />

                                        </td>

                                    </tr>

                                    <?php } ?>

                                </tbody>

                            </table>

                            <br />

                            <input type="submit" class="btn btn-info pull-right" value="Salvar" />

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>



<link href="<?= base_url("assets/plugins/bootstrap-switch/bootstrap-switch.min.css");?>" rel="stylesheet" type="text/css"/>

<script src="<?= base_url("assets/plugins/bootstrap-switch/bootstrap-switch.min.js");?>" type="text/javascript"></script>

<script src="<?= base_url("assets/paginas/gerirPermissoes.js");?>" type="text/javascript"></script>