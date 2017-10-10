<?php
/* @var $this PeriodeController */
/* @var $model Periode */
/* @var $form CActiveForm */
?>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'periode-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>

<div class="main-box">
    <header class="main-box-header clearfix">
        <h2 class="pull-left"><i class="fa fa-plus-circle"></i> Tambah Periode Sidang</h2>
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
                            <?php //echo CHtml::activeDropDownList($model, 'Tanggal', $model->getTanggalNamaSidang(), array('prompt' => 'Pilih Tanggal', 'class' => 'form-control'));  ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Periode [Bulan] :</label>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-10">        
                            <?php echo CHtml::activeDropDownList($model, 'bulan', Pendaftaran::model()->getBulan(), array('prompt' => 'Pilih Bulan', 'class' => 'form-control', 'style' => 'width:30%')); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Periode [Tahun] :</label>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-10">        
                            <?php echo CHtml::activeDropDownList($model, 'tahun', $model->getYear(), array('prompt' => 'Pilih Tahun', 'class' => 'form-control', 'style' => 'width:30%')); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <?php
                    if ($model->isNewRecord) {
                        echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-success'), '<i class="fa fa-save"></i> Create');
                    } else {
                        echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-info'), '<i class="fa fa-save"></i> Save');
                    }
                    ?>
                </div>
            </div> 
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
