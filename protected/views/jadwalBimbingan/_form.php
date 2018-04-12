<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'pendaftaran-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>
<div class="row">                
    <div class="col-lg-12">
        <br/>
        <div class="main-box">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-plus"></i> Jadwal Bimbingan</h2>
                <div class="icon-box pull-right">                                       
                    <a class="btn pull-left" href="#">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </header> 
            <div class="main-box-body clearfix">
                <p class="text-info">Kolom dengan tanda <span class="required">*</span> tidak boleh kosong.</p>
                <div class="col-lg-6">
                    <div class="form-horizontal">
                        <div class="text-danger">
                            <?php echo $form->errorSummary($model); ?>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Dosen :</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12">   
                                         <?php echo $form->dropDownList($model, 'KodeDosen', CHtml::listData(Dosen::model()->findAll("KodeDosen <> '--'"), 'KodeDosen', 'NamaDosen'), array('style' => 'width:60%', 'prompt' => 'Pilih Pembimbing', 'class' => 'form-control')); ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                       
                        ?>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Hari :</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12">   
                                        <?php echo CHtml::activeDropDownList($model, 'hari', $model->getHari(), array('prompt' => 'Pilih Hari', 'class' => 'form-control', 'style' => 'width:60%')); ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Jam :</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12">  
                                         <?php echo $form->textField($model, 'jam', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control', 'style' => 'width:30%')); ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <div class="col-lg-offset-4 col-lg-10">
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
</div>

<?php $this->endWidget(); ?>

