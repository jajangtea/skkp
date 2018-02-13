<?php
/* @var $this PengajuanController */
/* @var $model Pengajuan */

$this->breadcrumbs = array(
    'Pengajuan' => array('index'),
        // $model->IDPengajuan,
);

$this->menu = array(
//	array('label'=>'List UserPegawai', 'url'=>array('index')),
//	array('label'=>'Create UserPegawai', 'url'=>array('create')),
//	array('label'=>'Update UserPegawai', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete UserPegawai', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label' => 'Data Pengajuan', 'url' => array('viewlengkap', 'NIM' => Yii::app()->user->getUsername())),
);

//echo CHtml::link('Lanjutkan <i class="fa  fa-arrow-right fa-lg"></i>', array('pengajuan/update', 'IDPengajuan' => $IDPengajuan, 'IDJenisSidang' => $IDJenisSidang), array('class' => 'btn btn-primary pull-left'));
?>

<div class="main-box clearfix">
    <div class="row-fluid">
        <div class="span12">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => "Data Pengajuan Proposal",
            ));
            ?>
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'news-grid',
                'itemsCssClass' => 'table table-hover',
                'dataProvider' => $dataProviderUpload,
                //'template'=>"{items}",
                'columns' => array(
                    array(
                        'header' => "No",
                        'value' => '($this->grid->dataProvider->pagination->currentPage*
                                       $this->grid->dataProvider->pagination->pageSize
                                      )+
                                      array_search($data,$this->grid->dataProvider->getData())+1',
                        'htmlOptions' => array('width' => '1%'),
                    ),
                    array(
                        'type' => 'raw',
                        'header' => 'Tanggal Daftar',
                        'htmlOptions' => array('width' => '3%'),
                        'value' => '$data["TanggalDaftar"]',
                    ),
                    array(
                        'type' => 'raw',
                        'header' => 'Proposal',
                        'htmlOptions' => array('width' => '8%'),
                        'value' => '$data["NamaSidang"]',
                    ),
                    array(
                        'type' => 'raw',
                        'header' => 'Judul',
                        'htmlOptions' => array('width' => '30%'),
                        'value' => '$data["Judul"]',
                    ),
                    array(
                        'type' => 'raw',
                        'header' => 'Status',
                        'htmlOptions' => array('width' => '10%'),
                        'value' => '$data["statusProposal"]',
                    ),
                    array(
                        'type' => 'raw',
                        'header' => 'Keterangan',
                        'htmlOptions' => array('width' => '10%'),
                        'value' => '$data["keterangan"]==null ? "-" : $data["statusProposal"]',
                    ),
                    array(
                        'type' => 'raw',
                        // 'header' => 'Aksi',
                        'htmlOptions' => array('width' => '10%'),
                        'value' => 'Chtml::link("<span class=\"badge badge-info\">Lihat</span>",array("pengajuan/view","IDPengajuan"=>$data["IDPengajuan"],"IDJenisSidang"=>$data["IDJenisSidang"]))." | ".Chtml::link("<span class=\"badge badge-important\">Hapus</span>",array("pengajuan/delete","IDPengajuan"=>$data["IDPengajuan"]))',
                    ),
                ),
            ));
            ?>
            <?php $this->endWidget(); ?>

        </div>
    </div>
</div>
