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
                <div class="form-group">
                    <label class="col-lg-2 control-label">Jenis Sidang :</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-10">        
                                <?php echo CHtml::activeDropDownList($model, 'namaSidang', $model->getIDJenisSidang(), array('prompt' => 'Pilih Sidang', 'class' => 'form-control')); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-2 control-label">Status :</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-10">        
                                <?php echo CHtml::activeDropDownList($model, 'status', array('Tuntas'=>'Tuntas','Tidak Tuntas'=>'Tidak Tuntas'), array('prompt' => 'Pilih Status', 'class' => 'form-control', 'style' => 'width:30%')); ?>
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
