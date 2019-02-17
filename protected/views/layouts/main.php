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

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <!--[if lt IE 8]>
      <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
      <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

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
                                            NAVIGASI
                                        </li>
                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-home"></i><span> Dashboard</span>', array('site/index')) ?>
                                        </li> 
                                        <li>
                                            <a href="#" class="dropdown-toggle">
                                                <i class="fa fa-user"></i>
                                                <span>Pengguna</span>
                                                <i class="fa fa-angle-right drop-icon"></i>
                                            </a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#" class="dropdown-toggle">
                                                        <?php echo CHtml::link('<i class="fa fa-user"></i><span> Akun</span>', array('user/admin')) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <?php echo CHtml::link('<i class="fa fa-user"></i><span> Mahasiswa</span>', array('mahasiswa/admin')) ?>
                                                </li>
                                                <li>
                                                    <a href="#" class="dropdown-toggle">
                                                        <?php echo CHtml::link('<i class="fa fa-graduation-cap"></i><span> Dosen</span>', array('dosen/admin')) ?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>  
                                        <li>
                                            <a href="#" class="dropdown-toggle">
                                                <i class="fa fa-list"></i>
                                                <span>Kelola Pendaftaran</span>
                                                <i class="fa fa-angle-right drop-icon"></i>
                                            </a>
                                            <ul class="submenu">
                                                <li>
                                                    <?php echo CHtml::link('<i class="fa fa-graduation-cap"></i><span> Pendaftaran Sidang</span>', array('pendaftaran/admin')) ?>
                                                </li>
                                                <li>
                                                    <?php echo CHtml::link('<i class="fa fa-graduation-cap"></i><span> Pendaftaran Proposal</span>', array('pengajuan/admin')) ?>
                                                </li>
                                            </ul>
                                        </li>   
                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-magic"></i><span>Setting Penguji Skripsi</span>', array('pengujiskripsi/admin')) ?>
                                        </li>
                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-magic"></i><span>Setting Penguji KP</span>', array('pengujikp/admin')) ?>
                                        </li>

                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-graduation-cap"></i><span>Periode</span>', array('periode/admin')) ?>
                                        </li>
                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-graduation-cap"></i><span>Sidang Master</span>', array('sidangmaster/admin')) ?>
                                        </li>
                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-book"></i><span>Nilai KP</span>', array('nilaikp/admin')) ?>
                                        </li>

<!--                                        <li>
                                            <?php // echo CHtml::link('<i class="fa fa-book"></i><span>Nilai Kompre</span>', array('nilaimasterkompre/admin')) ?>
                                        </li>-->

                                        <li>

                                            <a href="#" class="dropdown-toggle">
                                                <i class="fa fa-envelope"></i>
                                                <span>Nilai Skripsi</span>
                                                <i class="fa fa-angle-right drop-icon"></i>
                                            </a>
                                            <ul class="submenu">
                                                <li>
                                                    <?php echo CHtml::link('<i class="fa fa-book"></i><span> Pra/Sidang Skripsi</span>', array('pengujiskripsi/admin')) ?>
                                                </li>
                                                <li>
                                                    <?php echo CHtml::link('<i class="fa fa-book"></i><span> Akhir Skripsi</span>', array('nilaimasterskripsi/admin')) ?>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="#" class="dropdown-toggle">
                                                <i class="fa fa-envelope"></i>
                                                <span>Proposal</span>
                                                <i class="fa fa-angle-right drop-icon"></i>
                                            </a>
                                            <ul class="submenu">
                                                <li>
                                                    <?php echo CHtml::link('<i class="fa fa-book"></i><span> KP/Skripsi</span>', array('pengajuan/admin')) ?>
                                                </li>
                                                <li>
                                                    <?php echo CHtml::link('<i class="fa fa-user"></i><span> Pembimbing</span>', array('pembimbing/admin')) ?>
                                                </li>
                                                <li>
                                                    <?php echo CHtml::link('<i class="fa fa-users"></i><span> Rekap</span>', array('pembimbing/rekap')) ?>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="#" class="dropdown-toggle">
                                                <i class="fa fa-envelope"></i>
                                                <span>Kelola Persyaratan</span>
                                                <i class="fa fa-angle-right drop-icon"></i>
                                            </a>
                                            <ul class="submenu">
                                                <li>
                                                    <?php echo CHtml::link('<i class="fa fa-key"></i><span> Persyaratan</span>', array('persyaratan/admin')) ?>
                                                </li>
                                                <li>
                                                    <?php echo CHtml::link('<i class="fa fa-key"></i><span> Persyaratan Jenis</span>', array('persyaratanjenis/admin')) ?>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-windows"></i><span> Tahun Ajaran</span>', array('ta/admin')) ?>
                                        </li>
                                        <li>
                                            <?php echo CHtml::link("<i class=\"fa fa-lock\"></i><span>Ubah Password</span>", array('user/cp')); ?>
                                        </li>

                                        <li class="nav-header hidden-sm hidden-xs">
                                            Components
                                        </li>
                                        <li>
                                            <?php
                                            $this->widget('zii.widgets.CMenu', array(
                                                'encodeLabel' => false,
                                                'items' => $this->menu,
                                                'htmlOptions' => array('class' => 'nav nav-pills nav-stacked'),
                                            ));
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
