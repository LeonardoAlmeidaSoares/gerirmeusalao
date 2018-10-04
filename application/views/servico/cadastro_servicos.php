<!-- Page Content -->

<?php 

    function Dataget($field, $valor = 0){
        if(isset($dados)){
            return ($valor == 0) ?$dados->$field : $dados->field * $valor;
        }else{
            return "";
        }
    }
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Cadastrar Serviços</h4> 
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" 
                    class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">

                    <li><a href="<?= base_url(); ?>">Início</a></li>

                    <li class="active">Cadastrar Servicos</li>

                </ol>

            </div>

            <!-- /.col-lg-12 -->

        </div>

        <form id="frmCad" enctype="multipart/form-data" class="form-material form-horizontal" 

              method="POST" action="<?= base_url("index.php/servicos/realizar_cadastro/");?>">

            <div class="row">

                <div class="col-sm-12">

                    <div class="white-box">

                        <h3 class="box-title">Informações de Cadastro</h3>

                        <?php if(isset($codProcesso) && ($codProcesso > 0)){ ?>
                            <input type="hidden" name="txtCod" id="txtCod" value="<?= $codProcesso?>" />
                        <?php } ?>
                    

                        <div class="form-group">

                            <label class="col-md-12" for="txtDescricao">Descrição</label>

                            <div class="col-md-12">

                                <input value="<?= Dataget("descricao");?>" type="text" id="txtDescricao" name="txtDescricao" class="form-control" placeholder="Descreva o Serviço"> 

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-12" for="txtValor">Valor</label>

                            <div class="col-md-12">

                                <input value="<?= Dataget("valorComum", 100);?>" type="text" id="txtValor" name="txtValor" class="form-control" placeholder="Insira o Valor do Serviço"> 

                            </div>

                        </div>
                        
                        <input value="0" type="hidden" id="txtValorP" name="txtValorP" class="form-control" placeholder="Insira o Valor Promocional (caso haja algum)"> 
                        
                        <!--div class="form-group">

                            <label class="col-md-12" for="txtValorP">Valor Promocional</label>

                            <div class="col-md-12">

                                <input value="<?= Dataget("valorPromocional", 100) ;?>" type="text" id="txtValorP" name="txtValorP" class="form-control" placeholder="Insira o Valor Promocional (caso haja algum)"> 

                            </div>

                        </div-->

                        

                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Cadastrar</button>

                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Apagar</button>

                    </div>

                </div>

            </div>

        </form> 

    </div>

    <script src="<?= base_url("assets/plugins/jquery.validate.js");?>" type="text/javascript"></script>

    <script src="<?= base_url("assets/plugins/mask-plugin/src/jquery.mask.js");?>" type="text/javascript"></script>

    <script src="<?= base_url("assets/paginas/cadastro_servicos.js");?>" type="text/javascript"></script>