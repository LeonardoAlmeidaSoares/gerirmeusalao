<!-- Page Content -->

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Cadastrar Saída</h4> 

            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa"); ?>" 
                   class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">
                    <li><a href="<?= base_url(); ?>">Relatórios</a></li>
                    <li class="active">Cadastrar Nota de Saída</li>
                </ol>
            </div>
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="row">



                <div class="white-box" style="width: 100%;">
                    <div class="div_btn_print">
                        <a href="<?= base_url("comprovante/rendimento/24/10-2018");?>" target="_blank">
                            <button class="btn btn-black">
                                <span class="fa fa-print"></span>
                            </button>
                        </a>
                    </div>
                    <h3 class="box-title m-b-0">Contas a Receber</h3>
                    <p class="text-muted m-b-30">Listagem de Contas a Receber</p>

                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Descrição</th>
                                    <th>Cliente</th>
                                    <th>Valor</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($itens->result() as $item) { ?>
                                    <tr>
                                        <td><?= str_pad($item->codNotaEntrada, 6, "0", STR_PAD_LEFT); ?></td>
                                        <td><?= $item->descricao; ?></td>
                                        <td><?= $item->nome; ?></td>
                                        <td>R$<?= number_format($item->valor, 2, ",", "."); ?></td>
                                        <td><?= date("d/m/Y H:i", strtotime($item->horario)); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .div_btn_print{
        width: 30%;
        position: relative;
        float: right;
        text-align: right;
        margin-top: 15px;
    }
</style>