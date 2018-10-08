<!-- Page Content -->
<?php

//var_dump($dados); exit;

function Dataget($dados, $field, $valor = 0) {
    if (!is_null($dados)) {
        if (isset($dados)) {
            return ($valor == 0) ? $dados->$field : $valor * $dados->$field;
        } else {
            return "";
        }
    } else {
        return "";
    }
}
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Cadastrar produtos</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                <a href="<?= base_url("salao/fluxoCaixa"); ?>" 
                   class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url(); ?>">Início</a></li>
                    <li class="active">Cadastrar Produtos</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <form id="frmCad" enctype="multipart/form-data" class="form-material form-horizontal" 
              method="POST" action="<?= base_url("index.php/produtos/realizar_cadastro/"); ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Informações de Cadastro</h3>

                        <?php if (isset($codProcesso) && ($codProcesso > 0)) { ?>
                            <input type="hidden" name="txtCod" id="txtCod" value="<?= $codProcesso ?>" />
                        <?php } ?>

                        <div class="form-group">
                            <label class="col-md-12" for="txtDescricao">Descrição</label>
                            <div class="col-md-12">
                                <input value="<?= Dataget($dados, "descricao"); ?>" type="text" id="txtDescricao" name="txtDescricao" class="form-control" placeholder="Descreva o Produto"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="txtValorCompra">Valor de Compra</label>
                            <div class="col-md-12">
                                <input value="<?= Dataget($dados, "valorCompra", 100); ?> " type="text" id="txtValorCompra" name="txtValorCompra" class="form-control" placeholder="Insira Valor de Compra"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="txtValorVenda">Valor de Venda</label>
                            <div class="col-md-12">
                                <input value="<?= Dataget($dados, "valorVenda", 100); ?>" type="text" id="txtValorVenda" name="txtValorVenda" class="form-control" placeholder="Insira o Valor de Venda"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12" for="txtEstoque">Estoque</label>
                            <div class="col-md-12">
                                <input value="<?= Dataget($dados, "estoque"); ?>" type="number" id="txtEstoque" name="txtEstoque" class="form-control" placeholder="Quantidade Atual em estoque"> 
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Cadastrar</button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Apagar</button>
                    </div>
                </div>
            </div>
        </form> 
    </div>
    <script src="<?= base_url("assets/plugins/jquery.validate.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/plugins/mask-plugin/src/jquery.mask.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/paginas/cadastro_produtos.js"); ?>" type="text/javascript"></script>