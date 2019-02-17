<?php
/* @var $this PersyaratanKpController */
/* @var $model PersyaratanKp */
/* @var $form CActiveForm */
?>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'persyaratan-kp-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>

<p class="text-info">Kolom dengan tanda <span class="required">*</span> tidak boleh kosong.</p>
<div class="text-danger">
    <?php echo $form->errorSummary($model); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'formKeteranganLunas'); ?>
    <?php echo $form->fileField($model, 'formKeteranganLunas', array('size' => 60, 'maxlength' => 300)); ?>
    <?php echo $form->error($model, 'formKeteranganLunas', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'formPersetujuanKp'); ?>
    <?php echo $form->fileField($model, 'formPersetujuanKp', array('size' => 60, 'maxlength' => 300)); ?>
    <?php echo $form->error($model, 'formPersetujuanKp', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'formPenilaianPerusahaan'); ?>
    <?php echo $form->fileField($model, 'formPenilaianPerusahaan', array('size' => 60, 'maxlength' => 300)); ?>
    <?php echo $form->error($model, 'formPenilaianPerusahaan', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'formPendaftaran'); ?>
    <?php echo $form->fileField($model, 'formPendaftaran', array('size' => 60, 'maxlength' => 300)); ?>
    <?php echo $form->error($model, 'formPendaftaran', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'formBimbingan'); ?>
    <?php echo $form->fileField($model, 'formBimbingan', array('size' => 60, 'maxlength' => 300)); ?>
    <?php echo $form->error($model, 'formBimbingan', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'formKehalian'); ?>
    <?php echo $form->fileField($model, 'formKehalian', array('size' => 60, 'maxlength' => 300)); ?>
    <?php echo $form->error($model, 'formKehalian', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php
    if ($model->isNewRecord) {
        echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-success'), '<i class="fa fa-download"></i> Upload');
    } else {
        echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-info'), '<i class="fa fa-save"></i> Upload');
    }
    ?>
</div>

<?php $this->endWidget(); ?>
