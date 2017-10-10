<?php
/* @var $this PengajuanController */
/* @var $model Pengajuan */
/* @var $form CActiveForm */
?>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'pengajuan-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>

 <div class="text-danger">
    <?php echo $form->errorSummary($model); ?>
</div>

<div class="main-box">
    <header class="main-box-header clearfix">
        <h2 class="pull-left"><i class="fa fa-search"></i> Pilih Sidang Yang Akan Diikuti</h2>
        <div class="icon-box pull-right">                                       
            <a class="btn pull-left" href="#">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </header> 
    <div class="main-box-body clearfix">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-lg-2 control-label">Jenis Sidang :</label>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-10">     
                            <?php echo CHtml::activeDropDownList($model, 'IdSidang', $model->getNamaSidang(), array('prompt' => 'Pilih Sidang', 'class' => 'form-control')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <?php
                    if ($model->isNewRecord) {
                        echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-success'), 'Lanjutkan <i class="fa fa-arrow-right"></i> ');
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




  


