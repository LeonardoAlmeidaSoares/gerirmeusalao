<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Agenda</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" 
                    class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>
                <ol class="breadcrumb">
                    <li class="active">Agenda</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <?php foreach ($funcionarios->result() as $item) { ?>
                    <div class="lnk-sel-func col-xs-12 col-sm-6 col-md-4 col-lg-3" id="divFunc<?= $item->codFuncionario; ?>"  codFunc="<?= $item->codFuncionario; ?>">
                        <a class="" style="border-width:5px; width:100%;cursor: pointer; text-decoration: none; border-radius: 10px;">
                            
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 text-center">
                                            <img src="<?= $item->imagem; ?>" alt="user" style="height: 70px;margin-top: 10px;" class="img-circle img-responsive">
                                        </div>
                                        <div class="col-md-8 col-sm-8">
                                            <h3 class="box-title m-b-0"><?= $item->nome; ?></h3> 
                                            <small><?= $item->cargo; ?></small>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="white-box">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="white-box col-xs-12 col-md-12 col-sm-12 col-lg-12" id="modalCadastro">
            <img id="btnClose" src="<?= base_url("assets/img/img_close.png");?>" style="float: right;margin-top: -40px;margin-right: -40px;cursor: pointer;"/>
            <div class="col-xs-12 col-md-12">
                <form action="<?= base_url("index.php/agenda/cadastrar");?>" method="POST" >
                    <input type="hidden" name="txtCodFunc" id="txtCodFunc" />
                    <div class="row">
                        <div class="col-xs-2 col-md-2"></div>
                        <div class="col-md-8">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-12" for="txtNome">Cliente</label>
                                    <div class="col-md-12 tt-dropdown-menu ">
                                        <input class="form-control form-control-line typeahead" placeholder="Selecione o Cliente" type="text" name="txtCliente" id="txtCliente" style="width: 100%;"/>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-md-12" for="txtNome">Horário</label>
                                <div class="col-md-12">
                                    <select id="txtHorario" class="form-control form-control-line " name="txtHorario" ></select>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                 <label class="col-md-12" for="txtNome">Serviço</label>
                                <div class="col-md-12">
                                    <select id="txtServico" class="form-control form-control-line " name="txtServico"></select>
                                </div>
                            </div>
                            <br><Br>
                            <div class="col-md-12" style="margin-top: 25px;">
                                <input type="submit" id="btnFinalServico" class="btn btn-info" value="Salvar"/> 
                                <input type="reset" id="btnRetirarServico" class="btn btn-danger" />
                            </div>
                        </div>
                    </div>
                </form>
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
        <script src='<?= base_url("assets/plugins/calendar/dist/fullcalendar.js"); ?>'></script>
        <script src="<?= base_url("assets/plugins/typehead/typeahead.bundle.js"); ?>" type="text/javascript"></script>
        <link href="<?= base_url("assets/plugins/bootstrap-switch/bootstrap-switch.min.css");?>" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url("assets/plugins/bootstrap-switch/bootstrap-switch.min.js");?>" type="text/javascript"></script>
        <script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js"); ?>" type="text/javascript"></script>
        <link href="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.css"); ?>" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?= base_url("assets/plugins/jquery.blockUI.js");?>"></script>
        <script src="<?= base_url("assets/paginas/agenda_teste.js"); ?>" type="text/javascript"></script>
    </div>
</div>

<style>
    .blockMsg  {
        top: 10% !important; 
        left: 25% !important;
        width: 50% !important;
    }
</style>