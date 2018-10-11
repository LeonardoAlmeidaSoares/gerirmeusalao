<div id="page-wrapper" style="min-height: 565px;">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Serviços Prestados</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("salao/fluxoCaixa"); ?>" 
                   class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url(); ?>">Início</a>
                    </li>
                    <li class="active">Serviços Prestados</li>
                </ol>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->

        <!-- row -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Colaboradores</h3>
                <div class="steamline">

                    <div class="row">
                        <?php foreach ($colaboradores->result() as $item) { ?>

                            <div class="col-md-3">
                                <div class="sl-item">
                                    <div class="sl-left"> 
                                        <img class="img-circle" alt="user" src="<?= base_url($item->imagem); ?>"> </div>
                                    <div class="sl-right">
                                        <div>
                                            <a class="lnk-sel" cod="<?= $item->codFuncionario; ?>" href="#"><?= $item->nome; ?></a> 
                                        </div>
                                    </div>
                                </div>

                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- .row -->

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div id="div_report"></div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url("assets/paginas/listagem_servicos_prestados.js");?>" type="text/javascript"></script>