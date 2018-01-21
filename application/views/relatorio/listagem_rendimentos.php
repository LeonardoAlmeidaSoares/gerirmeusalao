<!-- Page Content -->

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Produtos</h4> </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><span class=" icon-menu"></span> Caixa</a>

                <ol class="breadcrumb">

                    <li class="active">Produtos</li>

                </ol>

            </div>

            <!-- /.col-lg-12 -->

        </div>

        <!-- /row -->

        <div class="row">

            <div class="col-sm-12">

                <div class="white-box">

                    <h3 class="box-title m-b-0">Produtos</h3>

                    <p class="text-muted m-b-30">Listagem de Produtos</p>

                    <div class="table-responsive">

                        <table id="myTable" class="table table-striped">

                            <thead>

                                <tr>

                                    <th>Descrição</th>

                                    <th>Valor</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach($rendimentos->result() as $item){?>

                                <tr>

                                    <td><?= $item->nome;?></td>

                                    <td><?= "R$ " . number_format($item->valor,2,",",".");?></td>

                                    

                                </tr>

                                <?php } ?>

                            </tbody>

                        </table>

                        <br />

                        <?php if($_SESSION["permissoes"]->perm_cadastrarProdutosServicos == 2){ ?>

                        <a href="<?= base_url("index.php/produtos/cadastrar/");?>" class="btn btn-info pull-right">Novo</a>

                        <?php }?>

                    </div>

                </div>

            </div>



        </div>

        </div>

        <!-- /.row -->

        <script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js"); ?>" type="text/javascript"></script>

        <link href="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.css"); ?>" rel="stylesheet" type="text/css" />

        <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

        