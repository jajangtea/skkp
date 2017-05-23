<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/css/bootstrap/bootstrap.min.css" />	
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/css/libs/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/css/libs/nanoscroller.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/css/compiled/theme_styles.css" />
        <link type="image/x-icon" href="resources/favicon.ico" rel="shortcut icon"/>
        <title>Cube - Bootstrap Admin Template</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />
        <script src="js/demo-rtl.js"></script>
        <link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
    </head>

    <body id="login-page">
        <header class="navbar" id="header-navbar">
            <div class="container">
                <a href="" id="logo" class="navbar-brand">
                    SKKP
                </a>				
                <div class="clearfix">
                    <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>

                    </button>				
                    <div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
                        <ul class="nav navbar-nav pull-left">
                            <li>
                                <a class="btn" id="make-small-nav">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                            <li class="dropdown hidden-xs visible">
                                <!--                                    <a class="btn dropdown-toggle" data-toggle="dropdown">
                                                                        <i class="fa fa-caret-down"></i>
                                                                    </a>-->

                            </li>
                        </ul>
                    </div>				
                    <div class="nav-no-collapse pull-right" id="header-nav">
                        <ul class="nav navbar-nav pull-right">	
                            <li>                            
                                <div id="loading" style="display: none">
                                    Please wait while process your request !!!
                                </div>
                            </li>                        
                            <li class="hidden-xxs">
                                   
                            </li>
                            <?php if(!Yii::app()->user->isGuest){
                            echo "<li class=\"dropdown profile-dropdown visible\">";
                            echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
                            echo "<img alt=\"\" src=".Yii::app()->request->baseUrl."/themes/cube/img/no_photo.png>";
                            echo " <span class=\"hidden-xs\"></span> <b class=\"caret\"></b></a>";
                            echo "<ul class=\"dropdown-menu dropdown-menu-right\">"; 
                                
                            echo "<li><a href=\"\"><i class=\"fa fa-user\"></i>".Yii::app()->user->name."</a></li>";
                            echo "<li>". CHtml::link('<i class=\"fa  fa-plus-circle fa-lg\"></i> Logout', array('site/logout'),array('visible'=>!Yii::app()->user->isGuest))."</li>";
                            echo "</ul>";
                            echo "</li>"; 
                            } ?>
                            <li class="hidden-xxs">

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div id="page-wrapper" class="container">

            <div class="row">
                <div id="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="main-box clearfix">                
                                                <div class="main-box-body clearfix">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <br /><strong>Selamat Datang !!!</strong>
                                                        </div>
                                                        <div class="col-lg-4 pull-right">
                                                            <div class="filter-block pull-right">
                                                                <?php 
                                                                    if(Yii::app()->user->isGuest)
                                                                    {
                                                                        echo CHtml::link('<i class="fa fa-lock fa-lg"></i> Login', array('site/login'), array('class' => 'btn btn-primary pull-left')); 
                                                                        echo CHtml::link('<i class="fa fa-user fa-lg"></i>  Registrasi', array('user/create'), array('class' => 'btn btn-primary pull-left')); 
                                                               
                                                                    }
                                                                ?>
                                                            </div>

                                                        </div>
                                                    </div>                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>     
                                </div>
                                <?php echo $content; ?>
                            </div>
                        </div>
                    </div>					
                    <footer id="footer-bar" class="row">
                        <p id="footer-copyright" class="col-xs-12">                        
                            Powered by <a href="https://sttindonesia.ac.id">STT Indonesia</a>
                        </p>
                    </footer>
                </div>
            </div>
        </div>




        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/js/jquery.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/js/jquery.nanoscroller.min.js"></script>				
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/js/scripts.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/js/pace.min.js"></script>	
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/js/portalekampus.js" type="text/javascript"></script>

    </body>
</html>