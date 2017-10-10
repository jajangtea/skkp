<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */

$this->breadcrumbs = array(
    'Pendaftaran' => array('index'),
    $model->idPendaftaran,
);

$this->menu = array(
    array('label' => '<i class="fa fa-eye"></i><span>Lihat</span>', 'url' => array('index')),
    array('label' => '<i class="fa fa-pencil"></i><span>Ubah</span>', 'url' => array('update', 'id' => $model->idPendaftaran)),
    array('label' => '<i class="fa fa-eraser"></i><span>Hapus</span>', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->idPendaftaran), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <br/>
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Upload Persyaratan#
                    <?php
                    $this->widget('application.extensions.qrcode.QRCodeGenerator', array(
                        'data' => $model->idPendaftaran,
                        'filename' => $model->idPendaftaran . ".jpg",
                        'filePath' =>  Yii::app()->basePath . '/../images/qrcode/',//YiiBase::getPathOfAlias('webroot.images.qrcode'), //or any folder on your server with public access
                        'subfolderVar' => false,
                        'matrixPointSize' => 4,
                        'displayImage' => true,
                    ))
                    ?></h2> 
                <div class="filter-block pull-right">            
                    <?php 
                        if($model->cekPersyaratan($model->idPendaftaran)=="<span class='label label-info'>Syarat Lengkap [Pendaftaran Berhasil]</span>")
                        {
                            echo CHtml::link('Lanjutkan <i class="fa  fa fa-arrow-right fa-lg"></i>', array('update','id'=>$model->idPendaftaran), array('class' => 'btn btn-success pull-left')); 
                        }
                    ?>
                    <!--<a id="ctl0_maincontent_btnPrintOut" class="btn btn-primary pull-left" title="Print Out" href="#"><i class="fa fa-print fa-lg"></i></a>--> 	
                    <?php echo CHtml::link('<i class="fa  fa-times-circle fa-lg"></i>', array('index'), array('class' => 'btn btn-primary pull-left')); ?>
                </div>
            </header>
            <div class="main-box-body clearfix"> 
                <br/>
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'news-grid',
                    'dataProvider' => $dataProviderUpload,
                    'summaryText' => '',
                    'columns' => array(
                        array(
                            'header' => "No",
                            'value' => '($this->grid->dataProvider->pagination->currentPage*
                                       $this->grid->dataProvider->pagination->pageSize
                                      )+
                                      array_search($data,$this->grid->dataProvider->getData())+1',
                            'htmlOptions' => array('width' => '2%'),
                        ),
                        array(
                            'type' => 'raw',
                            'header' => 'Upload Dokumen',
                            //'headerHtmlOptions' => array('style' => 'display:none'),
                            'htmlOptions' => array('width' => '30%'),
                            'value' => '$data["namaPersyaratan"]',
                        ),
                        array(
                            'type' => 'raw',
                            'header' => 'Keterangan',
                            //'headerHtmlOptions' => array('style' => 'display:none'),
                            'htmlOptions' => array('width' => '10%'),
                            'value' => '$data["namaFile"]==null ? "Belum di Upload" : "Telah di Upload"',
                        // '$data->action==null ? '' : $data->action->name',
                        ),
                        array(
                            'type' => 'raw',
                            'header' => 'Keterangan',
                            'htmlOptions' => array('width' => '10%'),
                            'value' => '$data["namaFile"]==null ? Chtml::link("Upload",
				array("upload/create","id"=>$data["idPendaftaran"],"idsyarat"=>$data["idPersyaratan"])) : Chtml::link("Lihat",
				array("upload/view","id"=>$data["idUpload"]))."|". Chtml::link("Hapus",
				array("upload/delete","id"=>$data["idUpload"],"idDaftar"=>$data["idPendaftaran"]))',
                        ),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>   

