<!-- Page Content -->
<?php $valorTotal = 0;
$valorPagamento = 0;
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Rendimentos de Funcionário</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa"); ?>" 
                   class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">

                    <li><a href="<?= base_url(); ?>">Início</a></li>

                    <li class="active">Rendimentos de Funcionário</li>

                </ol>

            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
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
                                    <h3><?= $dados->row(0)->nome; ?></h3>
                                    <p>
                                        <b>Mês Referente:</b> 
                                        <i class="fa fa-calendar"></i> <?= str_replace("-","/",$mes);?>
                                    </p>
                                </address> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40">
                                <table class="table table-hover">
                                    <thead>

                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Descrição</th>
                                            <th class="text-center">Cliente</th>
                                            <th class="text-right">Valor Total</th>
                                            <th class="text-right">Valor Referente</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php foreach ($dados->result() as $item) { ?>
                                            <tr>
                                                <td class="text-center"><?= str_pad($item->codNotaEntrada, 6, "0", STR_PAD_LEFT); ?></td>
                                                <td><?= $item->descricao; ?></td>
                                                <td class="text-center"><?= $item->nome; ?></td>
                                                <td class="text-right">R$ <?= number_format($item->valor, 2, ",", "."); ?></td>
                                                <td class="text-right">
                                                    <?= "R$ " . number_format((($item->formaPagto == "DINHEIRO") ? $item->valor * $dadosFuncionario->row(0)->comissaoDinheiro / 100 : $item->valor * $dadosFuncionario->row(0)->comissaoCartao / 100
                                                            ), 2, ",", ".");
                                                    ?>
                                                </td>
                                            </tr>

                                            <?php $valorTotal += $item->valor; ?>
                                            <?php
                                            $valorPagamento += ($item->formaPagto == "DINHEIRO") ? $item->valor * $dadosFuncionario->row(0)->comissaoDinheiro / 100 : $item->valor * $dadosFuncionario->row(0)->comissaoCartao / 100;
                                            ?>
<?php } ?>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <p>Valor Total: <?= "R$ " . number_format($valorTotal, 2, ",", "."); ?></p>
                                <hr>
                                <h3><b>Total :</b> <?= "R$ " . number_format($valorPagamento, 2, ",", "."); ?></h3> 
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-right">
                                <button onClick="javascript:window.print();" class="btn btn-default btn-outline" type="button"> 
                                    <span>
                                        <i class="fa fa-print"> IMPRIMIR</i>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .row -->
<!-- /.row -->