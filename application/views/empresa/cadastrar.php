<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Cadastrar Empresa</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                
                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" 
                    class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">
                    <li><a href="<?= base_url(); ?>">Início</a></li>
                        <li class="active">Cadastrar Empresa</li>
                    
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <form id="frmCad" enctype="multipart/form-data" class="form-material form-horizontal" 
              method="POST" action="<?= base_url("empresa/realizar_cadastro/");?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Informações de Cadastro</h3>

                        <div class="form-group">
                            <label class="col-md-12" for="txtNome">Nome</span>
                            </label>
                            <div class="col-md-12">
                                <input type="text" id="txtNome" name="txtNome" class="form-control" placeholder="Nome do Salão"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12" for="txtCnpj">CNPJ</span>
                            </label>
                            <div class="col-md-12">
                                <input type="text" id="txtCnpj" name="txtCnpj" class="form-control" placeholder="CNPJ do Salão"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12" for="txtEndereco">Logradouro</span>
                            </label>
                            <div class="col-md-12">
                                <input type="text" id="txtEndereco" name="txtEndereco" class="form-control" placeholder="Endereco do Salão"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12" for="txtNumero">Numero</span>
                            </label>
                            <div class="col-md-12">
                                <input type="text" id="txtNumero" name="txtNumero" class="form-control" placeholder="Numero do Salão"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12" for="txtCEP">CEP</span>
                            </label>
                            <div class="col-md-12">
                                <input type="text" id="txtCEP" name="txtCEP" class="form-control" placeholder="CEP do Salão"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12" for="txtBairro">Bairro</span>
                            </label>
                            <div class="col-md-12">
                                <input type="text" id="txtBairro" name="txtBairro" class="form-control" placeholder="Bairro do Salão"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12" for="txtTelefone">Telefone</span>
                            </label>
                            <div class="col-md-12">
                                <input type="text" id="txtTelefone" name="txtTelefone" class="form-control" placeholder="Telefone do Salão"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12" for="txtEmail">Email</span>
                            </label>
                            <div class="col-md-12">
                                <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="Email do Salão"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12" for="txtEstado">Estado</span>
                            </label>
                            <div class="col-md-12">
                                <select id="txtEstado" name="txtEstado" class="form-control" >
                                    <option value="" selected hidden>Selecione</option>
                                    <?php foreach($estados->result() as $item){ ?>
                                    <option value="<?= $item->codEstado;?>"><?= $item->descricao;?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12" for="txtCidade">Cidade</span>
                            </label>
                            <div class="col-md-12">
                                <select id="txtCidade" name="txtCidade" class="form-control">
                                    <option value="" selected hidden>Selecione um estado</option>
                                    
                                </select>
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
  