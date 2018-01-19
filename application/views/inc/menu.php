<?php $perm = $_SESSION["permissoes"];?> 

<!-- Left navbar-header -->

    <div class="navbar-default sidebar hidden-print" role="navigation" style="overflow: scroll;">



    <div class="sidebar-nav navbar-collapse">



        <ul class="nav" id="side-menu">



            <li class="sidebar-search hidden-sm hidden-md hidden-lg">

                <!-- input-group -->

                <div class="input-group custom-search-form">

                    <input type="text" class="form-control" placeholder="Buscar..."> <span class="input-group-btn">

                        <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>

                    </span> </div>

                <!-- /input-group -->

            </li>

            <li class="user-pro">

                <a href="#" class="waves-effect">

                    <img src="<?= (!empty($_SESSION["usuario"]->imagem)) 

                                    ? $_SESSION["usuario"]->imagem 

                                    : "https://linustechtips.com/main/uploads/set_resources_4/84c1e40ea0e759e3f1505eb1788ddf3c_default_photo.png";?>" 

                    alt="user-img" class="img-circle"> 

                    <span class="hide-menu">

                        <?= $_SESSION["usuario"]->nome;?><span class="fa arrow"></span>

                        

                    </span>

                </a>

                <ul class="nav nav-second-level">

                    <li><a href="<?= base_url("index.php/salao/logoff");?>"><i class="fa fa-power-off"></i> Sair</a></li>

                </ul>

            </li>

            <li class="nav-small-cap m-t-10">--- Dashboard</li>

            <li> 

                <a href="<?= base_url();?>" class="waves-effect">

                    <i class="linea-icon linea-basic fa-fw" data-icon="v"></i>

                    <span class="hide-menu"> Dashboard </span>

                </a>

            </li>



            <li class="nav-small-cap">--- Cadastros</li>

            <?php if(intval($perm->perm_efetuarCadastro) > 0){ ?>

            <li> 

                <a href="<?= base_url("index.php/Cliente/"); ?>" class="waves-effect">

                    <i class="icon-people p-r-10"></i> 

                    <span class="hide-menu">Clientes</span>

                </a> 

            </li>

            <?php } ?>

            <?php if(intval($perm->perm_cadastrarFuncionario) > 0){ ?>

            <li> 

                <a href="<?= base_url("index.php/Funcionario/"); ?>" class="waves-effect">

                    <i class="icon-user p-r-10"></i> 

                    <span class="hide-menu">Colaboradores</span>

                </a> 

            </li>

            <?php } ?>

            <?php if(intval($perm->perm_cadastrarUsuario) > 0){ ?>

            <li> 

                <a href="<?= base_url("index.php/Usuario/"); ?>" class="waves-effect">

                    <i class="icon-emotsmile p-r-10"></i> 

                    <span class="hide-menu">Usuários</span>

                </a> 

            </li>

            <?php } ?>

            <?php if(intval($perm->perm_verNotas) > 0){ ?>

            <li> 

                <a href="<?= base_url("index.php/ContasReceber/"); ?>" class="waves-effect">

                    <i class="icon-credit-card p-r-10"></i> 

                    <span class="hide-menu">Contas a Receber </span>

                </a> 

            </li>

            <?php } ?>

            <?php if(intval($perm->perm_verNotas) > 0){ ?>

            <li> 

                <a href="<?= base_url("index.php/ContasPagar/"); ?>" class="waves-effect">

                    <i class="icon-credit-card p-r-10"></i> 

                    <span class="hide-menu"> Contas a Pagar</span>

                </a> 

            </li>

            <?php } ?>

            <?php if(intval($perm->perm_cadastrarProdutosServicos) > 0){ ?>

            <li> 

                <a href="<?= base_url("index.php/Produtos/"); ?>" class="waves-effect">

                    <i class="icon-puzzle p-r-10"></i> 

                    <span class="hide-menu"> Produtos</span>

                </a> 

            </li>

            <?php } ?>

            <?php if(intval($perm->perm_cadastrarProdutosServicos) > 0){ ?>

            <li> 

                <a href="<?= base_url("index.php/Servicos/"); ?>" class="waves-effect">

                    <i class="icon-tag p-r-10"></i> 

                    <span class="hide-menu"> Serviços</span>

                </a> 

            </li>

            

            <?php } ?>

            <?php if(intval($perm->perm_alterarPermissoes) > 0){ ?>

            <li> 

                <a href="<?= base_url("index.php/Permissao/"); ?>" class="waves-effect">

                    <i class="icon-pin p-r-10"></i> 

                    <span class="hide-menu"> Permissões</span>

                </a> 

            </li>

            <?php } ?>

            <?php if(intval($perm->perm_cadastrarFuncionario) > 1000){ ?>

            <li> 

                <a href="<?= base_url("index.php/Instituicao/"); ?>" class="waves-effect">

                    <i class="icon-user p-r-10"></i> 

                    <span class="hide-menu">Instituição</span>

                </a> 

            </li>

            <?php } ?>

            <?php if(intval($perm->perm_marcarCompromissos) > 0){ ?>

            <li> 

                <a href="<?= base_url("index.php/agenda/");?>" class="waves-effect">

                    <i class="icon-calender p-r-10"></i> 

                    <span class="hide-menu">Agenda</span>

                </a> 

            </li>

            <?php } ?>

            <li class="nav-small-cap">--- Relatórios</li>

             <li> 

                <a href="#" class="waves-effect">

                    <i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">

                        Rendimentos<span class="fa arrow"></span> 

                    </span>

                </a>

                <ul class="nav nav-second-level">

                    <li><a href="<?= base_url("index.php/relatorio/faturamento/");?>">Faturamento</a></li>

                </ul>

            </li>

            <!--li> 

                <a href="#" class="waves-effect">

                    <i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">

                        Atendimentos<span class="fa arrow"></span> 

                    </span>

                </a>

                <ul class="nav nav-second-level">

                    <li><a href="<?= base_url("index.php/relatorio/getRendimentoMensal/");?>">Mensal</a></li>

                </ul>

            </li-->

            <!--li> 

                <a href="#" class="waves-effect active"><i class="ti-files fa-fw"></i> 

                    <span class="hide-menu">Vendas<span class="fa arrow"></span></span></a>

                <ul class="nav nav-second-level">

                    <li><a href="<?= base_url("index.php/relatorio/getRelatorioMensal");?>">Diárias</a></li>

                </ul>

            </li-->

            

        </ul>

    </div>

</div>

<!-- Left navbar-header end -->