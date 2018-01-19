<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Alterar Senha de Colaborador</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                <ol class="breadcrumb">
                    <li><a href="<?= base_url(); ?>">Início</a></li>
                    <li class="active">Alterar Senha de Colaboradores</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <form id="frmCad" enctype="multipart/form-data" class="form-material form-horizontal" 
              method="POST" action="<?= base_url("index.php/usuario/efetuarTrocaDeSenha/"); ?>">
            <div class="col-md-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <input type="hidden" id="txtCod" name="txtCod" value="<?= $codigo; ?>" />
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome do Colaborador</label>
                                <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Nome do Colaborador" value="<?= $nome; ?>" readonly="true"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email do Colaborador</label>
                                <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email" value="<?= $email; ?>" readonly="true"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nova Senha do Colaborador</label>
                                <input type="password" class="form-control" id="txtSenha1" name="txtSenha1" placeholder="Senha"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirme sua senha</label>
                                <input type="password" class="form-control" id="txtSenha2" name="txtSenha2" placeholder="Confirme Sua Senha"> 
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Confirmar</button>
                            <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?= base_url("assets/plugins/jquery.validate.js"); ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/plugins/mask-plugin/src/jquery.mask.js"); ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/paginas/alterar_senha.js"); ?>" type="text/javascript"></script>