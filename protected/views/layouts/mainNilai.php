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
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body class="theme-blue-gradient fixed-header">
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
                                                <?php
                                                if (Yii::app()->user->isGuest) {
                                                    echo 'Tamu';
                                                } else {
                                                    echo Yii::app()->user->name;
                                                }
                                                ?>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <?php
                                            if (!Yii::app()->user->isGuest) {
                                                echo "<ul class=\"dropdown-menu\">";
                                                echo "<li>";
                                                echo CHtml::link("<i class=\"fa  fa-plus-circle fa-lg\"></i> Logout", array('site/logout'), array('visible' => !Yii::app()->user->isGuest));
                                                echo "</li>";
                                                echo "</ul>";
                                            }
                                            ?>
                                        </span>
                                        <span class="status">
                                            <?php
                                            if (!Yii::app()->user->isGuest) {
                                                echo '<i class="fa fa-circle"></i> Online';
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">	
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="nav-header nav-header-first hidden-sm hidden-xs">
                                            Pembimbing KP/Skripsi
                                        </li>
                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-book"></i><span>Pembimbing</span>', array('pembimbing/admin')) ?>
                                        </li>
                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-book"></i><span>Jadwal Bimbingan</span>', array('jadwalBimbingan/admin')) ?>
                                        </li>
                                        <li class="nav-header nav-header-first hidden-sm hidden-xs">
                                            Penilaian Pembimbing
                                        </li>
                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-book"></i><span>Nilai Pembimbing KP</span>', array('nilaikp/adminpembimbing')) ?>
                                        </li>
                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-book"></i><span>Nilai Pembimbing Skripsi</span>', array('nilaimasterskripsi/adminpembimbingskripsi')) ?>
                                        </li>
                                        <li class="nav-header nav-header-first hidden-sm hidden-xs">
                                            Penilaian Penguji
                                        </li>
                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-book"></i><span>Nilai Penguji KP</span>', array('nilaikp/adminpenguji')) ?>
                                        </li>
                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-book"></i><span>Nilai Penguji Skripsi</span>', array('pengujiskripsi/admin')) ?>
                                        </li>
                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-book"></i><span>Ubah Password</span>', array('user/cp')) ?>
                                        </li>
                                        <li class="nav-header hidden-sm hidden-xs">
                                            Components
                                        </li>
                                        <li>
                                            <?php
                                            $this->beginWidget('zii.widgets.CPortlet', array(
                                            ));
                                            $this->widget('zii.widgets.CMenu', array(
                                                'encodeLabel' => false,
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
                        <!--                        <footer id="footer-bar" class="row">
                                                    <p id="footer-copyright" class="col-xs-12">                        
                                                        Powered by <a href="https://www.yacanet.com">z.com</a>
                                                    </p>
                                                </footer>-->
                    </div>
                </div>
            </div>
        </div>	
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/js/jquery.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/js/jquery.nanoscroller.min.js"></script>	
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/js/scripts.js"></script>
    </body>
</html>