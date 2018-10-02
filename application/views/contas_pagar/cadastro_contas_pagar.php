<!-- Page Content -->

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Cadastrar Saída</h4> </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" 
                    class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">

                    <li><a href="<?= base_url(); ?>">Início</a></li>

                    <li class="active">Cadastrar Nota de Saída</li>

                </ol>

            </div>

            <!-- /.col-lg-12 -->

        </div>

        <form id="frmCad" enctype="multipart/form-data" class="form-material form-horizontal" method="POST" action="<?= base_url("index.php/contasPagar/realizar_cadastro/"); ?>">
            <input type="hidden" name="txtDescontaCaixa" id="txtDescontaCaixa" value="0">
            <div class="row">

                <div class="col-sm-12">

                    <div class="white-box">

                        <h3 class="box-title">Informações de Cadastro</h3>

                        <div class="form-group">

                            <label class="col-md-12" for="txtValor">Valor</label>

                            <div class="col-md-12">

                                <input type="text" id="txtValor" name="txtValor" class="form-control" placeholder="Insira Valor"> 

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-12" for="txtVencimento">Data de Vencimento</label>

                            <div class="col-md-12">

                                <input type="text" id="txtVencimento" name="txtVencimento" value="<?=date("d/m/Y");?>" class="form-control" placeholder="Insira a data de Vencimento"> 

                            </div>

                        </div>

                        

                        <div class="form-group">

                            <label class="col-md-12" for="txtCategoria">Tipo de Saída</label>

                            <div class="col-md-12">

                                <select id="txtCategoria" name="txtCategoria" class="form-control">

                                    <option value="0" selected hidden >Selecione o Serviço Prestado</option>

                                    <?php foreach($categorias->result() as $item){ ?>

                                        <option value="<?= $item->codcategoriaSaida;?>"><?= $item->descricao;?></option>

                                    <?php } ?>

                                </select>

                            </div>

                        </div>

                        

                        <div class="form-group">

                            <label class="col-md-12" for="txtStatus">Status</label>

                            <div class="col-md-12">

                                <select id="txtStatus" name="txtStatus" class="form-control">

                                    <option value="#" selected hidden>Selecione o Status do Pagamento</option>

                                    <option value="0">Pendente</option>

                                    <option value="1">Pago</option>

                                </select>

                            </div>

                        </div>

                        

                        <div class="form-group">

                            <label class="col-md-12" for="txtDiscriminacao">Discriminação</label>

                            <div class="col-md-12">

                                <textarea id="txtDiscriminacao" name="txtDiscriminacao" ></textarea>

                            </div>

                        </div>



                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Cadastrar</button>

                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Apagar</button>

                    </div>

                </div>

            </div>

        </form> 

    </div>

    

    <script src="<?= base_url("assets/plugins/ckeditor/ckeditor.js"); ?>" type="text/javascript"></script>

    <script src="<?= base_url("assets/plugins/mask-plugin/dist/jquery.mask.min.js"); ?>" type="text/javascript"></script>

    <script src="<?= base_url("assets/plugins/jquery.validate.js");?>" type="text/javascript"></script>

    <script src="<?= base_url("assets/plugins/typehead/typeahead.bundle.js"); ?>" type="text/javascript"></script>

    <script src="<?= base_url("assets/paginas/cadastro_saidas.js"); ?>" type="text/javascript"></script>

    <style>

        .twitter-typeahead{

            width: 100%;

        }

    </style>