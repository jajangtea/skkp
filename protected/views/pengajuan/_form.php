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
<div class="row">                
    <div class="col-lg-12">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => $model->isNewRecord ? 'Pilih Proposal yang diajukan' : 'Masukan Judul',
        ));
        ?>
        <p>
        <div class="text-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
        <?php
        if (Pendaftaran::model()->cekPersyaratanProposal($IDJenisSidang, $IDPengajuan) == "Syarat Lengkap" && $IDPengajuan != 0) {
            echo $form->textArea($model, 'Judul', array('class' => 'input-block-level', 'rows' => '6'));
        } else {
            echo CHtml::activeDropDownList($model, 'IDJenisSidang', Pendaftaran::model()->getJenisSidangProposal(), array('prompt' => 'Pilih Sidang', 'class' => 'form-control','style'=>'width:30%'));
        }
        ?>
        <br/>
        <div class="form-group">
            <?php
            if ($model->isNewRecord) {
                echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-success'), 'Lanjutkan <i class="fa fa-arrow-right"></i> ');
            } else {
                echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-info'), '<i class="fa fa-save"></i> Save');
            }
            ?>
            <?php $this->endWidget(); ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>







