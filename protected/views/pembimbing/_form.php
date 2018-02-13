<?php
/* @var $this PembimbingController */
/* @var $model Pembimbing */
/* @var $form CActiveForm */
?>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'pembimbing-form',
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
    <?php echo $form->labelEx($model, 'Nama Pembimbing'); ?>
    <?php echo $form->dropDownList($model, 'idDosen' ,CHtml::listData(Dosen::model()->findAll("KodeDosen <> '--'"), 'IdUser', 'NamaDosen'),array('style' => 'width:60%')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'No Pengajuan'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'model' => $model,
        'attribute' => 'idPengajuan',
        'source' => $this->createUrl('pengajuan/suggestPengajuan'),
        'htmlOptions' => array(
            'size' => '40',
            'style' => 'width:60%',
            'class' => 'form-control',
        ),
        'options' => array(
            'showAnim' => 'fold',
            'select' => 'js:function(event, ui){'
            . 'document.getElementById("hidden-namaMahasiswa").innerHTML = "Nama Mahasiswa : "+ui.item.namaMhs;'
            . 'document.getElementById("hidden-prodi").innerHTML = "Judul : "+ui.item.judul;'
            . 'document.getElementById("idp").innerHTML = "No Pengajuan : " +ui.item.idPengajuan;'
            . 'document.getElementById("hidden-namaMahasiswa").focus();  }',
        ),
    ));
    echo '<br/>';
    echo CHtml::label('Nama Mahasiswa : -', '', array('type' => 'hidden', 'id' => 'hidden-namaMahasiswa', 'class' => 'label label-success', 'style' => 'width:60%'));
    echo CHtml::label('Judul : -', '', array('type' => 'hidden', 'id' => 'hidden-prodi', 'class' => 'label label-important', 'style' => 'width:60%'));
  //  echo CHtml::label('ID : -', '', array('type' => 'hidden', 'id' => 'hidden-aju', 'class' => 'label label-warning', 'style' => 'width:60%'));
    echo $form->labelEx($model,'idPengajuan',array('id' => 'idp', 'class' => 'label label-warning', 'style' => 'width:60%','type'=>"hidden"));
    ?>
</div>

<div class="form-group">
    <?php
    if ($model->isNewRecord) {
        echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-success'), '<i class="fa fa-save"></i> Create');
    } else {
        echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-info'), '<i class="fa fa-save"></i> Save');
    }
    ?>
</div>

<?php $this->endWidget(); ?>
