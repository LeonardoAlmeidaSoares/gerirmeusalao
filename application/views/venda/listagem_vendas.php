<?php
$status = array(
    0 => "Finalizada",
    1 => "Ativo"
);

function getIdade($nasc) {
    $date = strtotime($nasc);
    // Descobre que dia é hoje e retorna a unix timestamp
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime(0, 0, 0, intval(date("M", $date)), intval(date("D", $date)), intval(date("Y", $date)));
    return floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
}
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Vendas Realizadas</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" 
                    class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>
                <ol class="breadcrumb">
                    <li class="active">Vendas</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Vendas</h3>
                    <p class="text-muted m-b-30">Listagem de Vendas Realizadas</p>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <!--th>Ações</th-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($vendas->result() as $item) { ?>
                                    <tr>
                                        <td><?= $item->nome; ?></td>
                                        <td><?= $item->horario; ?></td>
                                        <td>R$ <?= number_format($item->valor, 2, ",","."); ?></td>
                                        <!--td>
                                            <a href="<?= base_url("index.php/usuario/alterar/$item->codVenda/"); ?>" title="Alterar Dados de Cliente">
                                                <span class="fa fa-edit pointer alter"></span>
                                            </a>
                                        </td-->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br />
                        <?php if ($_SESSION["permissoes"]->perm_cadastrarVenda == 2) { ?>
                            <a href="<?= base_url("index.php/venda/cadastrar/"); ?>" class="btn btn-info pull-right">Novo</a>
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