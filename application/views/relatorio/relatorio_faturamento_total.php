<?php 
$arrMonths = array(
    "01" => "Janeiro",
    "02" => "Fevereiro",
    "03" => "Março",
    "04" => "Abril",
    "05" => "Maio",
    "06" => "Junho",
    "07" => "Julho",
    "08" => "Agosto",
    "09" => "Setembro",
    "10" => "Outubro",
    "11" => "Novembro",
    "12" => "Dezembro"
);

function getComissao($item){
    switch($item["formaPagto"]){
        case "DINHEIRO" : 
            return ($item["comissaoDinheiro"] > 0)? (floatval($item["comissaoDinheiro"]) * $item["valor"])/100 : $item["valor"];
            break;
        case "CARTAO": 
            return ($item["comissaoCartao"] > 0)? (floatval($item["comissaoCartao"]) * $item["valor"])/100: $item["valor"];
            break;
    }

}

$last = null;

?>
<script src="<?= base_url("assets/plugins/Chart.js/Chart.min.js");?>"></script>

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Relatório de Faturamento</h4> 
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><span class=" icon-menu"></span> Caixa</a>

                <ol class="breadcrumb">

                    <li><a href="<?= base_url(); ?>">Início</a></li>

                    <li><a href="<?= base_url("index.php/funcionario/"); ?>">Relatórios</a></li>

                    <li class="active">Faturamento</li>

                </ol>

            </div>

            <!-- /.col-lg-12 -->

        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="white-box">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                     	<h3 class="box-title">Faturamento Por Mês</h3>
                        <div>
                            <canvas id="chart" ></canvas>
                        </div>

                        <div class="legendaGrafico form-control">
                            <div class="quadradinho pago" style="display: table-cell;"></div>Pago
                            <div class="quadradinho nao-pago" style="display: table-cell;"></div>Nao Pago

                            
                        </div>
                    </div>
                   
                </div>
                <!--
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Faturamento Por Colaborador</h3>
                        <div class="col-xs-6 col-jg-8">
                            <canvas id="chart_2"></canvas>
                        </div>
                    </div>
                </div-->
            </div>
        </div>

        <?php $data = array();
            
            foreach($dadosResumidos->result_array() as $item){
                
                if(!isset($data[$item["mes"]])){
                    $data[$item["mes"]] = array(
                        array(
                            "colaborador" => $item["nome"], 
                            "valor" => $item["valor"],
                            "comissao" => getComissao($item)
                            )
                        );
                }else{
                    array_push($data[$item["mes"]], 
                        array(
                            "colaborador" => $item["nome"], 
                            "valor" => $item["valor"],
                            "comissao" => getComissao($item)
                        )
                    );
                }
            }            
        ?>
    
        <section class="m-t-40">
            <div class="sttabs tabs-style-linetriangle">
                <nav>
                    <ul>
                        <li class="tab-current">
                            <a class="tab-page" href="#ultimos-n-meses">
                                <span>Últimos Meses</span>
                            </a>
                        </li>
                        <?php foreach($dadosResumidos->result() as $item){ ?>

                        <?php if($last != $item->mes){ $last = $item->mes;?>

                        <li class="">
                            <a class="tab-page" href="#section-<?= $item->mes;?>">
                                <span><?= $arrMonths[substr($item->mes,0,2)] . "/" . substr($item->mes,3,4);?></span>
                            </a>
                        </li>

                        <?php }$last = "";} ?>
                    </ul>
                </nav>
                <div class="content-wrap">
                    <section id="ultimos-n-meses" class="content-current">
                        <h2>Média dos Últimos 12 Meses</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Colaborador</th>
                                    <th>Quantia Total</th>
                                    <th>Comissão</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($dadosMediosResumidos->result() as $item){?>
                                <tr>
                                    <td><?= $item->nome;?></td>
                                    <td>R$<?= number_format($item->valor, 2, ",", ".");?></td>
                                    <td>R$ <?= number_format($item->comissao, 2, ",", ".");?></td>
                                </tr>
                                <?php $dadosTotais = $item->valor; $dadosComissao = $item->comissao;} ?>
                            </tbody>
                            <tfoot>
                                <tr><th>Valor Total</th>
                                <th style="text-align: left;">R$ <?= number_format($dadosTotais , 2, ",", ".");?></th>
                                    <th style="text-align: left;">R$ <?= number_format($dadosComissao , 2, ",", ".");?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </section>
                    <?php foreach($dadosResumidos->result() as $item){ ?>
                    <?php if($last != $item->mes){ $last = $item->mes; ?>

                    <section id="section-<?= $item->mes;?>">
                        <h2><?= $arrMonths[substr($item->mes,0,2)] . "/" . substr($item->mes,3,4);?></h2>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Colaborador</th>
                                    <th>Quantia Total</th>
                                    <th>Comissão</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data[$item->mes] as $itemC){?>
                                <tr>
                                    <td><?= $itemC["colaborador"];?></td>
                                    <td>R$<?= number_format($itemC["valor"], 2, ",", ".");?></td>
                                    <td>R$ <?= number_format($itemC["comissao"], 2, ",", ".");?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Valor Total</th>
                                    <th style="text-align: left;">R$ <?= number_format(array_sum(array_column($data[$item->mes], 'valor')) , 2, ",", ".");?></th>
                                    <th style="text-align: left;">R$ <?= number_format(array_sum(array_column($data[$item->mes], 'comissao')) , 2, ",", ".");?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </section>
                    <?php }} ?>
                </div>
                <!-- /content -->
            </div>
            <!-- /tabs -->
        </section>

	</div>
</div>

<script>

	var itensPagos = [];
	var labels = [];
	var itensNPagos = [];	
	
	<?php foreach($dados["pagos"] as $item){ echo "itensPagos.push($item);"; } ?>
	<?php foreach($dados["naoPagos"] as $item){ echo "itensNPagos.push($item);";} ?>
	
	<?php $arr = array_keys($dados["pagos"]);foreach($arr as $item){ echo "labels.push(' " . str_replace("-", "/", $item) . " ');";}?>
	

</script>
<script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js"); ?>" type="text/javascript"></script>
<link href="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.css"); ?>" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="<?= base_url("assets/paginas/relatorio_faturamento.js");?>"></script>
<style>
    .legendaGrafico{
        text-align: center;
        width: 25%;
        margin-left: 37.5%;
        border-radius: 5px;
        padding: 8px 0px;
        display: table
    }
    .quadradinho{
        width: 25px;
    }
    .nao-pago{
        background-color: rgba(180,193,215,0.8);
    }
    .pago{
        background-color: rgba(252,201,186,0.8);
    }
</style>