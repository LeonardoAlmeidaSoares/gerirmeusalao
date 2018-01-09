<!-- Page Content -->
<?php 
    $status = array(
        -1 => "Cancelado",
        0 => "Pendente",
        1 => "Pago"
    );
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Contas a Pagar</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                <ol class="breadcrumb">
                    <li class="active">Contas a Pagar</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Contas a Pagar</h3>
                    <p class="text-muted m-b-30">Listagem de Contas a Pagar</p>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>Tipo</th>
                                    <th>Valor</th>
                                    <th>Data de Vencimento</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($saidas->result() as $item) { ?>
                                <tr>
                                    <td><?= $item->discriminacao;?></td>
                                    <td><?= $item->descricao;?></td>
                                    <td><?= "R$" . number_format($item->valor, 2, ",", ".");?></td>
                                    <td><?= date_format(date_create($item->dataVencimento), 'd/m/Y');?></td>
                                    <td><?= $status[$item->status];?></td>
                                    <td>
                                        <?php if($item->status == 0){ ?>
                                            <span class="ti-money pointer pagar" cod="<?= $item->codNotaSaida;?>"></span>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br />
                        <?php if($_SESSION["permissoes"]->perm_verNotas == 2){ ?>
                        <a href="<?= base_url("index.php/contasPagar/cadastrar/");?>" class="btn btn-info pull-right">Novo</a>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <!-- /.row -->
        <script src="<?= base_url("assets/plugins/sweetalert/sweetalert.min.js");?>" type="text/javascript"></script>
        <link href="<?= base_url("assets/plugins/sweetalert/sweetalert.css");?>" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js"); ?>" type="text/javascript"></script>
        <link href="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url("assets/paginas/listagem_notas_saida.js"); ?>" type="text/javascript"></script>
        