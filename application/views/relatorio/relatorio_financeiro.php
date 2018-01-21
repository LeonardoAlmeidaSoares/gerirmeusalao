<?php

$listaMeses = array(

    "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"

);

?>

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Perfil do Cliente</h4> </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><span class=" icon-menu"></span> Caixa</a>

                <ol class="breadcrumb">

                    <li><a href="<?= base_url("index.php/cliente/"); ?>">Clientes</a></li>

                    <li class="active">Rendimento Mensal</li>

                </ol>

            </div>

        </div>

        <!-- /.row -->



        <div class="row">

            <div class="col-md-6 col-lg-6 col-sm-12">

                <div class="white-box">

                    <h3 class="box-title">Recent Comments</h3>

                    <!--div class="comment-center">

                        <div class="comment-body">

                            <div class="user-img"> 

                                <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle">

                            </div>

                            <div class="mail-contnet">

                                <h5>Pavan kumar</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.</span> <span class="label label-rouded label-info">PENDING</span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2017</span></div>

                        </div>

                        <div class="comment-body">

                            <div class="user-img"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> </div>

                            <div class="mail-contnet">

                                <h5>Sonu Nigam</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.</span><span class="label label-rouded label-success">APPROVED</span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2017</span></div>

                        </div>

                        <div class="comment-body">

                            <div class="user-img"> <img src="../plugins/images/users/arijit.jpg" alt="user" class="img-circle"> </div>

                            <div class="mail-contnet">

                                <h5>Arijit Sinh</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. </span><span class="label label-rouded label-danger">REJECTED</span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2017</span></div>

                        </div>

                        <div class="comment-body b-none">

                            <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"></div>

                            <div class="mail-contnet">

                                <h5>Pavan kumar</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.</span> <span class="label label-rouded label-info">PENDING</span> <a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2017</span></div>

                        </div>

                    </div-->

                </div>

            </div>

            

            <?php $lastMonth = "";?>

            

            <div class="col-md-6 col-lg-6 col-sm-12">

                <div class="white-box">

                    <h3 class="box-title">Mês Atual

                        <div class="col-md-3 col-sm-4 col-xs-6 pull-right">

                            <select class="form-control pull-right row b-none">

                                <option>SELECIONE O MÊS</option>

                                <?php foreach ($entradas->result() as $item) { 

                                    if($lastMonth != $item->Mes . "/" . $item->Ano){

                                        $lastMonth = $item->Mes . "/" . $item->Ano;?>

                                    <option value="<?= $lastMonth;?>"><?= $listaMeses[$item->Mes - 1] . "/" . $item->Ano; ?> </option>

                                <?php }} ?>

                            </select>

                        </div>

                    </h3>



                    <?php $arrRendimentos = $entradas->result_array(); ?>



                    <div class="row sales-report">

                        <div class="col-md-6 col-sm-6 col-xs-6">

                            <h2><?= $listaMeses[$arrRendimentos[count($arrRendimentos) - 1]["Mes"] - 1] . " de " . $item->Ano; ?></h2>

                            <p>RELATÓRIO FINANCEIRO</p>

                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6 ">

                            <h1 class="text-right text-success m-t-20">R$ <?= number_format($item->total, 2, ',',".");?></h1> 

                        </div>

                    </div>

                    <div class="table-responsive">

                        <table class="table" id="table">

                            <?php if($_SESSION["permissoes"]->perm_verRelatorios >= 1){ ?>

                            <thead>

                                <tr>

                                    <th>QUANTIDADE</th>

                                    <th>SERVIÇO</th>

                                    <th>VALOR</th>

                                    <th>TOTAL</th>

                                    <th>VER</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach ($servicos->result() as $item) { ?>

                                    <tr>

                                        <td><?= str_pad($item->qtd, 4, "0", STR_PAD_LEFT); ?></td>

                                        <td class="txt-oflo"><?= $item->servico; ?></td>

                                        <td><span class="text-success">R$ <?= number_format($item->valorComum, 2, ",", "."); ?></span></td>

                                        <td><span class="label label-success label-rouded">R$ <?= number_format(($item->qtd * $item->valorComum), 2, ",", "."); ?></span></td>

                                        <td><span class="pointer glyphicon glyphicon-eye-open"></span></td>

                                    </tr>

                                <?php } ?>

                            </tbody>

                            <?php } else{  ?>

                            <thead>

                                <tr>

                                    <th>QUANTIDADE</th>

                                    <th>SERVIÇO</th>

                                    <th>VALOR</th>

                                    <th>TOTAL</th>

                                    <th>VER</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach ($servicos->result() as $item) { ?>

                                    <tr>

                                        <td><?= str_pad($item->qtd, 4, "0", STR_PAD_LEFT); ?></td>

                                        <td class="txt-oflo"><?= $item->servico; ?></td>

                                        <td><span class="text-success">R$ <?= number_format($item->valorComum, 2, ",", "."); ?></span></td>

                                        <td><span class="label label-success label-rouded">R$ <?= number_format(($item->qtd * $item->valorComum), 2, ",", "."); ?></span></td>

                                        <td><span class="pointer glyphicon glyphicon-eye-open"></span></td>

                                    </tr>

                                <?php } ?>

                            </tbody>

                            

                            <?php } ?>

                            

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js"); ?>" type="text/javascript"></script>

<link href="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.css"); ?>" rel="stylesheet" type="text/css" />

<script src="<?= base_url("assets/paginas/relatorio_mensal.js");?>" type="text/javascript"></script>