<?php
$status = array(
    0 => "Inativo",
    1 => "Ativo"
);
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Usuários Do Sistema</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                <a href="<?= base_url("salao/fluxoCaixa");?>" 
                   class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
               </a>
                <ol class="breadcrumb">
                    <li class="active">Usuários Do Sistema</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Usuários</h3>
                    <p class="text-muted m-b-30">Listagem de Usuários Do Sistema</p>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($usuarios->result() as $item) { ?>
                                    <tr>
                                        <td><?= str_pad($item->codUsuario, 6, "0", STR_PAD_LEFT);?></td>
                                        <td><?= $item->nome; ?></td>
                                        <td><?= $item->email; ?></td>
                                        <td><?= $status[$item->status]; ?></td>
                                        <td>
                                            <a href="<?= base_url("usuario/alterar/$item->codUsuario/"); ?>" title="Alterar Dados de Cliente">
                                                <span class="fa fa-edit pointer alter"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br />
                        <?php if ($_SESSION["permissoes"]->perm_cadastrarUsuario == 2) { ?>
                            <a href="<?= base_url("usuario/cadastrar/"); ?>" class="btn btn-info pull-right">Novo</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?= base_url("assets/plugins/sweetalert/sweetalert.min.js");?>" type="text/javascript"></script>

<link href="<?= base_url("assets/plugins/sweetalert/sweetalert.css");?>" rel="stylesheet" type="text/css"/>



<?php if(isset($_SESSION["msg_ok"])){ ?>

<script>

    $(function(){

        swal("Parabéns", "<?= $_SESSION["msg_ok"];?>", "success");

    });

</script>

<?php $_SESSION["msg_ok"] = NULL;} ?>