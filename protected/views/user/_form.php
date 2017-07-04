<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-arrows"></i></span>
        <?php echo $form->textField($modelMhs, 'NIM', array('size' => 20, 'maxlength' => 20,'placeholder'=>'NIM','class'=>'form-control')); ?>
    </div>
    
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <?php echo $form->textField($modelMhs, 'Nama', array('size' => 20, 'maxlength' => 20,'placeholder'=>'Nama Lengkap','class'=>'form-control')); ?>
    </div>
    
    <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-tags"></i></span>
            <?php echo $form->dropDownlist($modelMhs,'KodeJurusan',CHtml::listData(Jurusan::model()->findAll(),'KodeJurusan','NamaJurusan'),array('class'=>'form-control')); ?>
    </div>

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        <?php echo $form->passwordField($model, 'password', array('size' => 50, 'maxlength' => 50,'placeholder'=>'Password','class'=>'form-control')); ?>
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
        <?php echo $form->passwordField($model, 'password2', array('size' => 50, 'maxlength' => 50,'placeholder'=>'Ulangi Password','class'=>'form-control')); ?>
    </div>
    
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
        <?php echo $form->textField($modelMhs, 'Tlp', array('size' => 50, 'maxlength' => 50,'placeholder'=>'No. Handphone','class'=>'form-control')); ?>
    </div>
    
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
        <?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 50,'placeholder'=>'Email','class'=>'form-control')); ?>
    </div>
    <div id="remember-me-wrapper">
        <div class="row">
            <div class="col-xs-12">
                <div class="checkbox-nice">
                    <input type="checkbox" id="terms-cond" checked="checked" />
                    <label for="terms-cond">
                        I accept terms and conditions
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php echo CHtml::submitButton('Register',array('class'=>'btn btn-success col-xs-12')); ?>
            <p>Kembali ke <?php echo CHtml::link('Home',array('site/index')); ?> . </p>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->