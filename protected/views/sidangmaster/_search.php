<?php
/* @var $this SidangmasterController */
/* @var $model Sidangmaster */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
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
                    <label class="col-lg-2 control-label">Tanggal :</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-10">        
                                <?php
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $model,
                                    'attribute' => 'Tanggal',
                                    'name' => 'Tanggal',
                                    'options' => array(
                                        'showAnim' => 'fold',
                                        'altFormat' =>'yy-mm-dd',
                                        'dateFormat' => 'yy-mm-dd',
                                        'changeMonth' => true,
                                        'changeYear' => true,
                                    ),
                                    'htmlOptions' => array(
                                        'style' => 'width:120px;',
                                        //'value'=> date('Y-m-d'),
                                        'class'=>'form-control',
                                    ),
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Jenis Sidang :</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-10">        
                                <?php echo CHtml::activeDropDownList($model,'IdSidang', Pendaftaran::model()->getNamaSidang(),array('prompt' => 'Pilih','class'=>'form-control')); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Status :</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-10">        
                                <?php echo CHtml::activeDropDownList($model, 'status', $model->jenisStatus(), array('prompt' => 'Pilih', 'class' => 'form-control'))?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <?php
                            echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-info'), '<i class="fa fa-search"></i> Search');
                            echo CHtml::link('<i class="fa fa-refresh"></i> Reset','index.php?r=sidangmaster/admin',array('class' => 'btn btn-success'));
                        ?>
                    </div>
                </div> 
            </div>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->