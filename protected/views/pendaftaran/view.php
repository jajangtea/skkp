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
                <h2 class="pull-left"><i class="fa fa-bars"></i> Detil Pendaftaran #
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
                    <a id="ctl0_maincontent_btnPrintOut" class="btn btn-primary pull-left" title="Print Out" href="#"><i class="fa fa-print fa-lg"></i></a> 	
                    <?php echo CHtml::link('<i class="fa  fa-times-circle fa-lg"></i>', array('index'), array('class' => 'btn btn-primary pull-left')); ?>
                </div>
            </header>
            <div class="main-box-body clearfix"> 

                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        array(
                            'name' => 'Qrcode',
                            'type' => 'raw',
                            'value' => CHtml::image(Yii::app()->baseUrl . "/images/qrcode/" . $model->idPendaftaran . '.jpg', 'alt', array("width" => "100px", "height" => "100")),
                            'htmlOptions' => array('width' => '5%'),
                        ),
//                        array(
//                            'name' => 'Nomor Pendaftaran',
//                            'type' => 'raw',
//                            'value' => $model->idPendaftaran,
//                        ),
                        array(
                            'name' => 'Mahasiswa',
                            'value' => $model->nIM->Nama,
                        ),
                        array(
                            'name' => 'Tanggal Daftar',
                            'value' => $model->Tanggal,
                        ),
                        array(
                            'name' => 'Sidang',
                            'value' => $model->idSidang->iDJenisSidang->NamaSidang,
                        ),
                        array(
                            'name' => 'Kode',
                            'value' => $model->KodePembimbing1,
                        ),
                        array(
                            'name' => 'Nama P1',
                            'value' => $model->kodePembimbing1->NamaDosen,
                        ),
                        array(
                            'name' => 'Kode',
                            'value' => $model->KodePembimbing2,
                        ),
                        array(
                            'name' => 'Nama P2',
                            'value' => $model->kodePembimbing2->NamaDosen,
                        ),
                        array(
                            'name' => 'Judul KP/Skripsi',
                            'value' => strtoupper($model->Judul),
                        ),
                    ),
                ));
                ?>
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

