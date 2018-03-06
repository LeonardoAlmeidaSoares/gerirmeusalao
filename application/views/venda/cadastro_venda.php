<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Cadastrar Venda</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa"); ?>" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><span class=" icon-menu"></span> Caixa</a>

                <ol class="breadcrumb">
                    <li><a href="<?= base_url(); ?>">Início</a></li>
                    <li><a href="<?= base_url("index.php/funcionario/"); ?>">Vendas</a></li>
                    <li class="active">Cadastrar Venda</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <form id="frmCad" enctype="multipart/form-data" class="" 
              method="POST" action="<?= base_url("index.php/venda/realizar_cadastro/"); ?>">
            <div class="row">
                <div class="col-sm-12 col-md-9">
                    <div class="white-box" style="height: 100%;">
                        <h3 class="box-title">Informações de Cadastro</h3>

                        <div class="form-group">
                            <label class="col-sm-12">Cliente</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="txtCliente" name="txtCliente">
                                    <option hidden selected>Selecione o Cliente</option>
                                    <?php foreach ($clientes->result() as $item) { ?>
                                        <option value="<?= $item->codCliente; ?>"><?= $item->nome; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12" for="txtProduto">Produto</label>
                            <div class="col-md-6">
                                <select id="txtProduto" name="txtProduto" class="form-control">
                                    <option hidden selected>Selecione o Produto</option>
                                    <?php foreach ($produtos->result() as $item) { ?>
                                        <option estoque="<?= $item->estoque;?>" 
                                                valor="<?= $item->valorVenda;?>" 
                                                value="<?= $item->codProduto; ?>">
                                            <?= $item->descricao; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-10">
                                    <input type="number" min="0" id="txtQtd" name="txtQtd" class="form-control" placeholder="Insira a quantidade"> 
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="btn btn-success" id="btnAddCart" style="width: 100%;">
                                        <span class="fa fa-plus"></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top: 40px;">
                            <table class="table table-hover table-condensed" id="table">
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th>Valor Unitário</th>
                                        <th>Valor Total</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Valor da Venda</h3>
                            <div class="text-right"> 
                                <span class="text-muted">Valor Total</span>
                                <h1>
                                    <sup><i class="ti-arrow-up text-success"></i></sup>
                                    <span id="spnValor">R$ 0,00</span>
                                </h1> 
                            </div> 
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
                            </div>
                            
                            <fieldset>
                                
                                <legend>Forma de Pagamento</legend>
                                
                                <a style="width: 100%;color: #000;" id="selectFPCard" class="btn btn-danger btn-outline">
                                    <span class="icon-credit-card"></span> Cartão de Crédito
                                </a>
                                
                                <a style="width: 100%;margin-top: 10px;color: #000;" id="selectFPMoney" class="btn btn-success btn-outline">
                                    <span class="icon-wallet"></span> Dinheiro
                                </a>
                                
                            </fieldset>
                            <input type="hidden" value="" id="txtValorTotal" name="txtValorTotal" />
                            <input type="hidden" value="" id="txtFormaPagto" name="txtFormaPagto" />
                            <input type="hidden" value="" id="txtListaItens" name="txtListaItens" />
                            
                            <button type="submit" class="btn btn-info waves-effect waves-light m-t-20" style="width: 100%;">Cadastrar</button>
                            <button type="reset" class="btn btn-inverse waves-effect waves-light m-t-20" style="width: 100%;">Apagar</button>
                                
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</form> 
</div>
<script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js"); ?>" type="text/javascript"></script>
<link href="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.css"); ?>" rel="stylesheet" type="text/css" />
<script src="<?= base_url("assets/plugins/jquery.validate.js"); ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/plugins/mask-plugin/dist/jquery.mask.min.js"); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url("assets/plugins/currencyFormatter/currencyFormatter.min.js");?>"></script>
<script src="<?= base_url("assets/paginas/cadastro_venda.js"); ?>" type="text/javascript"></script>


<style>
    
    .fmActive{
        color: #F00 !important;
    }
    
</style>
