<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/css/bootstrap/bootstrap.min.css" />	
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/css/libs/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/css/libs/nanoscroller.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/css/compiled/theme_styles.css" />
        <link type="image/x-icon" href="resources/favicon.ico" rel="shortcut icon"/>
    </head>
    <body class="theme-turquoise fixed-header">
        <div id="theme-wrapper">
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
                                <li class="dropdown profile-dropdown visible">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/img/no_photo.png" />
                                        <span class="hidden-xs"></span> <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href=""><i class="fa fa-user"></i><?= Yii::app()->user->name ?></a></li>
                                        <li> <?php echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i> Logout', array('site/logout'), array('visible' => !Yii::app()->user->isGuest)) ?></li>
                                    </ul>
                                </li>                        
                                <li class="hidden-xxs">

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <div id="page-wrapper" class="container">
                <div class="row">
                    <div id="nav-col">
                        <section id="col-left" class="col-left-nano">
                            <div id="col-left-inner" class="col-left-nano-content">
                                <div id="user-left-box" class="clearfix hidden-sm hidden-xs dropdown profile2-dropdown">
                                    <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/img/no_photo.png" />
                                    <div class="user-box">
                                        <span class="name">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href=""><i class="fa fa-user"></i>Profiles</a></li>

                                            </ul>
                                        </span>
                                    </div>
                                </div>
                                <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">	
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="nav-header nav-header-first hidden-sm hidden-xs">
                                            NAVIGASI
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-dashboard"></i>
                                                <span>Dashboard</span>											
                                            </a>                                        
                                        </li> 
                                        <li>
                                            <a href="#" class="dropdown-toggle">
                                                <i class="fa fa-user"></i>
                                                <span>Pengguna</span>
                                                <i class="fa fa-angle-right drop-icon"></i>
                                            </a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="" class="dropdown-toggle">
                                                        <span><?php echo CHtml::link('Mahasiswa', array('mahasiswa/index')) ?></span>
                                                        <i class="fa fa-angle-right drop-icon"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="dropdown-toggle">
                                                        <?php echo CHtml::link('Kelola Dosen', array('dosen/index')) ?>
                                                        <i class="fa fa-angle-right drop-icon"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>   
                                        <li>
                                            <a href="index.php?r=pendaftaran/admin">
                                                <i class="fa fa-star"></i>
                                                <span>Kelola Pendaftaran</span>
                                            </a>
                                        </li>  
                                        <li>
                                            <a href="index.php?r=sidangmaster/admin">
                                                <i class="fa fa-medkit"></i>
                                                <span>Kelola Sidang</span>
                                            </a>
                                        </li>

                                        <li class="nav-header hidden-sm hidden-xs">
                                            Components
                                        </li>
                                        <li>
                                            <?php
                                                $this->beginWidget('zii.widgets.CPortlet', array(
                                                ));
                                                $this->widget('zii.widgets.CMenu', array(
                                                    'items' => $this->menu,
                                                    'htmlOptions' => array('class' => 'nav nav-pills nav-stacked'),
                                                ));
                                                $this->endWidget();
                                            ?>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </section>
                        <div id="nav-col-submenu"></div>
                    </div>
                    <div id="content-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ol class="breadcrumb">
                                            <?php if (isset($this->breadcrumbs)): ?>
                                                <?php
                                                $this->widget('ext.bootstrap.widgets.BootCrumb', array(
                                                    'links' => $this->breadcrumbs,
                                                ));
                                                ?><!-- breadcrumbs -->
                                            <?php endif ?>
                                        </ol>
                                    </div>
                                    <?php echo $content; ?>
                                </div>
                            </div>
                        </div>					
                        <footer id="footer-bar" class="row">
                            <p id="footer-copyright" class="col-xs-12">                        
                                Powered by <a href="https://www.yacanet.com">z.com</a>
                            </p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>	
        <div id="config-tool" class="closed">
            <a id="config-tool-cog">
                <i class="fa fa-cog"></i>
            </a>

            <div id="config-tool-options">
                <h4>Layout Options</h4>
                <ul>
                    <li>
                        <div class="checkbox-nice">
                            <input type="checkbox" id="config-fixed-header" />
                            <label for="config-fixed-header">
                                Fixed Header
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox-nice">
                            <input type="checkbox" id="config-fixed-sidebar" />
                            <label for="config-fixed-sidebar">
                                Fixed Left Menu
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox-nice">
                            <input type="checkbox" id="config-fixed-footer" />
                            <label for="config-fixed-footer">
                                Fixed Footer
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox-nice">
                            <input type="checkbox" id="config-boxed-layout" />
                            <label for="config-boxed-layout">
                                Boxed Layout
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox-nice">
                            <input type="checkbox" id="config-rtl-layout" />
                            <label for="config-rtl-layout">
                                Right-to-Left
                            </label>
                        </div>
                    </li>
                </ul>
                <br/>
                <h4>Skin Color</h4>
                <ul id="skin-colors" class="clearfix">
                    <li>
                        <a class="skin-changer" data-skin="" data-toggle="tooltip" title="Default" style="background-color: #34495e;">
                        </a>
                    </li>
                    <li>
                        <a class="skin-changer" data-skin="theme-white" data-toggle="tooltip" title="White/Green" style="background-color: #2ecc71;">
                        </a>
                    </li>
                    <li>
                        <a class="skin-changer blue-gradient" data-skin="theme-blue-gradient" data-toggle="tooltip" title="Gradient">
                        </a>
                    </li>
                    <li>
                        <a class="skin-changer" data-skin="theme-turquoise" data-toggle="tooltip" title="Green Sea" style="background-color: #1abc9c;">
                        </a>
                    </li>
                    <li>
                        <a class="skin-changer" data-skin="theme-amethyst" data-toggle="tooltip" title="Amethyst" style="background-color: #9b59b6;">
                        </a>
                    </li>
                    <li>
                        <a class="skin-changer" data-skin="theme-blue" data-toggle="tooltip" title="Blue" style="background-color: #2980b9;">
                        </a>
                    </li>
                    <li>
                        <a class="skin-changer" data-skin="theme-red" data-toggle="tooltip" title="Red" style="background-color: #e74c3c;">
                        </a>
                    </li>
                    <li>
                        <a class="skin-changer" data-skin="theme-whbl" data-toggle="tooltip" title="White/Blue" style="background-color: #3498db;">
                        </a>
                    </li>
                </ul>
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