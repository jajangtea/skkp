<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */

$this->breadcrumbs = array(
    'Nilai KP' => array('index'),
    'Manage',
);

$this->menu = array(
    //array('label' => '<i class="fa fa-plus"></i><span>Tambah</span>', 'url' => array('create')),
);
?>

<hr/>

<div class="row">

</div><!-- search-form -->
<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Penilaian Penguji Pra/Sidang Skripsi</h2> 
                <div class="filter-block pull-right">                                                   
                    <a id="ctl0_maincontent_btnPrintOut" class="btn btn-primary pull-left" title="Print Out Daftar Matkul" href="#"><i class="fa fa-print fa-lg"></i></a> 	
                    <?php echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('create'), array('class' => 'btn btn-primary pull-left')); ?>
                </div>
            </header>
            <div class="main-box-body clearfix">  
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'nilaipenguji-grid',
                        'dataProvider' => $dataProviderNpSkripsi,
                        //'filter' => $model,
                        'columns' => array(
                            array(
                                'header' => "No",
                                'value' => '($this->grid->dataProvider->pagination->currentPage*
                           $this->grid->dataProvider->pagination->pageSize
                          )+
                          array_search($data,$this->grid->dataProvider->getData())+1',
                            ),
                            array(
                                'type' => 'raw',
                                'header' => 'NIM',
                                //'headerHtmlOptions' => array('style' => 'display:none'),
                                'htmlOptions' => array('width' => '10%'),
                                'value' => '$data["NIM"]',
                            ),
                            array(
                                'type' => 'raw',
                                'header' => 'Nama',
                                //'headerHtmlOptions' => array('style' => 'display:none'),
                                'htmlOptions' => array('width' => '15%'),
                                'value'=>'$data["Nama"]',
                            ),
                            array(
                                'type' => 'raw',
                                'header' => 'Sidang',
                                //'headerHtmlOptions' => array('style' => 'display:none'),
                                'htmlOptions' => array('width' => '10%'),
                                'value'=>'$data["NamaSidang"]',
                            ),
                            array(
                                'type' => 'raw',
                                'header' => 'Judul',
                                'htmlOptions' => array('width' => '40%'),
                                'value'=>'$data["Judul"]',
                            ),
                            array(
                                'type' => 'raw',
                                'header' => 'Penguji 1',
                                'htmlOptions' => array('width' => '15%'),
                                'value'=>'CHtml::link($data["NilaiPenguji1"]==null?0:$data["NilaiPenguji1"], array("nilaidetilskirpsi/create","idNilaiSkripsi"=> $data["idNilaiSkripsi"],"NIM"=> $data["NIM"]))',
                            ),
                            array(
                                'type' => 'raw',
                                'header' => 'Penguji 2',
                                'htmlOptions' => array('width' => '25%'),
                                'value'=>'CHtml::link($data["NIlaiPenguji2"]==null?0:$data["NIlaiPenguji2"], array("nilaidetilskirpsi/create","idNilaiSkripsi"=> $data["idNilaiSkripsi"],"NIM"=> $data["NIM"]))',
                            ),
                            
                        ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>   
</div>