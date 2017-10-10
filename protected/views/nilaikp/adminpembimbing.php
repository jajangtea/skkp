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


</div><!-- search-form -->
<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Penilaian Pembimbing KP</h2> 
                <div class="filter-block pull-right">                                                   
                    <a id="ctl0_maincontent_btnPrintOut" class="btn btn-primary pull-left" title="Print Out Daftar Matkul" href="#"><i class="fa fa-print fa-lg"></i></a> 	
                    <?php echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('create'), array('class' => 'btn btn-primary pull-left')); ?>
                </div>
            </header>
            <div class="main-box-body clearfix">  
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'nilaikp-grid',
                        'dataProvider' => $dataProviderNilaiKp,
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
                                'htmlOptions' => array('width' => '30%'),
                                'value' => '$data["NIM"]',
                            ),
                            array(
                                'type' => 'raw',
                                'header' => 'Nama',
                                //'headerHtmlOptions' => array('style' => 'display:none'),
                                'htmlOptions' => array('width' => '30%'),
                                'value'=>'CHtml::link($data["Nama"], array("nilaikp/create","NIM"=>$data["NIM"]))',
                            ),
                            array(
                                'type' => 'raw',
                                'header' => 'Judul',
                                //'headerHtmlOptions' => array('style' => 'display:none'),
                                'htmlOptions' => array('width' => '30%'),
                                'value'=>'$data["Judul"]',
                            ),
                            array(
                                'type' => 'raw',
                                'header' => 'Nilai',
                                //'headerHtmlOptions' => array('style' => 'display:none'),
                                'htmlOptions' => array('width' => '30%'),
                               // 'value' => '$data["NilaiPembimbing"]==null?0:$data["NilaiPembimbing"]',
                               // 'value'=>'CHtml::link($data->judul, "http://" . $_SERVER["SERVER_NAME"] . Yii::app()->request->baseUrl . "/file/" . $data->nama_file)',
                                'value'=>'CHtml::link($data["NilaiPembimbing"]==null?0:$data["NilaiPembimbing"], array("nilaikp/create","NIM"=> $data["NIM"]))',
                            ),
                            
                        ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>   
</div>