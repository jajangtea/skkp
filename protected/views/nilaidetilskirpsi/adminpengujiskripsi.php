<?php


$this->breadcrumbs = array(
    'Nilai Skripsi' => array('index'),
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
                <?php
                // echo Nilaidetilskirpsi::model()->getTotalSkripsi();
                //  exit();
                ?>
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
                                'value' => '$data["Nama"]',
                            ),
                            array(
                                'type' => 'raw',
                                'header' => 'Sidang',
                                //'headerHtmlOptions' => array('style' => 'display:none'),
                                'htmlOptions' => array('width' => '10%'),
                                'value' => '$data["NamaSidang"]',
                            ),
                            array(
                                'type' => 'raw',
                                'header' => 'Judul',
                                'htmlOptions' => array('width' => '40%'),
                                'value' => '$data["Judul"]',
                            ),
                            array(
                                'type' => 'raw',
                                'header' => 'Nilai Penguji',
                                'htmlOptions' => array('width' => '15%'),
                                'value' => 'CHtml::link($data["nilaiSkripsi"]==null?0:$data["nilaiSkripsi"], array("nilaiPenguji/create","idPengujiSkripsi"=> $data["idPengujiSkripsi"]))',
                            ),
                            array(
                                'type' => 'raw',
                                'header' => 'Vakasi',
                                'value' => '$data["nilaiSkripsi"] == null ? 0:number_format($data["NominalVakasi"], 2)',
                               // 'footer' => $model->getTotals($model->search()->getKeys()),
                                'footer' => Nilaidetilskirpsi::model()->getTotalSkripsi(Yii::app()->user->id),
                                'htmlOptions' => array(
                                    'style' => 'width: 20%; text-align: left;',
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