<!-- Page Content -->
<?php 

    function Dataget($field){
        if(isset($dados)){
            return $dados->$field;
        }else{
            return "";
        }
    }
    
function getDataAniversario($data){
    return substr($data, 8,2) . "/" . substr($data,5,2) . "/" . substr($data,0,4);
}
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Cadastrar Colaborador</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                
                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><span class=" icon-menu"></span> Caixa</a>

                <ol class="breadcrumb">
                    <li><a href="<?= base_url(); ?>">Início</a></li>
                    <li><a href="<?= base_url("index.php/funcionario/"); ?>">Colaboradores</a></li>
                    <li class="active">Cadastrar Colaborador</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <form id="frmCad" enctype="multipart/form-data" class="form-material form-horizontal" 
              method="POST" action="<?= base_url("index.php/funcionario/realizar_cadastro/");?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Informações de Cadastro</h3>

                        <?php if(isset($codProcesso) && ($codProcesso > 0)){ ?>
                            <input type="hidden" name="txtCod" id="txtCod" value="<?= $codProcesso?>" />
                        <?php } ?>

                        <div class="form-group">
                            <label class="col-md-12" for="txtNome">Nome</span>
                            </label>
                            <div class="col-md-12">
                                <input value="<?= Dataget("nome");?>" type="text" id="txtNome" name="txtNome" class="form-control" placeholder="Nome do Colaborador"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Cargo</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="txtCargo" name="txtCargo">
                                    <option hidden selected>Selecione o Cargo</option>
                                    <?php foreach($cargos->result() as $item){ ?>
                                        <option value="<?=$item->codCargo;?>"  <?= (Dataget("codCargo") == $item->codCargo) ? "selected" : "";?>><?= $item->descricao;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="txtNascimento">Data de Nascimento</label>
                            <div class="col-md-12">
                                <input value="<?= getDataAniversario(Dataget("nascimento"));?>"  type="text" id="txtNascimento" name="txtNascimento" class="form-control mydatepicker" placeholder="Insira a data de Nascimento"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Sexo</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="txtSexo" name="txtSexo">
                                    <option hidden selected>Selecione o Sexo</option>
                                    <option value="MASCULINO" <?= (Dataget("sexo") == "MASCULINO") ? "selected" : "";?>>MASCULINO</option>
                                    <option value="FEMININO" <?= (Dataget("sexo") == "FEMININO") ? "selected" : "";?>>FEMININO</option>

                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-12" for="txtEmail">Email</label>

                            <div class="col-md-12">

                                <input value="<?= Dataget("email");?>"  type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="Email do Funcionário"> 

                            </div>

                        </div>

                        

                        <div class="form-group">

                            <label class="col-md-12" for="txtTelefone">Telefone</label>

                            <div class="col-md-12">

                                <input value="<?= Dataget("telefone");?>"  type="text" id="txtTelefone" name="txtTelefone" class="form-control" placeholder="Telefone de contato"> 

                            </div>

                        </div>

                        

                        <div class="form-group">

                            <label class="col-md-12" for="txtSalario">Salário</label>

                            <div class="col-md-12">

                                <input value="<?= doubleval(Dataget("salario")) * 100;?>"  type="text" id="txtSalario" name="txtSalario" class="form-control" placeholder="Salário Fixo do Funcionário"> 

                            </div>

                        </div>

                        

                        <div class="form-group">

                            <label class="col-md-12" for="txtComissaoDinheiro">Comissão no Dinheiro

                                <span class="text-muted font-12 p-l-20">Caso o colaborador seja assalariado, preencha com "0"</span>

                            </label>

                            <div class="col-md-12">

                                <input value="<?= Dataget("comissaoDinheiro");?>"  type="number" id="txtComissaoDinheiro" name="txtComissaoDinheiro" class="form-control" placeholder="Comissão do Funcionário por serviço prestado (%)"> 

                            </div>

                        </div>

                            

                        <div class="form-group">

                            <label class="col-md-12" for="txtComissao">Comissão no Cartão

                                <span class="text-muted font-12 p-l-20">Caso o colaborador seja assalariado, preencha com "0"</span>

                            </label>

                            <div class="col-md-12">

                                <input value="<?= Dataget("comissaoCartao");?>"  type="number" id="txtComissaoCartao" name="txtComissaoCartao" class="form-control" placeholder="Comissão do Funcionário por serviço prestado (%)"> 

                            </div>

                        </div>

                        

                        <div class="form-group">

                            <label class="col-sm-12">Imagem</label>

                            <div class="col-sm-12">

                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">

                                    <div class="form-control" data-trigger="fileinput"> 

                                        <i class="glyphicon glyphicon-file fileinput-exists"></i> 

                                        <span class="fileinput-filename"></span>

                                    </div> 

                                    <span class="input-group-addon btn btn-default btn-file"> 

                                        <span class="fileinput-new">Selecione o Arquivo</span> 

                                        <span class="fileinput-exists">Alterar</span>

                                        <input type="file" name="txtImagem" id="txtImagem"> 

                                    </span> 

                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 

                                </div>

                            </div>

                        </div>

                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Cadastrar</button>

                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Apagar</button>

                    </div>

                </div>

            </div>

        </form> 

    </div>

    <script src="<?= base_url("assets/plugins/jquery.validate.js");?>" type="text/javascript"></script>

    <script src="<?= base_url("assets/plugins/mask-plugin/dist/jquery.mask.min.js");?>" type="text/javascript"></script>

    <script src="<?= base_url("assets/paginas/cadastro_funcionario.js");?>" type="text/javascript"></script>

    