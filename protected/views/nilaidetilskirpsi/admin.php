<?php
/* @var $this NilaidetilskirpsiController */
/* @var $model Nilaidetilskirpsi */

$this->breadcrumbs = array(
    'Nilai Detil Skirpsi' => array('index'),
    'Manage',
);



$this->menu = array(
        // array('label'=>'<i class="fa fa-plus"></i><span>Tambah</span>', 'url'=>array('create')),
        // array('label' => '<i class="fa fa-eye"></i><span>Lihat</span>', 'url' => array('index')),
);
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



<div class="col-lg-12">
    <div class="main-box clearfix">
        <header class="main-box-header clearfix">
            <h2 class="pull-left"><i class="fa fa-bars"></i> Nilai Sidang Pra sidang dan Sidang Skripsi</h2> 
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
                    'id' => 'nilaidetilskirpsi-grid',
                    'dataProvider' => $model->search(),
                    // 'filter' => $model,
                    'columns' => array(
                        array(
                            'header' => "No",
                            'value' => '($this->grid->dataProvider->pagination->currentPage*
                                       $this->grid->dataProvider->pagination->pageSize
                                      )+
                                      array_search($data,$this->grid->dataProvider->getData())+1',
                        ),
                        'idPendaftaran.NIM',
                        array(
                            'type' => 'raw',
                            'header' => 'Nama',
                            'htmlOptions' => array('width' => '15%'),
                            'value' => 'CHtml::encode(strtoupper($data->idPendaftaran->nIM->Nama))',
                            'value' => 'CHtml::link(strtoupper($data->idPendaftaran->nIM->Nama), array("pengujiskripsi/create","id"=> $data["IdPendaftaran"]))',
                        ),
                        array(
                            'type' => 'raw',
                            'header' => 'Nama',
                            'htmlOptions' => array('width' => '6%'),
                            'value' => 'CHtml::encode(strtoupper($data->idPendaftaran->idSidang->iDJenisSidang->NamaSidang))',
                        ),
                        array(
                            'type' => 'raw',
                            'header' => 'Nama',
                           // 'htmlOptions' => array('width' => '15%'),
                            'value' => 'CHtml::encode(strtoupper($data->idPendaftaran->Judul))',
                        ),
                        array(
                            'type' => 'raw',
                            'header' => 'Penguji 1',
                            'htmlOptions' => array('width' => '10%'),
                            'value' => 'CHtml::link($data["NilaiPenguji1"]==null?0:$data["NilaiPenguji1"], array("nilaidetilskirpsi/create","idNilaiSkripsi"=> $data["idNilaiSkripsi"],"NIM"=> $data->idPendaftaran->NIM))',
                        ),
                        array(
                            'type' => 'raw',
                            'header' => 'Penguji 2',
                            'htmlOptions' => array('width' => '10%'),
                            'value' => 'CHtml::link($data["NIlaiPenguji2"]==null?0:$data["NIlaiPenguji2"], array("nilaidetilskirpsi/create","idNilaiSkripsi"=> $data["idNilaiSkripsi"],"NIM"=> $data->idPendaftaran->NIM))',
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{na}{delete}',
                            'htmlOptions' => array('width' => '', 'style' => 'text-align:center'),
                            'buttons' => array
                                (
                                'na' => array
                                    (
                                    'label' => 'Nilai Keseluruhan',
                                    'imageUrl' => Yii::app()->request->baseUrl . '/images/folder.png',
                                    'url' => 'Yii::app()->createUrl("nilaimasterskripsi/adminMhsNim",array("MhsNim"=>$data->idPendaftaran->NIM))',
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