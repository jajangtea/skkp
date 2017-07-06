<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <div class="row">
        <div class="col-xs-12">
            <div id="login-box">
                <div class="row">
                    <div class="col-xs-12">
                        <div id="login-box-inner">

                            <p class="note">Fields with <span class="required">*</span> are required.</p>
                            <?php echo $form->errorSummary($model); ?>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-arrows"></i></span>
                                <?php echo $form->textField($model, 'KodeDosen', array('size' => 20, 'maxlength' => 20, 'placeholder' => 'Kode/Inisial', 'class' => 'form-control')); ?>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-wechat"></i></span>
                                <?php echo $form->textField($model, 'NamaDosen', array('size' => 20, 'maxlength' => 20, 'placeholder' => 'Nama Lengkap', 'class' => 'form-control')); ?>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <?php echo $form->textField($model, 'Tlp', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'No. Handphone', 'class' => 'form-control')); ?>
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
                                    <?php echo CHtml::submitButton('Ubah Data', array('class' => 'btn btn-success col-xs-12')); ?>
                                    <p>Kembali ke <?php echo CHtml::link('Home', array('site/index')); ?> . </p>
                                </div>
                            </div>

                            <?php $this->endWidget(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- form -->