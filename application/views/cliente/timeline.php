<!-- Page Content -->
<?php
$count = 0;

$vetorClasses = array(
    "Venda" => "fa fa-shopping-cart",
    "Compromisso" => "fa fa-calendar"
);

$vetorStatus = array("danger", 'success');

function getTempoPassado($tempo) {
    if ($tempo == 0) {
        return "hoje";
    } else {
        return ($tempo * (-1)) . " Dias Atrás";
    }
}
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Histórico do Cliente</h4> 
                <h5><?= $dadosCliente->row(0)->nome; ?></h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                <a href="<?= base_url("index.php/salao/fluxoCaixa"); ?>" 
                   class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">

                    <li><a href="<?= base_url(); ?>">Início</a></li>

                    <li class="active">Histórico de Cliente</li>

                </ol>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <ul class="timeline">

                        <?php foreach ($historico->result() as $item) { ?>
                            <li <?= (( ++$count % 2) == 1) ? "" : "class='timeline-inverted'"; ?>> 
                                <div class="timeline-badge <?= $vetorStatus[$item->status]; ?>">
                                    <span class="<?= $vetorClasses[$item->tipo]; ?>"></span>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title"><?= $item->tipo; ?></h4>
                                        <p>
                                            <small class="text-muted">
                                                <i class="fa fa-clock-o"></i> 
                                                <?= $item->data; ?> (<?= getTempoPassado($item->TempoPassado); ?>)
                                            </small> 
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <?= $item->resumo; ?><br>
                                        <?= "R$ " . number_format($item->valor, 2, ",", ".");?>
                                        <?php if($item->status == 1){?>
                                        <p>Pago com <?= strtolower($item->formaPagto);?></p>
                                        <?php } else {?>
                                        <p>Ainda em aberto</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
