<body class="fix-sidebar">

    <!-- Preloader -->

    <div class="preloader">

        <div class="cssload-speeding-wheel"></div>

    </div>

    <div id="page-wrapper" style="height:100%; position:relative;">

        <!-- Top Navigation -->

        <nav class="navbar  navbar-default navbar-static-top m-b-0  hidden-print">

            <div class="navbar-header "> 

                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " 

                   href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">

                    <i class="ti-menu"></i>

                </a>

                <ul class="nav navbar-top-links navbar-right pull-right">

                    <li class="dropdown"> 
                        <a title="Novo Atendimento" href="<?= base_url("agenda/cadastro"); ?>" class="dropdown-toggle waves-effect waves-light">
                            <span class="ti-calendar"></span>
                        </a>
                    </li>

                    <li class="dropdown"> 
                        <a class="dropdown-toggle waves-effect waves-light" href="<?= base_url("venda/"); ?>">
                            <i class="ti-shopping-cart"></i>
                        </a>
                    </li>
                    <li class="mega-dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" aria-expanded="false">
                            <span class="hidden-xs">Relatórios</span> 
                            <i class="icon-options-vertical"></i>
                        </a>


                        <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown" style="background-color:#fff09e; color:#fff;">
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Rendimentos</li>
                                    <li><a href="<?= base_url("relatorio/faturamento/"); ?>">Faturamento</a></li>
                                    <!--li><a href="form-layout.html">Form Layout</a></li>
                                    <li><a href="form-advanced.html">Form Addons</a></li>
                                    <li><a href="form-material-elements.html">Form Material</a></li>
                                    <li><a href="form-float-input.html">Form Float Input</a></li>
                                    <li><a href="form-upload.html">File Upload</a></li>
                                    <li><a href="form-mask.html">Form Mask</a></li>
                                    <li><a href="form-img-cropper.html">Image Cropping</a></li>
                                    <li><a href="form-validation.html">Form Validation</a></li-->

                                </ul>
                            </li>
                            <!--li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Colaboradores</li>
                                    <li><a href="<?= base_url("relatorio/servicos_prestados");?>">Serviços Prestados</a></li>
                                    <!--li><a href="form-pickers.html">Form-pickers</a></li>
                                    <li><a href="icheck-control.html">Icheck Form Controls</a></li>
                                    <li><a href="form-wizard.html">Form-wizards</a></li>
                                    <li><a href="form-typehead.html">Typehead</a></li>
                                    <li><a href="form-xeditable.html">X-editable</a></li>
                                    <li><a href="form-summernote.html">Summernote</a></li>
                                    <li><a href="form-bootstrap-wysihtml5.html">Bootstrap wysihtml5</a></li>
                                    <li><a href="form-tinymce-wysihtml5.html">Tinymce wysihtml5</a></li>

                                </ul>
                            </li>
                            <!--li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Table Example</li>
                                    <li><a href="basic-table.html">Basic Tables</a></li>
                                    <li><a href="table-layouts.html">Table Layouts</a></li>
                                    <li><a href="data-table.html">Data Table</a></li>
                                    <li class="hidden"><a href="crud-table.html">Crud Table</a></li>
                                    <li><a href="bootstrap-tables.html">Bootstrap Tables</a></li>
                                    <li><a href="responsive-tables.html">Responsive Tables</a></li>
                                    <li><a href="editable-tables.html">Editable Tables</a></li>
                                    <li><a href="foo-tables.html">FooTables</a></li>
                                    <li><a href="jsgrid.html">JsGrid Tables</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Charts</li>
                                    <li> <a href="flot.html">Flot Charts</a> </li>
                                    <li><a href="morris-chart.html">Morris Chart</a></li>
                                    <li><a href="chart-js.html">Chart-js</a></li>
                                    <li><a href="peity-chart.html">Peity Charts</a></li>
                                    <li><a href="knob-chart.html">Knob Charts</a></li>
                                    <li><a href="sparkline-chart.html">Sparkline charts</a></li>
                                    <li><a href="extra-charts.html">Extra Charts</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-12 m-t-40 demo-box">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-purple"><a href="../eliteadmin-inverse/index.html" target="_blank" class="text-white"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i><br>Demo 1</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-success"><a href="../eliteadmin/index.html" target="_blank" class="text-white"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i><br>Demo 2</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-info"><a href="../eliteadmin-ecommerce/index.html" target="_blank" class="text-white"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i><br>Demo 3</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-inverse"><a href="../eliteadmin-horizontal-navbar/index3.html" target="_blank" class="text-white"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i><br>Demo 4</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-warning"><a href="../eliteadmin-iconbar/index4.html" target="_blank" class="text-white"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i><br>Demo 5</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-danger"><a href="https://themeforest.net/item/elite-admin-responsive-web-app-kit-/16750820" target="_blank" class="text-white"><i class="linea-icon linea-ecommerce fa-fw" data-icon="d"></i><br>Buy Now</a></div>
                                    </div>
                                </div>
                            </li-->
                        </ul>

                    </li>

                    <!-- /.dropdown -->
                </ul>

            </div>
        </nav>

    </div>
    <!-- End Top Navigation -->