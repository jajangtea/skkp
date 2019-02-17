<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */
/* @var $form CActiveForm */
?>

<div class="form-group">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>
    <hr/>
    <div class="main-box">
        <header class="main-box-header clearfix">
            <h2 class="pull-left"><i class="fa fa-search"></i> Pencarian</h2>
            <div class="icon-box pull-right">                                       
                <a class="btn pull-left" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </header> 
        <div class="main-box-body clearfix">
            <div class="form-horizontal">
                <div class="form-group">
                    <label class="col-lg-2 control-label"></label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-10">  
                                <?php //echo CHtml::activeDropDownList($model, 'Tanggal', $model->getTanggalNamaSidang(), array('prompt' => 'Pilih Tanggal', 'class' => 'form-control')); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                echo "<div class=\"form-group\">";
                echo "<label class=\"col-lg-2 control-label\">Pilih Mahasiswa :</label>";
                echo "<div class=\"col-lg-10\">";
                echo "<div class=\"row\">";
                echo "<div class=\"col-lg-10\">";

                $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'model' => $model,
                    'attribute' => 'NIM',
                    'source' => $this->createUrl('mahasiswa/suggestMahasiswa'),
                    'htmlOptions' => array(
                        'size' => '40',
                        'style' => 'width:30',
                        'class' => 'form-control',
                    ),
                    'options' => array(
                        'showAnim' => 'fold',
                        'select' => 'js:function(event, ui){'
                        . 'document.getElementById("hidden-namaMahasiswa").innerHTML = "Nama Mahasiswa : "+ui.item.namaMhs;'
                        . 'document.getElementById("hidden-prodi").innerHTML = "Program Studi : "+ui.item.namaProdi;'
                        . 'document.getElementById("hidden-namaMahasiswa").focus();  }',
                    ),
                ));
                echo '<br/>';
                echo CHtml::label('Nama Mahasiswa : -', '', array('type' => 'hidden', 'id' => 'hidden-namaMahasiswa', 'class' => 'label label-success', 'style' => 'width:30%'));
                echo CHtml::label('Program Studi : -', '', array('type' => 'hidden', 'id' => 'hidden-prodi', 'class' => 'label label-danger', 'style' => 'width:30%'));
                echo "</div>";
                echo "<div class=\"col-lg-10\">";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                ?>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Periode [Bulan] :</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-10">        
                                <?php echo CHtml::activeDropDownList($model, 'bulan', $model->getBulan(), array('prompt' => 'Pilih Bulan', 'class' => 'form-control', 'style' => 'width:30%')); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Periode [Tahun] :</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-10">        
                                <?php echo CHtml::activeDropDownList($model, 'tahun', $model->getTahun(), array('prompt' => 'Pilih Tahun', 'class' => 'form-control', 'style' => 'width:30%')); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Jenis Sidang :</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-10">        
                                <?php echo CHtml::activeDropDownList($model, 'IDJenisSidang', $model->getIDJenisSidang(), array('prompt' => 'Pilih Sidang', 'class' => 'form-control')); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <?php
                        echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-info'), '<i class="fa fa-search"></i> Search');
                        ?>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <?php $this->endWidget(); ?>
