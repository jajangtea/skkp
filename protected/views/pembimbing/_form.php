<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'pengujikp-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    //'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>
<br/>
<div class="main-box">
    <header class="main-box-header clearfix">
        <h2 class="pull-left"><i class="fa fa-user"></i> Setting Pembimbing</h2>
        <div class="icon-box pull-right">                                       
            <a class="btn pull-left" href="#">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </header> 
    <div class="main-box-body clearfix">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-lg-2 control-label">Pilih Pembimbing :</label>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-5">   
                             <?php echo $form->dropDownList($model, 'idDosen' ,CHtml::listData(Dosen::model()->findAll("KodeDosen <> '--'"), 'IdUser', 'NamaDosen'),array('class' => 'form-control','style' => 'width:60%')); ?>
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
                        echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-success'), '<i class="fa fa-save"></i> Simpan');
                    } else {
                        echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-info'), '<i class="fa fa-save"></i> Ubah');
                    }
                    ?>
                </div>
            </div> 
        </div>
    </div>
</div>


<?php $this->endWidget(); ?>

