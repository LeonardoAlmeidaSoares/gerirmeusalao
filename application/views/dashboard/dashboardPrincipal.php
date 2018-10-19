<?php $codBorda = array("rgba(1, 192, 200, 0.4)", "rgba(255,0,0,0.4)", "rgba(0,0,255,0.4)"); ?> 

<!-- Page Content -->

<div id="page-wrapper">

    <div class="container-fluid">
	
        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Página Principal</h4>

            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <a href="<?= base_url("salao/fluxoCaixa");?>" 
                    class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">

                    <li><a href="#">Dashboard</a></li>

                    <li class="active">Página Principal</li>

                </ol>

            </div>

            <!-- /.col-lg-12 -->

        </div>

        <div class="row">

            <div class="col-md-12">



                <h3 class="box-title">Dados</h3>



                <div class="row">

                    <div class="col-md-12 col-lg-12 col-sm-12">

                        <div class="white-box">

                            <div class="row row-in">

                                <div class="col-lg-4 col-md-4 col-sm-4 row-in-br" id="click-link-todos-clientes">

                                    <div class="col-in row">

                                        <div class="col-md-6 col-sm-6 col-xs-6"> 

                                            <i class="ti-user" style="color:#ff911b;"></i>

                                            <h5 class="text-muted vb">QUANTIDADE DE CLIENTES</h5> 

                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-6">

                                            <h3 class="counter text-right m-t-15" style="color:#ff911b;"><?= $totalClientes; ?></h3> 

                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="progress">

                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">40% Complete (success)</span> </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 row-in-br  b-r-none" id="click-link-agenda-hoje">

                                    <div class="col-in row">

                                        <div class="col-md-6 col-sm-6 col-xs-6"> 

                                            <i class="ti-pencil-alt text-info"></i>

                                            <h5 class="text-muted vb">AGENDA PARA HOJE</h5> </div>

                                        <div class="col-md-6 col-sm-6 col-xs-6">

                                            <h3 class="counter text-right m-t-15 text-info"><?= $proximosCompromissos->num_rows(); ?></h3> </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="progress">

                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">40% Complete (success)</span> </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 row-in-br" id="click-link-aniversariantes">

                                    <div class="col-in row">

                                        <div class="col-md-6 col-sm-6 col-xs-6"> 

                                            <i class="ti-gift" style="color:#c5259c" ></i>

                                            <h5 class="text-muted vb">CLIENTES ANIVERSARIANTES</h5> 

                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-6">

                                            <h3 class="counter text-right m-t-15" style="color:#c5259c"><?= $aniversariantes; ?></h3> 

                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="progress">

                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">40% Complete (success)</span> </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 row-in-br" id="click-link-lembretes-hoje">

                                    <div class="col-in row">

                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="ti-receipt" style="color:#ffd21f;"></i>

                                            <h5 class="text-muted vb">LEMBRETES DE HOJE</h5> </div>

                                        <div class="col-md-6 col-sm-6 col-xs-6">

                                            <h3 class="counter text-right m-t-15" style="color:#ffd21f;"><?= $mensagensParaHoje; ?></h3> 

                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="progress">

                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">40% Complete (success)</span> </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 row-in-br" id="click-link-vencendo-hoje">

                                    <div class="col-in row">

                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="ti-wallet text-purple"></i>

                                            <h5 class="text-muted vb">VENCENDO HOJE</h5> </div>

                                        <div class="col-md-6 col-sm-6 col-xs-6">

                                            <h3 class="counter text-right m-t-15 text-purple"><?= $vencimentosVencendoHoje;?></h3> 

                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="progress">

                                                <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">40% Complete (success)</span> </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 row-in-br" id="click-link-recebendo-hoje">

                                    <div class="col-in row">

                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="ti-money text-inverse"></i>

                                            <h5 class="text-muted vb">RECEBENDO HOJE</h5> </div>

                                        <div class="col-md-6 col-sm-6 col-xs-6">

                                            <h3 class="counter text-right m-t-15 text-inverse"><?= $vencimentosRecebendoHoje;?></h3> 

                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="progress">

                                                <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">40% Complete (success)</span> </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <h3 class="box-title">Próximos Compromissos</h3>

                <div class="white-box">

                    <table id="myTable">

                        <thead>

                            <tr>

                                <th>Horário</th>

                                <th>Cliente</th>

                                <th>Serviço</th>

                                <th>Funcionário</th>

                                <th>Ações</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($proximosCompromissos->result() as $item) { ?>

                                <tr>

                                    <td><?= date_format(date_create($item->horario), 'd/m/Y H:i') ?></td>

                                    <td><?= $item->cliente; ?></td>

                                    <td><?= $item->serviço; ?></td>

                                    <td><?= $item->funcionario; ?></td>

                                    <td>

                                        <?php if ($item->status == 0) { ?>

                                            <button class="btn btn-circle btn-success btnStart" title="Abrir Atendimento" codFuncionario="<?= $item->codFuncionario; ?>" codCompromisso = "<?= $item->codCompromisso; ?>"><i class="fa fa-bell-o"></i></button>

                                        <?php } ?>

                                        <?php if ($item->status == 0) { ?>

                                            <button class="btn btn-circle btn-danger btnCancel" title="Cancelar Atendimento" codFuncionario="<?= $item->codFuncionario; ?>" codCompromisso = "<?= $item->codCompromisso; ?>"><i class="fa fa-ban"></i></button>

                                        <?php } ?>



                                        <button class="btn btn-circle btn-warning btnFinish <?= ($item->status == 0) ? "hid" : ""; ?>" title="Finalizar Atendimento" codFuncionario="<?= $item->codFuncionario; ?>" codCompromisso = "<?= $item->codCompromisso; ?>"><i class="fa fa-stop-circle"></i></button>

                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>



        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <h3 class="box-title">Situação dos Colaboradores</h3>

                <div class="row">
                   
                <?php foreach ($colaboradores->result() as $item) { ?>

                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-4" id="divFunc<?= $item->codFuncionario; ?>">

                        <div class="white-box" style="background: url('<?= base_url("assets/img/fundo_selecionado2.jpg");?>');border-width:3px; border-style:groove; border-radius: 10px; border-color: <?= $codBorda[$item->status]; ?>">

                            <div class="row">

                                <div class="col-md-4 col-sm-4 text-center">

                                    <a href="#">
                                       <img src="<?= base_url($item->imagem); ?>" alt="user" style="height: 75px; width:100%; margin-top: 10px;" class="img-circle img-responsive">
                                    </a>

                                </div>

                                <div class="col-md-8 col-sm-8">

                                    <h3 class="box-title m-b-0"><i class="icon-user p-r-10"></i><?= (empty($item->apelido))?$item->nome:$item->apelido; ?></h3> 
                                    <small><?= $item->cargo; ?></small>

                                    <p></p>

                                    <address class="address">

                                        <?php

                                        switch ($item->status) {

                                            case 0:

                                                echo "<span style='color:green;'>LIVRE";

                                                break;

                                            case 1:

                                                echo "OCUPADO(A)";

                                                break;

                                            case 2:

                                                echo "AUSENTE";

                                                break;

                                        }

                                        ?>

                                    </address> 

                                    <span title="Phone"><i class="icon-phone p-r-5"></i></span> 

                                        <?= $item->telefone; ?>


                                </div>

                            </div>

                        </div>

                    </div>

                <?php } ?>

                </div>

            </div>

        </div>



        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <h3 class="box-title">Dados</h3>

                <div class="col-xs-12 col-sm-12 col-md-6 col-xs-6">

                    <div id="graf1"></div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-xs-6">

                    <div id="graf2"></div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

</div>

<!-- /.container-fluid -->



<script>

    var dataGraf1 = [];

<?php foreach ($compromissosUltimoAno->result() as $item) { ?>

        dataGraf1.push({

            name: '<?= ($item->Mes < 10) ? "0" . $item->Mes : $item->Mes; ?>',

            y: <?= $item->qtd; ?>,

            drilldown: '<?= ($item->Mes < 10) ? "0" . $item->Mes : $item->Mes; ?>'

        });

<?php } ?>



    var dataGraf2 = [];

<?php foreach ($servicosPrestadosUltimoMes->result() as $item) { ?>

        dataGraf2.push({

            name: '<?= $item->servico; ?>',

            y: <?= $item->qtd; ?>

        });

<?php } ?>

</script>

<script src="https://code.highcharts.com/highcharts.src.js"></script>

<script src="<?= base_url("assets/paginas/dashboard.js"); ?>" type="text/javascript"></script>

