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
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div id="login-box">
                        <div class="row">
                            <div class="col-xs-12">
                                <header id="login-header">
                                    <div id="login-logo">
                                        <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/cube/img/stti.png" />
                                    </div>
                                </header>
                                <div id="login-box-inner">
                                     <?php echo $content; ?>
                                    
                                </div>
                            </div>
                        </div>
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