<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */
/* @var $form CActiveForm */
?>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'pendaftaran-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => true,
        ));
?>
<div class="row">                
    <div class="col-lg-12">
        <br/>
        <div class="main-box">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-plus"></i> Tambah Pendaftaran</h2>
                <div class="icon-box pull-right">                                       
                    <a class="btn pull-left" href="#">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </header> 
            <div class="main-box-body clearfix">
                <div class="form-horizontal">
                    <p class="text-info">Kolom dengan tanda <span class="required">*</span> tidak boleh kosong.</p>
                    <div class="text-danger">
                        <?php echo $form->errorSummary($model); ?>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Pilih Sidang :</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-3">   
                                    <?php echo CHtml::activeDropDownList($model,'IdSidang', $model->getNamaSidang(),array('prompt' => 'Pilih Sidang','class'=>'form-control')); ?>
                                </div>
                                <div class="col-lg-10">        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Pembimbing 1 :</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-5">  
                                    <?php echo CHtml::activeDropDownList($model,'KodePembimbing1', $model->getPembimbing(),array('prompt' => 'Pilih Pembimbing','class'=>'form-control')); ?>
                                </div>
                                <div class="col-lg-10">        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Pembimbing 2 :</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-5">   
                                    <?php echo CHtml::activeDropDownList($model,'KodePembimbing2', $model->getPembimbing(),array('prompt' => 'Pilih Pembimbing','class'=>'form-control')); ?>
                                </div>
                                <div class="col-lg-10">        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Judul :</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-12">   
                                    <?php echo $form->textArea($model, 'Judul', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>

                                </div>
                                <div class="col-lg-10">        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <?php
                            if ($model->isNewRecord) {
                                echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-info'), '<i class="fa fa-save"></i> Daftar');
                            } else {
                                echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-success'), '<i class="fa fa-save"></i> Save');
                            }
                            ?>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>
