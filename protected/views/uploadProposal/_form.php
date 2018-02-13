<div class="main-box clearfix">
    <header class="main-box-header clearfix">
        <div class="filter-block pull-right">                                                   
            <?php //echo CHtml::link('<i class="fa  fa-times-circle fa-lg"></i>', array('pengajuan/view', 'IDPengajuan' => $IDPengajuan, 'IDJenisSidang' => $IDJenisSidang), array('class' => 'btn btn-primary pull-left')); ?>
            <?php echo CHtml::link('<i class="fa  fa-times-circle fa-lg"></i>', array('pengajuan/create'), array('class' => 'btn btn-primary pull-left')); ?>
        </div>
    </header>
    <div class="row-fluid">
        <div class="span12">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => "<i class=\"fa fa-bars\"></i> Upload Persyaratan",
            ));
            ?>
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'upload-proposal-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation' => false,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
            ?>
            <div class="text-danger">
                <?php echo $form->errorSummary($model); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'namaFile'); ?>
                <?php echo $form->fileField($model, 'namaFile', array('size' => 60, 'maxlength' => 300, 'class' => 'btn')); ?>
                <br/>
                <?php
                if ($model->isNewRecord) {
                    echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-success btn-lg'), '<i class="fa fa-upload"></i> Upload');
                } else {
                    echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-info btn-lg'), '<i class="fa fa-upload"></i> Re Upload');
                }
                ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>

