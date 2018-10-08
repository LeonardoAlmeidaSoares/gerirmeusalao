<?php $perm = $_SESSION["permissoes"]; ?> 
<!-- Left navbar-header -->
<div class="navbar-default scroll-perso sidebar hidden-print" role="navigation" style="overflow: scroll; z-index:9999; margin:0px; padding:0px;">

    <div class="sidebar-nav navbar-collapse">

        <ul class="nav" id="side-menu" style="background: url('<?= base_url("assets/img/fundo_selecionado.jpg"); ?>');">

            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Buscar..."> <span class="input-group-btn">
                        <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                    </span> 
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <div class="circle1">

                    <div class="circle2">

                        <a class="logo hidden-xs" href="<?= base_url(); ?>" >

                            <img src="<?= base_url($_SESSION["empresa"]->logo); ?>" alt="home" />

                        </a>

                    </div>

                </div>
            </li>
            <li class="user-pro">
                <a href="#" class="waves-effect">
                    <img src="<?=
                    (!empty($_SESSION["usuario"]->imagem)) ? $_SESSION["usuario"]->imagem : "https://linustechtips.com/main/uploads/set_resources_4/84c1e40ea0e759e3f1505eb1788ddf3c_default_photo.png";
                    ?>" 
                         alt="user-img" class="img-circle"> 
                    <span class="hide-menu">
                        <?= $_SESSION["usuario"]->nome; ?><span class="fa arrow"></span>
                    </span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= base_url("salao/logoff"); ?>"><i class="fa fa-power-off">
                            </i> Sair
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-small-cap m-t-10">--- Dashboard</li>
            <li> 
                <a href="<?= base_url(); ?>" class="waves-effect">
                    <i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
                    <span class="hide-menu"> Dashboard </span>
                </a>
            </li>

            <li class="nav-small-cap">--- Cadastros</li>

            <?php if (intval($perm->perm_alterarDadosEmpresa) > 0) { ?>
                <li> 
                    <a href="<?= base_url("Instituicao/"); ?>" class="waves-effect">
                        <i class="icon-home p-r-10"></i> 
                        <span class="hide-menu">Instituição</span>
                    </a> 
                </li>
            <?php } ?>

            <?php if (intval($perm->perm_efetuarCadastro) > 0) { ?>
                <li> 
                    <a href="<?= base_url("cliente/"); ?>" class="waves-effect">
                        <i class="icon-people p-r-10"></i> 
                        <span class="hide-menu">Clientes</span>
                    </a> 
                </li>
            <?php } ?>
            <?php if (intval($perm->perm_cadastrarFuncionario) > 0) { ?>
                <li> 
                    <a href="<?= base_url("colaborador/"); ?>" class="waves-effect">
                        <i class="icon-user p-r-10"></i> 
                        <span class="hide-menu">Colaboradores</span>
                    </a> 
                </li>
            <?php } ?>
            <?php if (intval($perm->perm_cadastrarUsuario) > 0) { ?>
                <li> 
                    <a href="<?= base_url("usuario/"); ?>" class="waves-effect">
                        <i class="icon-emotsmile p-r-10"></i> 
                        <span class="hide-menu">Usuários</span>
                    </a> 
                </li>
            <?php } ?>
            <?php if (intval($perm->perm_verNotas) > 0) { ?>
                <li> 
                    <a href="<?= base_url("contas_receber"); ?>" class="waves-effect">
                        <i class="icon-credit-card p-r-10"></i> 
                        <span class="hide-menu">Contas a Receber </span>
                    </a> 
                </li-->
            <?php } ?>
            <?php if (intval($perm->perm_verNotas) > 0) { ?>
                <li> 
                    <a href="<?= base_url("contas_pagar/"); ?>" class="waves-effect">
                        <i class="icon-credit-card p-r-10"></i> 
                        <span class="hide-menu"> Contas a Pagar</span>
                    </a> 
                </li>
            <?php } ?>
            <?php if (intval($perm->perm_cadastrarProdutosServicos) > 0) { ?>
                <li> 
                    <a href="<?= base_url("produtos/"); ?>" class="waves-effect">
                        <i class="icon-puzzle p-r-10"></i> 
                        <span class="hide-menu"> Produtos</span>
                    </a> 
                </li>
            <?php } ?>
            <?php if (intval($perm->perm_cadastrarProdutosServicos) > 0) { ?>
                <li> 
                    <a href="<?= base_url("servicos/"); ?>" class="waves-effect">
                        <i class="icon-tag p-r-10"></i> 
                        <span class="hide-menu"> Serviços</span>
                    </a> 
                </li>

            <?php } ?>
            <?php if (intval($perm->perm_alterarPermissoes) > 0) { ?>
                <!--li> 
                    <a href="<?= base_url("Permissao/"); ?>" class="waves-effect">
                        <i class="icon-pin p-r-10"></i> 
                        <span class="hide-menu"> Permissões</span>
                    </a> 
                </li-->
            <?php } ?>

            <?php if (intval($perm->perm_marcarCompromissos) > 0) { ?>
                <li> 
                    <a href="<?= base_url("agenda/"); ?>" class="waves-effect">
                        <i class="icon-calender p-r-10"></i> 
                        <span class="hide-menu">Agenda</span>
                    </a> 
                </li>
            <?php } ?>
            <li> 
                <a href="<?= base_url("lembrete/"); ?>" class="waves-effect">
                    <i class="ti-alert p-r-10"></i> 
                    <span class="hide-menu">Lembrete</span>
                </a> 
            </li>

            <li class="nav-small-cap">--- Outros Cadastros</li>
            <?php if (intval($perm->perm_efetuarCadastro) > 0) { ?>
                <li> 
                    <a href="<?= base_url("cargo/"); ?>" class="waves-effect">
                        <i class="icon-layers p-r-10"></i> 
                        <span class="hide-menu">Cargos</span>
                    </a> 
                </li>
            <?php } ?>
            <?php if (intval($perm->perm_efetuarCadastro) > 0) { ?>
                <!--li> 
                    <a href="<?= base_url("tipo_entrada/"); ?>" class="waves-effect">
                        <i class="icon-layers p-r-10"></i> 
                        <span class="hide-menu">Tipos de Entrada</span>
                    </a> 
                </li-->
            <?php } ?>
            <?php if (intval($perm->perm_efetuarCadastro) > 0) { ?>
                <!--li> 
                    <a href="<?= base_url("tipo_saida/"); ?>" class="waves-effect">
                        <i class="icon-layers p-r-10"></i> 
                        <span class="hide-menu">Tipos de Saída</span>
                    </a> 
                </li-->
            <?php } ?>
            <!--li> 
                <a href="#" class="waves-effect">
                    <i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">
                        Atendimentos<span class="fa arrow"></span> 
                    </span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?= base_url("relatorio/getRendimentoMensal/"); ?>">Mensal</a></li>
                </ul>
            </li-->
            <!--li> 
                <a href="#" class="waves-effect active"><i class="ti-files fa-fw"></i> 
                    <span class="hide-menu">Vendas<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?= base_url("relatorio/getRelatorioMensal"); ?>">Diárias</a></li>
                </ul>
            </li-->

        </ul>
    </div>
</div>

<!-- Left navbar-header end -->

<style>
    ::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    ::-webkit-scrollbar
    {
        width: 10px;
        background-color:#F5F5F5 ;
    }

    ::-webkit-scrollbar-thumb
    {
        background-color: #01c0c8; 
        background-image: -webkit-linear-gradient(45deg,
            transparent 35%,
            rgba(0, 0, 0, .2) 25%,
            transparent 70%t)
    }
</style>
