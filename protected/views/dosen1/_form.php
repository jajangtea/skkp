<?php
/* @var $this DosenController */
/* @var $model Dosen */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dosen-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="text-info">Fields with <span class="required">*</span> are required.</p>
        <div class="col-lg-12">
        <div class="text-danger">
            <?php echo $form->errorSummary($model); ?>

        </div>
	
	<div class="form-group">
                <?php echo $form->labelEx($model,'KodeDosen',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'KodeDosen',array('size'=>3,'maxlength'=>3,'class'=>'form-control','style'=>'width:30%')); ?>
                <?php echo $form->error($model,'KodeDosen',array('class'=>'text-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'NamaDosen',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'NamaDosen',array('size'=>60,'maxlength'=>200,'class'=>'form-control','style'=>'width:30%')); ?>
		<?php echo $form->error($model,'NamaDosen',array('class'=>'text-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Tlp',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'Tlp',array('size'=>20,'maxlength'=>20,'class'=>'form-control','style'=>'width:30%')); ?>
		<?php echo $form->error($model,'Tlp',array('class'=>'text-danger')); ?>
	</div>

	<div class="form-group">
                <?php 
                    if($model->isNewRecord)
                    {
                        echo CHtml::tag('button',array('name'=>'btnSubmit','type'=>'submit','class'=>'btn btn-success'),'<i class="fa fa-save"></i> Create');
                    }
                    else
                    {
                         echo CHtml::tag('button',array('name'=>'btnSubmit','type'=>'submit','class'=>'btn btn-info'),'<i class="fa fa-save"></i> Save');
                    }
                ?>
        </div> 
</div>
<?php $this->endWidget(); ?>

