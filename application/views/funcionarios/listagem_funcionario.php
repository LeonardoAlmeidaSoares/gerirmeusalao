<!-- Page Content -->

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Colaboradores</h4> 

            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><span class=" icon-menu"></span> Caixa</a>

                <ol class="breadcrumb">

                    <li class="active">Colaboradores</li>

                </ol>

            </div>

            <!-- /.col-lg-12 -->

        </div>

        <!-- /row -->

        <div class="row">

            <div class="col-sm-12">

                <div class="white-box">

                    <h3 class="box-title m-b-0">Colaboradores</h3>

                    <p class="text-muted m-b-30">Listagem de Colaboradores</p>

                    <div class="table-responsive">

                        <table id="myTable" class="table table-striped">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Nome</th>

                                    <th>Cargo</th>

                                    <th>telefone</th>

                                    <th>Ações</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach ($funcionarios->result() as $item) { ?>

                                    <tr>

                                        <td><?= str_pad($item->codFuncionario, 6, "0", STR_PAD_LEFT);?></td>

                                        <td><?= $item->nome; ?></td>

                                        <td><?= $item->cargo; ?></td>

                                        <td><?= $item->telefone; ?></td>

                                        <td>

                                            <a href="<?= base_url("index.php/funcionario/alterar/$item->codFuncionario/"); ?>" title="Alterar Dados de Colaborador">

                                                <span class="fa fa-edit pointer alter"></span>

                                            </a>

                                            <?php if($_SESSION["permissoes"]->perm_cadastrarUsuario > 0){ ?>

                                            <a href="<?= base_url("index.php/usuario/alterarSenha/$item->codFuncionario/"); ?>" title="Alterar Senha de Acesso ao Sistema">

                                                <span class="fa fa-key pointer alter"></span>

                                            </a>

                                            <?php } ?>

                                        </td>

                                        

                                    </tr>

                                <?php } ?>

                            </tbody>

                        </table>

                        <br />

                        <?php if($_SESSION["permissoes"]->perm_cadastrarFuncionario == 2){ ?>

                        <a href="<?= base_url("index.php/funcionario/cadastrar/"); ?>" class="btn btn-info pull-right">Novo</a>

                        <?php } ?>

                    </div>

                </div>

            </div>



        </div>

    </div>

    <!-- /.row -->

    <script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js"); ?>" type="text/javascript"></script>

    <link href="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.css"); ?>" rel="stylesheet" type="text/css" />

    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

