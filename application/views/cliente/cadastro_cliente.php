<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Cadastrar Cliente</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                <a href="<?= base_url("index.php/salao/fluxoCaixa"); ?>" 
                   class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">
                    <li><a href="<?= base_url(); ?>">Início</a></li>
                    <li class="active">Cadastrar Cliente</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <form id="frmCad" enctype="multipart/form-data" class="form-material form-horizontal" 
              method="POST" action="<?= base_url("index.php/cliente/realizar_cadastro/"); ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Informações de Cadastro</h3>

                        <div class="form-group">
                            <label class="col-md-12" for="txtNome">Nome</span>
                            </label>
                            <div class="col-md-12">
                                <input type="text" id="txtNome" name="txtNome" class="form-control" placeholder="Nome do Cliente"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="txtNascimento">Data de Nascimento</label>
                            <div class="col-md-12">
                                <input type="text" id="txtNascimento" name="txtNascimento" class="form-control mydatepicker" placeholder="Insira a data de Nascimento"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Sexo</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="txtSexo" name="txtSexo">
                                    <option hidden selected>Selecione o Sexo</option>
                                    <option value="MASCULINO">MASCULINO</option>
                                    <option value="FEMININO">FEMININO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12" for="txtEmail">CPF</label>
                            <div class="col-md-12">
                                <input type="text" id="txtCpf" name="txtCpf" class="form-control" placeholder="CPF do Cliente"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12" for="txtEmail">Email</label>
                            <div class="col-md-12">
                                <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="Email do Cliente"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12" for="txtTelefone">Telefone</label>
                            <div class="col-md-12">
                                <input type="text" id="txtTelefone" name="txtTelefone" class="form-control" placeholder="Telefone de contato"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="txtCep">CEP</label>
                            <div class="col-md-12">
                                <input type="text" id="txtCep" name="txtCep" class="form-control" placeholder="CEP do Cliente"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-">Estado</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="txtEstado">
                                    <?php foreach ($estados->result() as $item) { ?>
                                        <?php $sel = ($item->codEstado == $_SESSION["empresa"]->codEstado) ? "selected" : ""; ?>
                                        <option value="<?= $item->codEstado; ?>" <?= $sel; ?>><?= $item->descricao; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Cidade</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="txtCidade" name="txtCidade">
                                    <option>Selecione a Cidade</option>
                                    <?php foreach ($cidades->result() as $item) { ?>
                                        <?php $sel = ($item->codCidade == $_SESSION["empresa"]->codCidade) ? "selected" : ""; ?>
                                        <option value="<?= $item->codCidade; ?>" <?= $sel; ?>><?= $item->descricao; ?></option>
                                    <?php } ?>
                                </select>                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="txtBairro">Bairro</label>
                            <div class="col-md-12">
                                <input type="text" id="txtBairro" name="txtBairro" class="form-control" placeholder="Bairro do Cliente"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="txtLogradouro">Logradouro</label>
                            <div class="col-md-12">
                                <input type="text" id="txtLogradouro" name="txtLogradouro" class="form-control" placeholder="Endereço do Cliente"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12" for="txtNumero">Numero</label>
                            <div class="col-md-12">
                                <input type="text" id="txtNumero" name="txtNumero" class="form-control" placeholder="Número da casa do Cliente"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12" for="txtComplemento">Complemento</label>
                            <div class="col-md-12">
                                <input type="text" id="txtComplemento" name="txtComplemento" class="form-control" placeholder="Complemento do endereço do Cliente"> 
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

    <script src="<?= base_url("assets/plugins/jquery.validate.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/plugins/mask-plugin/dist/jquery.mask.min.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/paginas/cadastro_cliente.js"); ?>" type="text/javascript"></script>