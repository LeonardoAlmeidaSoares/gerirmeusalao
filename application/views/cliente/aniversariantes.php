<?php



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

                <h4 class="page-title">Aniversariantes</h4> 
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><span class=" icon-menu"></span> Caixa</a>
                
                <ol class="breadcrumb">

                    <li class="active">Aniversariantes</li>

                </ol>

            </div>

            <!-- /.col-lg-12 -->

        </div>

        <!-- /row -->

        <div class="row">

            <div class="col-sm-12">

                <div class="white-box">

                    <h3 class="box-title m-b-0">Aniversariantes</h3>

                    <p class="text-muted m-b-30">Listagem de Aniversariantes</p>

                    <div class="table-responsive">

                        <table id="myTable" class="table table-striped">

                            <thead>

                                <tr>
                                    <th>#</th>

                                    <th>Nome</th>

                                    <th>Endereço</th>

                                    <th>Idade</th>

                                    <th>Telefone</th>

                                    <th>Ações</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach ($clientes->result() as $item) { ?>

                                    <tr>
                                        <td><?= str_pad($item->codCliente, 6, "0", STR_PAD_LEFT);?></td>

                                        <td><?= $item->nome; ?></td>

                                        <td><?= $item->logradouro . "/" . $item->numero; ?></td>

                                        <td><?= getIdade($item->nascimento); ?></td>

                                        <td><?= $item->telefone;?></td>

                                        <td>

                                            <a href="<?= base_url("index.php/cliente/alterar/$item->codCliente/");?>" title="Alterar Dados de Cliente">

                                                <span class="fa fa-edit pointer alter"></span>

                                            </a>

                                            <a href="<?= base_url("index.php/cliente/historico/$item->codCliente");?>" title="Visualizar Histórico do Cliente">
                                                <span class="icon-user"></span>
                                            </a>

                                        </td>

                                    </tr>

                                <?php } ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

