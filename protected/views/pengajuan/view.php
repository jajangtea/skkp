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
?>

<div class="main-box clearfix">
    <header class="main-box-header clearfix">
        <div class="filter-block pull-right">                                                   
            <?php
            if (Pendaftaran::model()->cekPersyaratanProposal($IDJenisSidang, $IDPengajuan) == "Syarat Lengkap" && $IDPengajuan != 0) {
                echo CHtml::link('Lanjutkan <i class="fa  fa-arrow-right fa-lg"></i>', array('pengajuan/update', 'IDPengajuan' => $IDPengajuan, 'IDJenisSidang' => $IDJenisSidang), array('class' => 'btn btn-primary pull-left'));
            }
            ?>
        </div>
    </header>
    <div class="row-fluid">
        <div class="span12">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => "<i class=\"fa fa-bars\"></i> Upload Persyaratan",
            ));
            ?>
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'news-grid',
                'itemsCssClass' => 'table table-hover',
                'template' => "{items}",
                'dataProvider' => $dataProviderUpload,
                'columns' => array(
                    array(
                        'header' => "No",
                        'value' => '($this->grid->dataProvider->pagination->currentPage *
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
                        'header' => 'Aksi',
                        'htmlOptions' => array('width' => '10%'),
                        'value' => '$data["namaFile"]==null ? Chtml::link("<span class=\"badge badge-warning\">Upload</span>",
				array("uploadProposal/create","IDPengajuan"=>$data["IDPengajuan"],"idsyarat"=>$data["idPersyaratan"])) : Chtml::link("<span class=\"badge badge-info\">Lihat</span>",
				array("uploadProposal/view","id"=>$data["idUpload"]))."|". Chtml::link("<span class=\"badge badge-important\">Hapus</span>",
				array("uploadProposal/delete","id"=>$data["idUpload"],"IDJenisSidang"=>$data["IDJenisSidang"],"idDaftar"=>$data["IDPengajuan"]))',
                    ),
                ),
            ));
            ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <?php
    $cekSyarat = Pendaftaran::model()->cekPersyaratanProposal($IDJenisSidang, $IDPengajuan);
    echo '<p class="label label-info">';
    echo $cekSyarat;
    echo '</p>';
    ?>

</div>
</div>
