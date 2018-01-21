<body>

    <!-- Preloader -->

    <div class="preloader">

        <div class="cssload-speeding-wheel"></div>

    </div>

    

    <section id="wrapper" class="login-register">

        

        <div class="login-box login-sidebar">

            <div class="white-box">

                <form method="POST" class="form-horizontal form-material" id="loginform" action="<?= base_url("index.php/salao/login"); ?>">

                    <a href="javascript:void(0)" class="text-center db">

                        <img src="<?= base_url("assets/img/logo_h.png"); ?>" alt="Home" style="width: 100%;" />

                    </a>

                    <?php if(isset($_SESSION["msg"])){ ?>

                    <div class="alert alert-danger alert-dismissible" role="alert">

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <?= $_SESSION["msg"];?><?php $_SESSION["msg"] = NULL;?>

                    </div>

                    <?php } ?>

                    <div class="form-group m-t-40">

                        <div class="col-xs-12">

                            <input class="form-control text-center" type="text" id="txtEmail" name="txtEmail" required="" placeholder="Email"> 

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-xs-12">

                            <input class="form-control text-center" name="txtSenha" id="txtSenha" type="password" required="" placeholder="Senha"> 

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-md-12">

                            <div class="checkbox checkbox-primary pull-left p-t-0">

                                <input id="checkbox-signup" type="checkbox">

                                <label for="checkbox-signup"> Lembrar de mim </label>

                            </div> 

                            <a href="javascript:void(0)" id="to-recover" 

                               class="text-dark pull-right">

                                <i class="fa fa-lock m-r-5"></i> 

                                Recuperar Senha</a> 

                        </div>

                    </div>

                    <div class="form-group text-center m-t-20">

                        <div class="col-xs-12">

                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect 

                                    waves-light" type="submit">Entrar</button>

                        </div>

                    </div>

                    <!--div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">

                            <div class="social">

                                <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>

                                <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>

                            </div>

                        </div>

                    </div-->

                    <!--div class="form-group m-b-0">

                        <div class="col-sm-12 text-center">

                            <p>Não possui uma conta? <a href="register2.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>

                        </div>

                    </div-->

                </form>

                <form class="form-horizontal" id="recoverform" action="index.html">

                    <div class="form-group ">

                        <div class="col-xs-12">

                            <h3>Recover Password</h3>

                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>

                        </div>

                    </div>

                    <div class="form-group ">

                        <div class="col-xs-12">

                            <input class="form-control" type="text" required="" placeholder="Email"> </div>

                    </div>

                    <div class="form-group text-center m-t-20">

                        <div class="col-xs-12">

                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </section>



    <script src="<?= base_url("assets/plugins/sidebar-nav/dist/sidebar-nav.min.js"); ?>"></script>

    <!--slimscroll JavaScript -->

    <script src="<?= base_url("assets/js/jquery.slimscroll.js"); ?>"></script>

    <!--Wave Effects -->

    <script src="<?= base_url("assets/js/waves.js"); ?>"></script>

    <!-- Custom Theme JavaScript -->

    <script src="<?= base_url("assets/js/custom.min.js"); ?>"></script>

