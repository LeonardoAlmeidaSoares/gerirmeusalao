<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Cadastrar Atendimento</h4> 
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa"); ?>" 
                   class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>
                <ol class="breadcrumb">

                    <li><a href="<?= base_url(); ?>">Início</a></li>

                    <li class="active">Cadastrar Atendimento</li>

                </ol>

            </div>

            <!-- /.col-lg-12 -->

        </div>

        <form id="frmCad" enctype="multipart/form-data" class="form-material form-horizontal" 

              method="POST" action="<?= base_url("index.php/agenda/cadastro_rapido/"); ?>">

            <div class="row">

                <div class="col-sm-12 col-lg-6 col-xs-12 col-md-6">

                    <div class="white-box">

                        <h3 class="box-title">Informações de Cadastro</h3>                    

                        <div class="form-group">

                            <label class="col-md-12" for="txtDescricao">Nome do Cliente</label>

                            <div class="col-md-12">
                                <select id="txtCodCliente" name="txtCodCliente" class="form-control select2">
                                    <option selected hidden value="">Selecione o Cliente</option>
                                    <?php foreach ($clientes->result() as $item) { ?>
                                        <option value="<?= $item->codCliente; ?>"><?= $item->nome; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-12" for="txtDescricao">Colaborador</label>

                            <div class="col-md-12">

                                <select class="form-control select2" id="txtCodColaborador" name="txtCodColaborador">
                                    <option value="" selected hidden>Selecione o Colaborador</option>
                                    <?php foreach ($funcionarios->result() as $item) { ?>
                                        <option value="<?= $item->codFuncionario; ?>"><?= $item->nome; ?></option>
                                    <?php } ?>
                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-12" for="txtDescricao">Serviço</label>

                            <div class="col-md-12">

                                <select class="form-control select2" id="txtServico" name="txtServico">
                                    <option value="" selected hidden>Selecione o Serviço</option>
                                    <?php foreach ($servicos->result() as $item) { ?>
                                        <option value="<?= $item->codServico; ?>"><?= $item->descricao; ?></option>
                                    <?php } ?>
                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-12" for="txtDescricao">Horario</label>

                            <div class="col-md-12">

                                <input type="text" class="form-control" id="txtHorario" name="txtHorario">            
                                </input>

                            </div>

                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success pull-right" value="Cadastrar" />
                        </div>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="white-box">
                        <div id="calendarioCadastro"></div>
                    </div>
                </div>

            </div>

        </form>

    </div>

</div>
<script src="<?= base_url("assets/plugins/zebra-datepicker/dist/zebra_datepicker.min.js"); ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/plugins/select2/js/select2.full.min.js"); ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/plugins/moment/moment.js"); ?>"></script>
<script src="<?= base_url("assets/plugins/calendar/jquery-ui.min.js"); ?>"></script>
<script src="<?= base_url("assets/plugins/calendar/dist/locale/pt-br.js"); ?>" type="text/javascript"></script>
<script src='<?= base_url("assets/plugins/calendar/dist/fullcalendar.js"); ?>'></script>
<script src="<?= base_url("assets/plugins/jquery.validate.js"); ?>"></script>
<script src="<?= base_url("assets/paginas/cadastro_agenda.js"); ?>"></script>

<link href="<?= base_url("assets/plugins/zebra-datepicker/dist/css/bootstrap/zebra_datepicker.min.css"); ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url("assets/plugins/select2/css/select2.min.css"); ?>" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?= base_url("assets/plugins/datetimepicker-master/jquery.datetimepicker.css"); ?>" type="text/css" />
<link rel="stylesheet" href="<?= base_url("assets/plugins/calendar/dist/fullcalendar.min.css"); ?>" type="text/css" />

