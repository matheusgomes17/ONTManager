<!DOCTYPE html>
<html lang="en">
    <?php session_start(); ?>
    <head>
        <?php include_once "classes/head.php"; ?>
    </head>

    <?php include "db/db_config_mysql.php" ?>

    <body>
    <?php 
        
        #capturar mensagem
        if(isset($_SESSION['menssagem']) && !empty($_SESSION['menssagem']))
        {
            print "<script>alert(\"{$_SESSION['menssagem']}\")</script>";
            unset( $_SESSION['menssagem'] );
        }
    
    ?>
        
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Gerenciador ONT</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="classes/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->

            </ul>

        <!-- /.navbar-header -->
        </nav>



        <div id="page-wrapper">

            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="login-panel panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Por Favor Realize o Login</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" action="classes/autenticador.php" method="post">
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Usuario" name="usuario" type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Password" name="password" type="password">
                                        </div>
                                        <button class="btn btn-lg btn-success btn-block">Login</button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="dist/js/sb-admin-2.js"></script>

    </body>

</html>
