<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */

$this->breadcrumbs = array(
    'Pendaftaran' => array('index'),
    'Manage',
);


?>

<?php //echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>

<div>
    <?php
    if (Yii::app()->user->getLevel() == 1) {
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
    }
    ?>
</div>

<?php
$this->menu = array(
    array('label' => '<i class="fa fa-plus"></i><span>Tambah</span>', 'url' => array('create')),
);
?>

<!-- search-form -->
<hr/>
<div class="admin-form">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <header class="main-box-header clearfix">
                    <h2 class="pull-left"><i class="fa fa-bars"></i> Data Pendaftaran</h2> 
                    <?php
                    if (Yii::app()->user->getLevel() == 1) {
                        echo "<div class=\"filter-block pull-right\">";
                        if ($model->bulan != "" || $model->tahun != "") {
                            echo CHtml::link('<i class="fa  fa-print fa-lg"></i>', array('export', 'bulan' => $model->bulan, 'tahun' => $model->tahun), array('class' => 'btn btn-primary pull-left'));
                        }

                        echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('create'), array('class' => 'btn btn-primary pull-left'));
                        echo "</div>";
                    }
                    ?>

                </header>
                <div class="main-box-body clearfix">  
                    <div class="table-responsive">
                        <?php
                        $this->widget('zii.widgets.grid.CGridView', array(
                            'id' => 'pendaftaran-grid',
                            'dataProvider' => $model->search(),
                            //'filter' => $model,
                            'columns' => array(
                                array(
                                    'header' => "No",
                                    'value' => '($this->grid->dataProvider->pagination->currentPage*
                                       $this->grid->dataProvider->pagination->pageSize
                                      )+
                                      array_search($data,$this->grid->dataProvider->getData())+1',
                                ),
//                            array(
//                                'name' => 'idPendaftaran',
//                                'header' => 'Qrcode',
//                                'type' => 'raw',
//                                'value' => 'CHtml::image(Yii::app()->baseUrl . \'/images/qrcode/\' . $data->idPendaftaran . \'.jpg\' ,\'\')',
//                                'htmlOptions' => array('width' => '5%'),
//                            ),
                                array(
                                    'name' => 'Tanggal',
                                    'type' => 'raw',
                                    'header' => 'Tgl.Daftar',
                                    'value' => '$data->Tanggal',
                                    'htmlOptions' => array('width' => '40px'),
                                ),
                                'NIM',
                                array(
                                    'name' => 'NIM',
                                    'type' => 'raw',
                                    'header' => 'Mahasiswa',
                                    'value' => 'strtoupper(CHtml::encode($data->nIM->Nama))',
                                    'htmlOptions' => array('width' => '70px'),
                                ),
                                array(
                                    'name' => 'NamaSidang',
                                    'type' => 'raw',
                                    'header' => 'Nama Sidang',
                                    'value' => 'strtoupper(CHtml::encode($data->idSidang->iDJenisSidang->NamaSidang))',
                                    'htmlOptions' => array('width' => '70px'),
                                ),
                                array(
                                    'name' => 'KodePembimbing1',
                                    'type' => 'raw',
                                    'header' => 'P1',
                                    'value' => 'CHtml::encode($data->kodePembimbing1->KodeDosen)',
                                    'htmlOptions' => array('width' => '40px'),
                                ),
//                            array(
//                                'name' => 'KodePembimbing1',
//                                'type' => 'raw',
//                                'header' => 'Nama Dosen',
//                                'value' => 'CHtml::encode($data->kodePembimbing1->NamaDosen)',
//                                'htmlOptions' => array('width' => '160px'),
//                            ),
                                array(
                                    'name' => 'KodePembimbing2',
                                    'type' => 'raw',
                                    'header' => 'P2',
                                    'value' => 'CHtml::encode($data->kodePembimbing2->KodeDosen)',
                                    'htmlOptions' => array('width' => '40px'),
                                ),
//                            array(
//                                'name' => 'KodePembimbing1',
//                                'type' => 'raw',
//                                'header' => 'Nama Dosen',
//                                'value' => 'CHtml::encode($data->kodePembimbing2->NamaDosen)',
//                                'htmlOptions' => array('width' => '160px'),
//                            ),
                                array(
                                    'name' => 'Judul',
                                    'type' => 'raw',
                                    'header' => 'Judul',
                                    'value' => 'strtoupper($data->Judul)',
                                    'htmlOptions' => array('width' => '360px'),
                                ),
                                array(
                                    'type' => 'raw',
                                    'header' => 'Keterangan',
                                    'value' => '$data->cekPersyaratan($data->idPendaftaran)',
                                    'htmlOptions' => array('width' => '20px'),
                                // 'cssClassExpression' => '$data->cekPersyaratan($data->idPendaftaran) == "Syarat tidak Lengkap" ? "text text-danger" : "text text-info"',
                                ),
                                array(
                                    'class' => 'CButtonColumn',
                                    'template' => '{upload}{penguji}{delete}',
                                    'htmlOptions' => array('width' => '', 'style' => 'text-align:center'),
                                    'buttons' => array
                                    (
                                        'penguji' => array
                                        (
                                            'label' => 'Penguji KP/Skripsi',
                                            'imageUrl' => Yii::app()->request->baseUrl . '/images/adduser.png',
                                            'url' => '(CHtml::encode($data->idSidang->IDJenisSidang))!="3" ? Yii::app()->createUrl("pengujiskripsi/create", array("id"=>$data->idPendaftaran)) : Yii::app()->createUrl("pengujikp/create", array("id"=>$data->idPendaftaran))',
                                            'visible'=>'Yii::app()->user->getLevel()==1',
                                        ),
                                        'upload' => array
                                        (
                                            'label' => 'Upload',
                                            'imageUrl' => Yii::app()->request->baseUrl . '/images/folder.png',
                                            'url' => 'Yii::app()->createUrl("pendaftaran/view",array("id"=>$data->idPendaftaran))',
                                            //'visible'=>'$data->idSidang->IDJenisSidang=="4" ? false : true',
                                        ),
                                    ),
                                ),
                            ),
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>