<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Cargos</h4> 

            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

               <a href="<?= base_url("index.php/salao/fluxoCaixa");?>" 
                    class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btnCaixa"><span class=" icon-menu"></span> Caixa
                </a>

                <ol class="breadcrumb">

                    <li class="active">Cargos</li>

                </ol>

            </div>

            <!-- /.col-lg-12 -->

        </div>

        <!-- /row -->

        <div class="row">

            <div class="col-sm-12">

                <div class="white-box">

                    <h3 class="box-title m-b-0">Cargos</h3>

                    <p class="text-muted m-b-30">Listagem de Cargos</p>

                    <div class="table-responsive">

                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titulo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cargos->result() as $item) { ?>
                                <tr>
                                    <td><?= str_pad($item->codCargo, 6, "0", STR_PAD_LEFT);?></td>
                                    <td><?= $item->descricao;?></td>
                                    <td>
                                        <!--span class="ti-eye pointer visualizar" cod="<?= $item->codCargo;?>"></span-->
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br />


                        <a href="<?= base_url("index.php/cargo/cadastrar/");?>" class="btn btn-info pull-right">Novo</a>

                    </div>

                </div>

            </div>



        </div>

        </div>

        <!-- /.row -->

        <script src="<?= base_url("assets/plugins/sweetalert/sweetalert.min.js");?>" type="text/javascript"></script>

        <link href="<?= base_url("assets/plugins/sweetalert/sweetalert.css");?>" rel="stylesheet" type="text/css"/>

        <script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js"); ?>" type="text/javascript"></script>

        <link href="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.css"); ?>" rel="stylesheet" type="text/css" />

        <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

        <script src="<?= base_url("assets/paginas/listagem_lembrete.js"); ?>" type="text/javascript"></script>

        