<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Agenda</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><span class=" icon-menu"></span> Caixa</a>
                <ol class="breadcrumb">
                    <li class="active">Agenda</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-3 col-xs-12 col-sm-12 col-lg-3">
                <div class="white-box">
                    <a href="#" class="btn btn-custom btn-block waves-effect waves-light">Funcionários</a>
                    <div class="list-group mail-list m-t-20"> 
                        <a href="#" class="list-group-item list-func active" codFunc="0">Todos</a> 
                        <?php foreach ($funcionarios->result() as $item) { ?>
                            <a href="#" class="list-group-item list-func" codFunc="<?= $item->codFuncionario; ?>"><?= $item->nome; ?></a> 
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-xs-12 col-sm-12 col-lg-">
                <div class="white-box">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- BEGIN MODAL -->
        <div class="modal fade none-border" id="my-event">
            <div class="modal-dialog modal-lg" style="margin-top: 150px;">
                <div class="modal-content">
                    <form action="<?= base_url("index.php/agenda/cadastrar/"); ?>" method="POST" class="form-material">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Novo Compromisso</strong></h4>
                        </div>
                        <div class="modal-body">

                            <div class="col-xs-12 col-md-12">

                                <input type="hidden" name="txtCodFunc" id="txtCodFunc" />                                

                                <div class="row">

                                    <div class="col-md-8">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-12" for="txtNome">Cliente</label>
                                                <div class="col-md-12 tt-dropdown-menu ">
                                                    <input class="form-control form-control-line typeahead" placeholder="Selecione o Cliente" type="text" name="txtCliente" style="width: 100%;"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-12" for="txtNome">Funcionário</label>
                                                <div class="col-md-12">
                                                    <input type="text" readonly="" class="form-control form-control-line"  id="lblNomeFuncionario" value="" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--div class="separator"></div-->

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-12" for="txtNome">Horário</label>
                                                <div class="col-md-12">
                                                    <select id="txtHorario" class="form-control form-control-line " name="txtHorario" id="txtHorario"></select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="separator"></div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label class="col-md-12" for="txtNome">Serviço</label>
                                                <div class="col-md-12">
                                                    <select id="txtServico" class="form-control form-control-line " name="txtServico"></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hidden-xs hidden-sm col-md-4 col-lg-4">
                                        <img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=Cliente&w=256&h=256" id="imgCliente"
                                             width="256px" height="256px" class="imgCliente" />
                                        
                                        <br>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label class="col-md-12" for="txtNome">Valor Cobrado</label>
                                                <div class="col-md-12">
                                                    <input id="txtValor" type="checkbox"  class="radio-switch bootstrap-switch-info my-check" checked="" name="txtValor"></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                                <div class="col-xs-3 col-md-3 col-lg-3 col-sm-3">
                                    <!--input type="checkbox" name="chkAllDay" id="chkAllDay" /> Dia Inteiro-->
                                </div>
                                <div class="col-xs-9 col-md-9 col-lg-9 col-sm-9">
                                    <input type="button" class="btn btn-warning pull-right" data-dismiss="modal" value="Fechar" />
                                    <input type="submit" class="btn btn-success save-event waves-lights pull-right" id="btnCreateEvent" value="Agendar" />
                                    <input type="button" class="btn btn-danger delete-event waves-light pull-right" data-dismiss="modal" id="btnDeleteEvent" value="Apagar" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="<?= base_url("assets/plugins/sweetalert/sweetalert.min.js"); ?>" type="text/javascript"></script>
        <link href="<?= base_url("assets/plugins/sweetalert/sweetalert.css"); ?>" rel="stylesheet" type="text/css"/>
        <script>
            var events = [];
                <?php foreach ($compromissos->result() as $item) { ?>
                evt = {
                    title: '<?= $item->descricao; ?>',
                    allDay: <?= (intval($item->diaInteiro) == 1) ? 'true' : 'false'; ?>,
                    start: '<?= $item->horario; ?>',
                    end: '<?= $item->dataFim; ?>',
                    codFuncionario: <?= $item->codFuncionario; ?>,
                    id: <?= $item->codCompromisso; ?>
                };
                events.push(evt);
            <?php } ?>
            var clients = [];
            <?php foreach ($clientes->result() as $item) { ?>
                clients.push("<?= $item->nome; ?>");
            <?php } ?>
        </script>
        <!-- Calendar JavaScript -->

        <link rel="stylesheet" href="<?= base_url("assets/plugins/calendar/dist/fullcalendar.min.css"); ?>" type="text/css" />
        <script src="<?= base_url("assets/plugins/moment/moment.js"); ?>"></script>
        <script src="<?= base_url("assets/plugins/calendar/jquery-ui.min.js"); ?>"></script>
        <script src="<?= base_url("assets/plugins/calendar/dist/locale/pt-br.js"); ?>" type="text/javascript"></script>
        <script src='<?= base_url("assets/plugins/calendar/dist/fullcalendar.min.js"); ?>'></script>
        <script src="<?= base_url("assets/plugins/typehead/typeahead.bundle.js"); ?>" type="text/javascript"></script>
        <link href="<?= base_url("assets/plugins/bootstrap-switch/bootstrap-switch.min.css");?>" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url("assets/plugins/bootstrap-switch/bootstrap-switch.min.js");?>" type="text/javascript"></script>
        <script src="<?= base_url("assets/paginas/agenda.js"); ?>" type="text/javascript"></script>
    </div>
</div>