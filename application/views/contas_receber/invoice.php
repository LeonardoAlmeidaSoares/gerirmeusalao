<!-- Page Content -->
<?php 

function getNomeIndividuo($item){

    //$pos2 = strpos($item, '%');
    $pos1 = strpos($item, '%');
    return str_replace("%","",substr($item, $pos1+1));

}

$valorTotal = 0;?>

<input type="hidden" id="codNota" name="codNota" value="<?= $codNota;?>" />

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Comprovante de pagamento</h4> 

            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" 
                    class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">

                    <li><a href="#">Contas a Receber</a></li>

                    <li class="active">Comprovante de Pagamento</li>

                </ol>

            </div>

        </div>

        <!-- /.row -->

        <div class="row">

            <div class="col-md-12">

                <div class="white-box printableArea">

                    <h3>

                        <b>PAGAMENTO</b> 

                        <span class="pull-right">#<?= str_pad($dados->row(0)->codNotaEntrada, 8, "0", STR_PAD_LEFT); ?></span>

                    </h3>

                    <hr>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="pull-left"> 

                                <address>

                                    <h3> &nbsp;<b class="text-danger"><?= $_SESSION["empresa"]->nome; ?></b></h3>

                                    <p class="text-muted m-l-5">

                                        <br/> <?= $_SESSION["empresa"]->logradouro; ?>, <?= $_SESSION["empresa"]->numero; ?> <?= $_SESSION["empresa"]->complemento; ?>

                                        <br/> <?= $_SESSION["empresa"]->bairro; ?>, <?= $_SESSION["empresa"]->cidade . "/" . $_SESSION["empresa"]->UF; ?>

                                    </p>

                                </address> 

                            </div>

                            <div class="pull-right text-right"> 

                                <address>
                                    <?php if($cliente->codCliente > 0){ ?>
                                    <h3 class="font-bold"><?= $cliente->nome; ?></h3>

                                    <br/> <?= $cliente->logradouro; ?>, <?= $cliente->numero; ?> <?= $cliente->complemento; ?>

                                    <br/> <?= $cliente->bairro; ?>, <?= $cliente->cidade . "/" . $cliente->UF; ?>

                                    <?php } else { ?>
                                        <h3 class="font-bold"><?= getNomeIndividuo($dados->row(0)->discriminacao); ?></h3>
                                    <?php } ?>
                                    <p class="m-t-30">

                                        <b>Data da Nota</b> 

                                        <i class="fa fa-calendar"></i> 

                                        <?= date_format(date_create($dados->row(0)->dataCriacao), 'd/m/Y'); ?>

                                    </p>

                                    <p>

                                        <b>Data de Vencimento :</b> 

                                        <i class="fa fa-calendar"></i> 

                                        <?= date_format(date_create($dados->row(0)->dataVencimento), 'd/m/Y'); ?>

                                    </p>

                                </address> 

                            </div>

                        </div>

                        <?php if($descricaoServicos->num_rows() > 0){ ?>

                        <div class="col-md-12">

                            <div class="table-responsive m-t-40" style="clear: both;">

                                <table class="table table-hover">

                                    <thead>

                                        <tr>

                                            <th class="text-left">#</th>

                                            <th>Descrição</th>

                                            <th class="text-right">Quantidade</th>

                                            <th class="text-right">Valor</th>

                                            <th class="text-right">Total</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php foreach($descricaoServicos->result() as $item){?>

                                        <?php $valorTotal += $item->valor;?>

                                        <tr>

                                            <td class="text-left"><?= str_pad($item->Codigo, 6,"0",STR_PAD_LEFT);?></td>

                                            <td><?= $item->descricao;?></td>

                                            <td class="text-right">0000 1</td>

                                            <td class="text-right">R$ <?= number_format($item->valor, 2, ",",".");?></td>

                                            <td class="text-right">R$ <?= number_format($item->valor, 2, ",",".");?></td>

                                        </tr>

                                        <?php } ?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                        <?php } ?>

                        <div class="col-md-12">

                            <div class="pull-right m-t-30 text-right">

                                <p>Valor Total: R$ <?= number_format($valorTotal, 2, ",",".");?></p>

                                <hr>

                                <h3><b>Total :</b>R$ <?= number_format($valorTotal, 2, ",",".");?></h3> 

                            </div>

                            <div class="clearfix"></div>

                            <hr>

                            <div class="text-right">
                                <?php if($dados->row(0)->status == 0){ ?>
                                    <button class="btn btn-danger" id="btnConfirma"> Confirmar Pagamento </button>
                                <?php } ?>
                                <button id="print" class="btn btn-default hidden-print btn-outline" type="button"> 
                                    <span>
                                        <i class="fa fa-print"></i> Imprimir 
                                    </span> 
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- .row -->

    </div>

</div>
<script src="<?= base_url("assets/plugins/sweetalert/sweetalert.min.js");?>" type="text/javascript"></script>
<link href="<?= base_url("assets/plugins/sweetalert/sweetalert.css");?>" rel="stylesheet" type="text/css"/>
<script src="<?= base_url("assets/paginas/invoice.js");?>" type="text/javascript"></script>
<!-- /#page-wrapper -->