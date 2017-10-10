<?php
/* @var $this UploadController */
/* @var $model Upload */

$this->breadcrumbs = array(
    'Upload' => array('pendaftaran/view', 'id' => $model->idPendaftaran),
    $model->idPersyaratan0->namaPersyaratan,
);

$this->menu = array(
    array('label' => '<span class="label label-danger">Hapus Upload</span>', 'url' => "index.php?r=upload/deleted&id=$model->idUpload",'confirm' => 'Are you sure you want to delete this item?'),
);
?>

<div class="main-box clearfix">
    <header class="main-box-header clearfix">
        <h2 class="pull-left"><i class="fa fa-bars"></i> Detil Gambar </h2>
        <div class="filter-block pull-right">                                                   
            <?php echo CHtml::link('<i class="fa  fa-times-circle fa-lg"></i>', array('pendaftaran/view', 'id' => $model->idPendaftaran), array('class' => 'btn btn-primary pull-left')); ?>
        </div>
    </header>
    <div class="main-box-body clearfix"> 
         <small><span class="label label-primary">Keterangan : Jika gambar tidak muncul tekan tombol hapus kemudian upload ulang</span></small>
         <br/><br/>
        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'attributes' => array(
                array(
                    'name' => 'Persyaratan :',
                    'value' => $model->idPersyaratan0->namaPersyaratan,
                ),
                'namaFile',
                'ukuranFIle',
                array(
                    'label' => 'Gambar',
                    'type' => 'raw',
                    // 'value' => $model->namaFile),
                    'value' => CHtml::image(Yii::app()->baseUrl . "/persyaratan/" . $model->namaFile, 'alt', array("width" => "595px", "height" => "842px"))
//            'value' => '$data["namaFile"]==null ? Chtml::link("Upload",
//				array("upload/create","id"=>$data["idPendaftaran"],"idsyarat"=>$data["idPersyaratan"])) : Chtml::link("Lihat",
//				array("upload/view","id"=>$data["idPersyaratan"]))',
                ),
            ),
        ));
        ?>
    </div></div>