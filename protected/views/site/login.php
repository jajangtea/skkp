<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder' => 'Username')); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        <?php echo $form->passwordField($model, 'password', array('placeholder' => 'Password','class' => 'form-control')); ?>
        <?php echo $form->error($model, 'password')?>
    </div>
    <div id="remember-me-wrapper">
        <div class="row">
            <div class="col-xs-12">
                <div class="checkbox-nice">
                    <?php echo $form->checkBox($model, 'rememberMe'); ?>
                    <label for="terms-cond">
                        <?php echo $form->label($model, 'rememberMe'); ?>
                        <?php echo $form->error($model, 'rememberMe'); ?>
                        I accept terms and conditions
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
             <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-success col-xs-12')); ?>
            <p>Jika belum mempunyai akun silahkan <?php echo CHtml::link('Registrasi',array('user/create')); ?> terlebih dahulu. </p>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
