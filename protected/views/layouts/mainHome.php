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
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/skkp.css" />
        <link type="image/x-icon" href="resources/favicon.ico" rel="shortcut icon"/>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    </head>
    <body class="theme-white fixed-header">
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
                                    <div id="myDiv">
                                    </div>
                                </li>                        
                                <li class="hidden-xxs">
                                </li>
                                <li class="dropdown profile-dropdown visible">
                                    <?php
                                    if (!Yii::app()->user->isGuest) {
                                        echo "<li class=\"dropdown profile-dropdown visible\">";
                                        echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
                                        echo "<img alt=\"\" src=" . Yii::app()->request->baseUrl . "/themes/cube/img/no_photo.png>";
                                        echo " <span class=\"hidden-xs\"></span> <b class=\"caret\"></b></a>";
                                        echo "<ul class=\"dropdown-menu dropdown-menu-right\">";

                                        echo "<li><a href=\"\"><i class=\"fa fa-user\"></i>" . Yii::app()->user->name . "</a></li>";
                                        echo "<li>" . CHtml::link('<i class=\"fa  fa-plus-circle fa-lg\"></i> Logout', array('site/logout'), array('visible' => !Yii::app()->user->isGuest)) . "</li>";
                                        echo "</ul>";
                                        echo "</li>";
                                    }
                                    ?>
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
                                                } else if (Yii::app()->user->getLevel() == 2) {
                                                    echo Yii::app()->user->name;
                                                    echo "(" . User::model()->getNamaDetil() . ")";
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
                                            Navigasi
                                        </li>
                                        <li class="active">

                                            <?= CHtml::link("<i class=\"fa  fa-home\"></i><span>Dashboard</span>", array('pendaftaran/admin', 'class' => 'fa fa-home')) ?>
                                        </li>
                                        <?php
                                        if (Yii::app()->user->isGuest) {
                                            echo "<li>";
                                            echo "<a href=\"user/create\">";
                                            echo "<i class=\"fa fa-user\"></i>";
                                            echo "<span>Registrasi</span>";
                                            echo "</a>";
                                            echo "</li>";
                                        }
                                        if (Yii::app()->user->isGuest) {
                                            echo "<li>";
                                            echo "<a href=\"site/login\">";
                                            echo "<i class=\"fa fa-lock\"></i>";
                                            echo "<span>Login</span>";
                                            echo "</a>";
                                            echo "</li>";
                                        }
                                        ?>

                                        <li>
                                            <?= CHtml::link("<i class=\"fa fa-calendar\"></i><span>Pengajuan KP/Skripsi</span>", array('pengajuan/create')) ?>

                                        </li>   

                                        <li>
                                            <?= CHtml::link("<i class=\"fa fa-pencil\"></i><span>Pendaftaran Sidang</span>", array('pendaftaran/create')) ?>

                                        </li>



                                        <?php
                                        if (Yii::app()->user->getLevel() == 2) {
                                            echo "<li>";

                                            echo CHtml::link("<i class=\"fa fa-lock\"></i><span> Nilai KP</span>", array('nilaikp/index'));

                                            echo "</li>";

                                            echo "<li>";
                                            echo CHtml::link("<i class=\"fa fa-lock\"></i><span>Nilai Skripsi</span>", array('nilaimasterskripsi/index'));

                                            echo "</li>";
                                        }
                                        ?>
                                        <?php
                                        if (Yii::app()->user->getLevel() == 2) {
                                            echo "<li>";
                                            echo CHtml::link("<i class=\"fa fa-lock\"></i><span>Ubah Password</span>", array('user/cp'));
                                            echo "</li>";
                                        }
                                        ?>


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
                    </div>
                    <div id="content-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <ol class="breadcrumb">
                                        <?php if (isset($this->breadcrumbs)): ?>
                                            <?php
                                            $this->widget('ext.bootstrap.widgets.BootCrumb', array(
                                                'links' => $this->breadcrumbs,
                                            ));
                                            ?><!-- breadcrumbs -->
                                        <?php endif ?>
                                    </ol>
                                    <div class="main-box clearfix">                
                                        <div class="main-box-body clearfix">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <br /><strong>Selamat Datang !!!</strong>
                                                    <?php
                                                    $session = new CHttpSession;
                                                    $session->open();
                                                    if ($session['cekpendaftaran'] != "") {
                                                        echo "<br/>";
                                                        echo "<br/>";
                                                        echo "<div class=\"text-danger\">";
                                                        echo "<i class=\"fa fa-info-circle fa-fw fa-lg\"></i>";
                                                        echo "<strong>";
                                                        echo "Peringatan  : ";
                                                        echo "</strong>";
                                                        echo $session['cekpendaftaran'];
                                                        echo "</div>";
                                                        $session->remove('cekpendaftaran');
                                                    }
                                                    if ($session['cekpendaftaranKompre'] != "") {
                                                        echo "<br/>";
                                                        echo "<br/>";
                                                        echo "<div class=\"text-danger\">";
                                                        echo "<i class=\"fa fa-info-circle fa-fw fa-lg\"></i>";
                                                        echo "<strong>";
                                                        echo "Peringatan  : ";
                                                        echo "</strong>";
                                                        echo $session['cekpendaftaranKompre'];
                                                        echo "</div>";
                                                        $session->remove('cekpendaftaranKompre');
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-4 pull-right">
                                                    <div class="filter-block pull-right">
                                                        <?php
//                                                        if (Yii::app()->user->isGuest) {
//                                                            echo CHtml::link('<i class="fa fa-lock fa-lg"></i> Login', array('site/login'), array('class' => 'btn btn-primary pull-left'));
//                                                            echo CHtml::link('<i class="fa fa-user fa-lg"></i>  Registrasi', array('user/create'), array('class' => 'btn btn-primary pull-left'));
//                                                            echo CHtml::link('<i class="fa fa-pencil fa-lg"></i> Daftar Sidang', array('pendaftaran/create'), array('class' => 'btn btn-primary pull-left'));
//                                                        } else {
//                                                            echo CHtml::link('<i class="fa fa-pencil fa-lg"></i> Daftar Sidang', array('pendaftaran/create'), array('class' => 'btn btn-primary pull-left'));
//                                                        }
                                                        ?>                                                       
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
                                Powered by <a href="https://www.sttindonesia.ac.id">STT Indonesia</a>
                            </p>
                        </footer>
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