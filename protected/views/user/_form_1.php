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
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <?php echo $form->textField($model, 'username', array('size' => 20, 'maxlength' => 20,'placeholder'=>'Username','class'=>'form-control')); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        <?php echo $form->passwordField($model, 'password', array('size' => 50, 'maxlength' => 50,'placeholder'=>'Password','class'=>'form-control')); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
        <?php echo $form->passwordField($model, 'password2', array('size' => 50, 'maxlength' => 50,'placeholder'=>'Ulangi Password','class'=>'form-control')); ?>
        <?php echo $form->error($model, 'password2'); ?>
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
        <?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 50,'placeholder'=>'Emai','class'=>'form-control')); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-image"></i></span>
        <?php echo $form->fileField($model, 'avatar', array('size' => 30, 'maxlength' => 30,'class'=>'form-control')); ?>
        <?php echo $form->error($model, 'avatar'); ?>
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-code"></i></span>
        <?php if (extension_loaded('gd')): ?>
            <div class="row">
                <div>
                    <?php $this->widget('CCaptcha'); ?><br/>
                    <?php echo CHtml::activeTextField($model, 'verifyCode',array('class'=>'form-control','placeholder'=>'Captcha')); ?>
                </div>
            </div>
        <?php endif; ?>
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
            <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-success col-xs-12')); ?>
            <?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->