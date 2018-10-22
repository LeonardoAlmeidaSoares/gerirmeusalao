<!-- Page Content -->
<?php $valorTotal = 0; ?>

<input type="hidden" id="codNota" name="codNota" value="<?= str_pad($caixa->codCaixa, 8, "0", STR_PAD_LEFT); ?>" />

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Comprovante de pagamento</h4> 

            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa"); ?>" 
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

                        <b>FECHAMENTO DE CAIXA</b> 

                        <span class="pull-right">#<?= str_pad($caixa->codCaixa, 8, "0", STR_PAD_LEFT); ?></span>

                    </h3>

                    <hr>

                    <div class="row">

                        <?php if ($movimentacoes->num_rows() > 0) { ?>



                            <div class="col-md-12">

                                <div class="table-responsive m-t-40" style="clear: both;">

                                    <table class="table table-hover">

                                        <thead>

                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Valor</th>
                                                <th class="text-center">Tipo</th>
                                                <th class="text-center">Total</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            $count = 0;
                                            foreach ($movimentacoes->result() as $item) {

                                                if ($item->tipoMovimentacao == "SAI") {
                                                    $valorTotal -= $item->valor;
                                                } else {
                                                    $valorTotal += $item->valor;
                                                }

                                                $class = ($item->tipoMovimentacao == "SAI") ? "danger" : "success";
                                                ?>
                                                <tr  class="<?= $class; ?>">

                                                    <td class="text-center"><?= str_pad($item->codMovimentacao, 6, "0", STR_PAD_LEFT); ?></td>
                                                    <td class="text-center">R$ <?= number_format($item->valor, 2, ",", "."); ?></td>

                                                    <td class="text-center">
                                                        <?=
                                                        ($item->tipoMovimentacao == "SAI") ? "<span class='label label-danger'>SAÍDA</span>" : "<span class='label label-success'>ENTRADA</span>";
                                                        ?>
                                                    </td>


                                                    <td class="text-center">R$ <?= number_format($valorTotal, 2, ",", "."); ?></td>

                                                </tr>

                                            <?php } ?>

                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th colspan="2" class="text-left">
                                                    Entrada do Caixa Anterior: R$<?= number_format($caixa->valorInicio, 2, ",", "."); ?>
                                                </th>

                                                <th colspan="2" class="text-right">
                                                    Saldo de Movimentações: R$ 
                                                    <span class="spn-valor">
                                                        <?= number_format($valorTotal, 2, ",", "."); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </tfoot>

                                    </table>

                                </div>

                            </div>
                        <?php } ?>

                        <div class="col-md-12">

                            <div class="pull-right m-t-30 text-right">

                                <h3>
                                    <b>VALOR TOTAL EM CAIXA:</b>
                                    R$ <?= number_format($valorTotal, 2, ",", "."); ?>
                                </h3> 
                            </div>

                            <hr>
                            <br /><br />
                            <div class="text-right">
                                
                                <a href="#">
                                    <button class="btn btn-danger" id="btnConfirma"> Fechar Caixa </button>
                                </a>
                                
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

<form id="frm-submit" method="POST" action="<?= base_url("caixa/finalizar");?>">
    <input type="hidden" value="<?= $valorTotal;?>" name="valorTotal" />
    <input type="hidden" value="<?= $caixa->codCaixa;?>" name="codCaixa" />
    <input type="hidden" value="" name="obs" />
</form>

<script src="<?= base_url("assets/plugins/sweetalert/sweetalert.min.js"); ?>" type="text/javascript"></script>
<link href="<?= base_url("assets/plugins/sweetalert/sweetalert.css"); ?>" rel="stylesheet" type="text/css"/>
<script src="<?= base_url("assets/paginas/fechar_caixa.js"); ?>" type="text/javascript"></script>
<!-- /#page-wrapper -->