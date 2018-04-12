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

<div>
    <?php
    if (Yii::app()->user->getLevel() == 1) {
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
    }
    ?>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Pengajuan Proposal</h2> 
                <?php
                if (Yii::app()->user->getLevel() == 1) {
                    echo "<div class=\"filter-block pull-right\">";
                    echo "<a id=\"ctl0_maincontent_btnPrintOut\" class=\"btn btn-primary pull-left\" title=\"Print Out Data Pendaftaran\" href=\"index.php?r=pendaftaran/export\"><i class=\"fa fa-print fa-lg\"></i></a>";
                    echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('create'), array('class' => 'btn btn-primary pull-left'));
                    echo "</div>";
                }
                ?>

            </header>
            <div class="main-box-body clearfix">  
                <div class="table-responsive">
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
                        'value' => '$data["nstatusProposal"]',
                    ),
                    array(
                        'type' => 'raw',
                        'header' => 'Keterangan',
                        'htmlOptions' => array('width' => '10%'),
                        'value' => '$data["keterangan"]==null ? "-" : $data["nstatusProposal"]',
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
                </div>
            </div>
        </div>
    </div>
</div>   
