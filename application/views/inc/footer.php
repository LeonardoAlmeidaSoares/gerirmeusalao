<footer class="footer text-center"> 2018 &copy; Gerir Meu Salão
	<center>
        <a target="_blank" href="http://www.lpsistemas.info">
            <!--img src="<?= base_url("assets/img/identidade.png");?>" class="img-responsive" style="width: 48px;" /-->
        </a>
    </center>
</footer>
		
</div>

<!-- /#page-wrapper -->

</div>    

<!-- Menu Plugin JavaScript -->

<!-- Datatables -->

<script src="<?= base_url("assets/plugins/datatables/media/js/jquery.dataTables.js"); ?>" type="text/javascript"></script>

<link href="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.css"); ?>" rel="stylesheet" type="text/css" />

<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />


<script src="<?= base_url("assets/plugins/sidebar-nav/dist/sidebar-nav.min.js"); ?>"></script>

<!--slimscroll JavaScript -->

<script src="<?= base_url("assets/js/jquery.slimscroll.js"); ?>"></script>

<!--Wave Effects -->

<script src="<?= base_url("assets/js/main.js"); ?>"></script>

<!--Wave Effects -->

<script src="<?= base_url("assets/js/waves.js"); ?>"></script>

<!-- Custom Theme JavaScript -->

<script src="<?= base_url("assets/js/custom.js"); ?>"></script>


<br><br>
<div id="modal-cadastro-compromisso" class="modal fade" tabindex="-1" 
			role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog-lg" style="margin-top: 25px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Cadastro de Consulta</h4> 
            </div>
            <div class="modal-body">
                <form id="frmCadAgendaExpress" method="POST" action="#">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Servico:</label>
                                    <input name="txtNomeServico" type="text" class="form-control" id="recipient-name"> 
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Cliente:</label>
                                    <input type="text" class="form-control" id="recipient-name"> 
                                </div>
                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">

                            <div id="calendarioCadastro"></div>

                        </div>

                    </div>
                   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
            </div>
        </div>
    </div>
</div> 

</body>



</html>

