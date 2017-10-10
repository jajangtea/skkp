<?php
/* @var $this NilaidetilskirpsiController */
/* @var $model Nilaidetilskirpsi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nilaidetilskirpsi-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>
    
     <div class="row">                
        <div class="col-lg-12">
            <br/>
            <div class="main-box">
                <header class="main-box-header clearfix">
                    <h2 class="pull-left"><i class="fa fa-plus"></i> Nilai Skripsi</h2>
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

                    
                        <?php
                        if (Yii::app()->user->getLevel() == 3 || Yii::app()->user->getLevel() == 1) {
                            echo '<div class="form-group">';
                            echo ' <label class="col-lg-2 control-label">Nilai Penguji 1 :</label>';
                            echo '<div class="col-lg-10">';
                            echo '<div class="row">';
                            echo '<div class="col-lg-5"> ';
                            echo $form->textField($model,'NilaiPenguji1',array('class' => 'form-control', 'style' => 'width:30%'));
                            echo '</div>';
                            echo ' <div class="col-lg-10">';
                            echo '</div>';
                            echo '</div>';
                            echo ' </div>';
                            echo '</div>';
                        }
                        ?>
                        <?php
                        if (Yii::app()->user->getLevel() == 3 || Yii::app()->user->getLevel() == 1) {
                            echo '<div class="form-group">';
                            echo ' <label class="col-lg-2 control-label">Nilai Penguji 2 :</label>';
                            echo '<div class="col-lg-10">';
                            echo '<div class="row">';
                            echo '<div class="col-lg-5"> ';
                            echo $form->textField($model,'NIlaiPenguji2',array('class' => 'form-control', 'style' => 'width:30%'));
                            echo '</div>';
                            echo ' <div class="col-lg-10">';
                            echo '</div>';
                            echo '</div>';
                            echo ' </div>';
                            echo '</div>';
                        }
                        ?>
                        
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <?php
                                if ($model->isNewRecord) {
                                    echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-info'), '<i class="fa fa-save"></i> Simpan');
                                } else {
                                    echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-success'), '<i class="fa fa-save"></i> Simpan');
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