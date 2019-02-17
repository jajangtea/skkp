<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */
/* @var $form CActiveForm */
?>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'pendaftaran-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>
<?php echo CHtml::form($this->createUrl('upload'), 'post', array('enctype' => 'multipart/form-data')); ?>
<div class="row">                
    <div class="col-lg-12">
        <br/>
        <div class="main-box">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-plus"></i> Tambah Pendaftaran</h2>
                <div class="icon-box pull-right">                                       
                    <a class="btn pull-left" href="#">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </header> 
            <div class="main-box-body clearfix">
                <p class="text-info">Kolom dengan tanda <span class="required">*</span> tidak boleh kosong.</p>
                <div class="col-lg-12">
                    <div class="form-horizontal">
                        <div class="text-danger">
                            <?php echo $form->errorSummary($model); ?>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-1 control-label">Nomor :</label>
                            <div class="col-lg-2">
                                <div class="row">
                                    <div class="col-lg-12">   
                                        <?php
                                        echo $form->textField($model, 'idPendaftaran', array('size' => 60,
                                            'maxlength' => 255, 'value' => (($model->isNewRecord) ? $model->generateKode_Pendaftaran() : $model->idPendaftaran), 'readonly' => true, 'class' => 'form-control'));
                                        ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (Yii::app()->user->getLevel() == 1) {
//                            echo "<div class=\"form-group\">";
//                            echo "<label class=\"col-lg-4 control-label\">Pilih Mahasiswa :</label>";
//                            echo "<div class=\"col-lg-8\">";
//                            echo "<div class=\"row\">";
//                            echo "<div class=\"col-lg-12\">";
//                            echo CHtml::activeDropDownList($model, 'NIM', Pendaftaran::model()->getMahasiswa(), array('prompt' => 'Pilih Mahasiswa', 'class' => 'form-control'));
//                            echo "</div>";
//                            echo "<div class=\"col-lg-10\">";
//                            echo "</div>";
//                            echo "</div>";
//                            echo "</div>";
//                            echo "</div>";
                            echo "<div class=\"form-group\">";
                            echo "<label class=\"col-lg-4 control-label\">Pilih Mahasiswa :</label>";
                            echo "<div class=\"col-lg-8\">";
                            echo "<div class=\"row\">";
                            echo "<div class=\"col-lg-12\">";

                            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                                'model' => $model,
                                'attribute' => 'NIM',
                                'source' => $this->createUrl('mahasiswa/suggestMahasiswa'),
                                'htmlOptions' => array(
                                    'size' => '40',
                                    'style' => 'width:30',
                                    'class' => 'form-control',
                                ),
                                'options' => array(
                                    'showAnim' => 'fold',
                                    'select' => 'js:function(event, ui){'
                                    . 'document.getElementById("hidden-namaMahasiswa").innerHTML = "Nama Mahasiswa : "+ui.item.namaMhs;'
                                    . 'document.getElementById("hidden-prodi").innerHTML = "Program Studi : "+ui.item.namaProdi;'
                                    . 'document.getElementById("hidden-namaMahasiswa").focus();  }',
                                ),
                            ));
                            echo '<br/>';
                            echo CHtml::label('Nama Mahasiswa : -', '', array('type' => 'hidden', 'id' => 'hidden-namaMahasiswa', 'class' => 'label label-success', 'style' => 'width:30%'));
                            echo CHtml::label('Program Studi : -', '', array('type' => 'hidden', 'id' => 'hidden-prodi', 'class' => 'label label-danger', 'style' => 'width:30%'));
                            echo "</div>";
                            echo "<div class=\"col-lg-10\">";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                        <div class="form-group">
                            <label class="col-lg-1 control-label">Pilih :</label>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">   
                                        <?php
                                        echo CHtml::activeDropDownList($model, 'IdSidang', $model->getNamaSidangd(), array(
                                            'ajax' => array(
                                                'type' => 'POST',
                                                'url' => CController::createUrl('pendaftaran/judul'),
                                                'update' => '#' . CHtml::activeId($model, 'idPengajuan'),
                                            ),
                                            'prompt' => 'Pilih Sidang',
                                            'class' => 'form-control'
                                        ));
                                        ?>
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-1 control-label">Judul :</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-lg-12">  
                                        <?php // CHtml::activeDropDownList($model, 'idPengajuan', '', array('prompt' => 'Judul KP/Skripsi', 'class' => 'form-control')); ?>
                                        <?php echo CHtml::activeDropDownList($model, 'idPengajuan', Pendaftaran::model()->getPengajuan(), array('prompt' => 'Pilih Pengajuan', 'class' => 'form-control', 'style' => 'width:80%')); ?>
                                        <?php //echo CHtml::dropDownList('idPengajuan','', array());?> 
                                    </div>
                                    <div class="col-lg-10">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-1 control-label"></label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-lg-12">
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
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>
