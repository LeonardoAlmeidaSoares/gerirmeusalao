<?php

function get_tipo_movimentacao($cod) {
    if ($cod == "ENT") {
        return "<span class='label label-info label-rouded'>ENTRADA</span>";
    } else {
        return "<span class='label label-danger label-rouded'>SAÍDA</span>";
    }
}
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Fluxo de Caixa</h4> </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("salao/fluxoCaixa"); ?>" 
                   class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">

                    <li class="active">Fluxo de Caixa</li>

                </ol>

            </div>

            <!-- /.col-lg-12 -->

        </div>

        <!-- /row -->

        <div class="row">

            <div class="col-sm-12">

                <div class="white-box">
                    <div class="row">
                        <div class="col-md-7 col-lg-9 col-sm-12 col-xs-12">
                            <h3 class="box-title m-b-0">Caixa
                                <p class="text-muted m-b-30">Listagem de Movimentações</p>
                            </h3>
                        </div>
                        
                        <div class="col-md-5 col-lg-3 col-sm-12 col-xs-12">
                            
                            <?php if ($caixa->codUsuarioFinal == 0) { ?>
                                <a href="<?= base_url("caixa/fechar"); ?>">
                                    <button class="btn btn-outline btn-warning" id="btn-fechar-caixa" style="width:100%;">FECHAR CAIXA</button>
                                </a>
                            <?php } else { ?>
                                <a href="#"  data-toggle="modal" data-target="#modalCadastro">
                                    <button class="btn btn-outline btn-success" id="btn-open-caixa" style="width:100%;">ABRIR CAIXA</button>
                                </a>
                            <?php } ?>
                            
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-7 col-lg-9 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <?php $valorTotal = 0; ?>
                                <table id="myTable" class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Colaborador</th>
                                            <th>Valor</th>
                                            <th>Tipo</th>
                                            <th>Horário</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($totalCaixa->result() as $item) { ?>
                                            <tr>
                                                <td><?= str_pad($item->codMovimentacao, 6, "0", STR_PAD_LEFT); ?></td>
                                                <td><?= $item->usuario; ?></td>
                                                <td>R$<?= number_format($item->valor, 2, ",", "."); ?></td>
                                                <td style="text-align: center;"><?= get_tipo_movimentacao($item->tipoMovimentacao, $item->valor); ?></td>
                                                <td><?= date("d/m/Y H:i", strtotime($item->HorarioMovimentacao)); ?></td>
                                            </tr>

                                            <?php
                                            if ($item->tipoMovimentacao == "ENT") {
                                                $valorTotal += $item->valor;
                                            }
                                            if ($item->tipoMovimentacao == "SAI") {
                                                $valorTotal -= $item->valor;
                                            }
                                            ?>
                                        <?php } ?> 
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Valor Total Em Caixa</th>
                                            <th colspan="2" style="text-align: right;">R$<?= number_format($valorTotal, 2, ",", "."); ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-3 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bg-theme m-b-15" style="background-color: #429238 !important;">
                                        <div class="row p-20">
                                            <div class="col-md-12 col-xs-12">
                                                <h3>
                                                    <b class="text-white">Total de Entradas</b>
                                                </h3>
                                                <sup style="float: right; color:#fff;"><?= date("d/m/Y"); ?></sup>
                                                <center>
                                                    <h1 class="text-white">
                                                        <sup>
                                                            <small>R$</small>
                                                        </sup>
                                                        <b><?= number_format(array_sum(array_column($totalEntradasHoje->result_array(), 'valor')), 2, ",", "."); ?></b>
                                                    </h1>
                                                </center>
                                                <p class="text-white"><?= strtoupper($_SESSION["empresa"]->nome); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="bg-theme m-b-15" style="background-color:#d92020 !important;">
                                        <div class="row p-20">
                                            <div class="col-md-12 col-xs-12">
                                                <h3>
                                                    <b class="text-white">Total de Saídas</b>
                                                </h3>
                                                <sup style="float: right; color:#fff;"><?= date("d/m/Y"); ?></sup>
                                                <center>
                                                    <h1 class="text-white">
                                                        <sup>
                                                            <small>R$</small>
                                                        </sup>
                                                        <b><?= number_format(array_sum(array_column($totalSaidasHoje->result_array(), 'valor')), 2, ",", "."); ?></b>
                                                    </h1>
                                                </center>
                                                <p class="text-white"><?= strtoupper($_SESSION["empresa"]->nome); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="POST" action="<?= base_url("caixa/abrir"); ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel1">Abrir Caixa</h4> 
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Valor Inicial:</label>
                            <input type="text" style="color: #000;" class="form-control" name="valor_inicial" id="valor_inicial"> 
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Observações:</label>
                            <textarea class="form-control" name="mensagem" id="mensagem"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-default" data-dismiss="modal" value="Fechar" />
                        <input type="submit" class="btn btn-primary" value="Abrir Caixa" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= base_url("assets/plugins/ckeditor/ckeditor.js"); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url("assets/paginas/fluxo_caixa.js"); ?>"></script>