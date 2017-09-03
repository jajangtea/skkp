<?php
/* @var $this PengajuanController */
/* @var $model Pengajuan */

$this->breadcrumbs = array(
    'Pengajuan' => array('index'),
        // $model->IDPengajuan,
);
?>

<div class="main-box clearfix">
    <header class="main-box-header clearfix">
        <h2 class="pull-left"><i class="fa fa-bars"></i> Upload Persyaratan</h2> 
        <div class="filter-block pull-right">                                                   
            <?php //echo CHtml::link('<i class="fa  fa-times-circle fa-lg"></i>', array('pengajuan/view', 'IDPengajuan' => $IDPengajuan, 'IDJenisSidang' => $IDJenisSidang), array('class' => 'btn btn-primary pull-left')); ?>
            <?php echo CHtml::link('<i class="fa  fa-times-circle fa-lg"></i>', array('pengajuan/create'), array('class' => 'btn btn-primary pull-left')); ?>
        </div>
    </header>
    <div class="main-box-body clearfix"> 
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'news-grid',
            'dataProvider' => $dataProviderUpload,
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
                    'header' => 'Aksi',
                    'htmlOptions' => array('width' => '10%'),
                    'value' => '$data["namaFile"]==null ? Chtml::link("Upload",
				array("uploadProposal/create","IDPengajuan"=>$data["IDPengajuan"],"idsyarat"=>$data["idPersyaratan"])) : Chtml::link("Lihat",
				array("uploadProposal/view","id"=>$data["idUpload"]))."|". Chtml::link("Hapus",
				array("uploadProposal/delete","id"=>$data["idUpload"],"IDJenisSidang"=>$data["IDJenisSidang"],"idDaftar"=>$data["IDPengajuan"]))',
                ),
            ),
        ));
        ?>
        <?php
           $cekSyarat= Pendaftaran::model()->cekPersyaratanProposal($IDJenisSidang,$IDPengajuan);
           echo '<p class="label label-info">';
           echo $cekSyarat;
           echo '</p>';
        ?>
        
    </div>
</div>
