<?php
/* @var $this SidangmasterController */
/* @var $model Sidangmaster */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'sidangmaster-form',
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
                    <h2 class="pull-left"><i class="fa fa-plus"></i> Tambah Sidang</h2>
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
                            <label class="col-lg-2 control-label">Tanggal :</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-lg-3">  
                                        <?php
                                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                            'model' => $model,
                                            'attribute' => 'Tanggal',
                                            'name' => 'Tanggal',
                                            'options' => array(
                                                'showAnim' => 'fold',
                                                'altFormat' => 'yy-mm-dd',
                                                'dateFormat' => 'yy-mm-dd',
                                                'changeMonth' => true,
                                                'changeYear' => true,
                                            ),
                                            'htmlOptions' => array(
                                                'style' => 'width:120px;',
                                                //'value'=> date('Y-m-d'),
                                                'class' => 'form-control',
                                            ),
                                        ));
                                        ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Sidang :</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-lg-5">  
                                        <?php echo CHtml::activeDropDownList($model, 'IDJenisSidang', Pendaftaran::model()->getJenisSidang(), array('prompt' => 'Pilih', 'class' => 'form-control')); ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tahun Ajaran :</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-lg-5">   
                                        <?php
                                        $myList = CHtml::listData(Ta::model()->findAll(), 'IdTa', function($data) {
                                                    return "{$data->Tahun} - {$data->Semester}";
                                                });
                                        echo $form->dropDownList($model, 'IdTa',$myList, array('prompt' => 'Pilih','class'=>'form-control'));
                                        ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Status :</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-lg-5">   
                                       <?php echo $form->checkBox($model,'status', array('value'=>1, 'uncheckValue'=>0)); ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tanggal Buka :</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-lg-3">  
                                        <?php
                                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                            'model' => $model,
                                            'attribute' => 'tglBuka',
                                            'name' => 'tglBuka',
                                            'options' => array(
                                                'showAnim' => 'fold',
                                                'altFormat' => 'yy-mm-dd',
                                                'dateFormat' => 'yy-mm-dd',
                                                'changeMonth' => true,
                                                'changeYear' => true,
                                            ),
                                            'htmlOptions' => array(
                                                'style' => 'width:120px;',
                                                //'value'=> date('Y-m-d'),
                                                'class' => 'form-control',
                                            ),
                                        ));
                                        ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tanggal Tutup :</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-lg-3">  
                                        <?php
                                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                            'model' => $model,
                                            'attribute' => 'tglTutup',
                                            'name' => 'tglTutup',
                                            'options' => array(
                                                'showAnim' => 'fold',
                                                'altFormat' => 'yy-mm-dd',
                                                'dateFormat' => 'yy-mm-dd',
                                                'changeMonth' => true,
                                                'changeYear' => true,
                                            ),
                                            'htmlOptions' => array(
                                                'style' => 'width:120px;',
                                                //'value'=> date('Y-m-d'),
                                                'class' => 'form-control',
                                            ),
                                        ));
                                        ?>
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
                                    echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-info'), '<i class="fa fa-save"></i> Simpan');
                                } else {
                                    echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-success'), '<i class="fa fa-save"></i> Ubah');
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

</div><!-- form -->