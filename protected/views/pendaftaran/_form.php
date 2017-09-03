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
    'enableAjaxValidation' => false,
      'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>
<?php echo CHtml::form($this->createUrl('upload'), 'post', array('enctype' => 'multipart/form-data')); ?>
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
                <p class="text-info">Kolom dengan tanda <span class="required">*</span> tidak boleh kosong.</p>
                <div class="col-lg-6">
                    <div class="form-horizontal">
                        <div class="text-danger">
                            <?php echo $form->errorSummary($model); ?>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Nomor Pendaftaran :</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12">   
                                        <?php echo $form->textField($model, 'idPendaftaran', array('size' => 60,
                                            'maxlength' => 255, 'value' => (($model->isNewRecord) ? $model->generateKode_Pendaftaran() : $model->idPendaftaran), 'readonly' => true, 'class' => 'form-control'));
                                        ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (Yii::app()->user->getLevel() == 1) {
                            echo "<div class=\"form-group\">";
                            echo "<label class=\"col-lg-4 control-label\">Pilih Mahasiswa :</label>";
                            echo "<div class=\"col-lg-8\">";
                            echo "<div class=\"row\">";
                            echo "<div class=\"col-lg-12\">";
                            echo CHtml::activeDropDownList($model, 'NIM', Pendaftaran::model()->getMahasiswa(), array('prompt' => 'Pilih Mahasiswa', 'class' => 'form-control'));
                            echo "</div>";
                            echo "<div class=\"col-lg-10\">";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Pilih Sidang :</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12">   
<?php echo CHtml::activeDropDownList($model, 'IdSidang', $model->getNamaSidang(), array('prompt' => 'Pilih Sidang', 'class' => 'form-control')); ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Pembimbing1 :</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12">  
<?php echo CHtml::activeDropDownList($model, 'KodePembimbing1', $model->getPembimbing(), array('prompt' => 'Pilih Pembimbing', 'class' => 'form-control')); ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Pembimbing2 :</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12">   
<?php echo CHtml::activeDropDownList($model, 'KodePembimbing2', $model->getPembimbing(), array('prompt' => 'Pilih Pembimbing', 'class' => 'form-control')); ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Judul :</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12">   
<?php echo $form->textArea($model, 'Judul', array('rows' => 6, 'style' => 'width:420px', 'class' => 'form-control')); ?>

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
