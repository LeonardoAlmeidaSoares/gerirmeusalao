<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Produtos</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                <a href="<?= base_url("index.php/salao/fluxoCaixa"); ?>" 
                   class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>
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
                                    <th>#</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>Estoque</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($produtos->result() as $item) { ?>
                                    <tr>
                                        <td><?= str_pad($item->codProduto, 6, "0", STR_PAD_LEFT); ?></td>
                                        <td><?= $item->descricao; ?></td>
                                        <td><?= "R$ " . number_format($item->valorVenda, 2, ",", "."); ?></td>
                                        <td><?= $item->estoque; ?></td>
                                        <td>
                                            <a href="<?= base_url("index.php/produtos/alterar/$item->codProduto"); ?>" title="Alterar Dados do Produto">
                                                <span class="fa fa-edit pointer alter"></span>
                                            </a>
                                            
                                            <a href="#" title="Excluir Produto do Sistema" class='btnDelete' codigo='<?= $item->codProduto;?>'>
                                                <span class="fa fa-remove pointer delete"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br />
                        <?php if ($_SESSION["permissoes"]->perm_cadastrarProdutosServicos == 2) { ?>
                            <a href="<?= base_url("index.php/produtos/cadastrar/"); ?>" class="btn btn-info pull-right">Novo</a>
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
    <script src="<?= base_url("assets/paginas/listagem_produtos.js"); ?>" type="text/javascript"></script>
</div>