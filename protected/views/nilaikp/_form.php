<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'nilaikp-form',
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
                    <h2 class="pull-left"><i class="fa fa-plus"></i> Nilai Sidang KP</h2>
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
                            <label class="col-lg-2 control-label">NIM :</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-lg-5">  
                                        <?php
                                        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                                            'model' => $model,
                                            'attribute' => 'NIM',
                                            'source' => $this->createUrl('mahasiswa/suggestMahasiswa'),
                                            'htmlOptions' => array(
                                                'size' => '40',
                                                'style' => 'width:30',
                                                'class'=>'form-control',
                                            ),
                                            'options' => array(
                                                'showAnim' => 'fold',
                                                'select' => 'js:function(event, ui){document.getElementById("hidden-namaBarang").innerHTML = "Nama Mahasiswa : "+ui.item.namaMhs;'
                                                . 'document.getElementById("hidden-prodi").innerHTML = "Program Studi : "+ui.item.namaProdi;'
                                                . 'document.getElementById("txtJml").focus();  }',
                                            ),
                                        ));
                                        echo '<br/>';
                                        echo CHtml::label('Nama Mahasiswa : -', '', array('type' => 'hidden', 'id' => 'hidden-namaBarang', 'class' => 'label label-success', 'style' => 'width:30%'));
                                        echo CHtml::label('Program Studi : -', '', array('type' => 'hidden', 'id' => 'hidden-prodi', 'class' => 'label label-danger', 'style' => 'width:30%'));
                                        ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (Yii::app()->user->getLevel() == 3 || Yii::app()->user->getLevel() == 1) {
                            echo '<div class="form-group">';
                            echo ' <label class="col-lg-2 control-label">Nilai Pembimbing :</label>';
                            echo '<div class="col-lg-10">';
                            echo '<div class="row">';
                            echo '<div class="col-lg-5"> ';
                            echo $form->textField($model, 'NilaiPembimbing', array('class' => 'form-control', 'style' => 'width:30%'));
                            echo '</div>';
                            echo ' <div class="col-lg-10">';
                            echo '</div>';
                            echo '</div>';
                            echo ' </div>';
                            echo '</div>';
                        }
                        ?>
                        <?php
                        if (Yii::app()->user->getLevel() == 4 || Yii::app()->user->getLevel() == 1) {
                            echo '<div class="form-group">';
                            echo ' <label class="col-lg-2 control-label">Penguji Kerja Praktek :</label>';
                            echo '<div class="col-lg-10">';
                            echo '<div class="row">';
                            echo '<div class="col-lg-5"> ';
                            echo $form->textField($model, 'NilaiPenguji', array('class' => 'form-control', 'style' => 'width:30%')); 
                            echo '</div>';
                            echo ' <div class="col-lg-10">';
                            echo '</div>';
                            echo '</div>';
                            echo ' </div>';
                            echo '</div>';
                        }
                        ?>
                        <?php
                        if (Yii::app()->user->getLevel() == 1) {
                            echo '<div class="form-group">';
                            echo ' <label class="col-lg-2 control-label">Nilai Perusahaan :</label>';
                            echo '<div class="col-lg-10">';
                            echo '<div class="row">';
                            echo '<div class="col-lg-5"> ';
                            echo $form->textField($model, 'NilaiPerusahaan', array('class' => 'form-control', 'style' => 'width:30%'));
                            echo '</div>';
                            echo ' <div class="col-lg-10">';
                            echo '</div>';
                            echo '</div>';
                            echo ' </div>';
                            echo '</div>';
                        }
                        ?>
                        <?php
                        if (Yii::app()->user->getLevel() == 1) {
                            echo '<div class="form-group">';
                            echo ' <label class="col-lg-2 control-label">Nilai Akhir :</label>';
                            echo '<div class="col-lg-10">';
                            echo '<div class="row">';
                            echo '<div class="col-lg-5"> ';
                            echo $form->textField($model, 'NA', array('class' => 'form-control', 'style' => 'width:30%')); 
                            echo '</div>';
                            echo ' <div class="col-lg-10">';
                            echo '</div>';
                            echo '</div>';
                            echo ' </div>';
                            echo '</div>';
                        }
                        ?>
                         <?php
                        if (Yii::app()->user->getLevel() == 1) {
                            echo '<div class="form-group">';
                            echo ' <label class="col-lg-2 control-label">Index :</label>';
                            echo '<div class="col-lg-10">';
                            echo '<div class="row">';
                            echo '<div class="col-lg-5"> ';
                            echo $form->textField($model, 'Index', array('class' => 'form-control', 'style' => 'width:30%')); 
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