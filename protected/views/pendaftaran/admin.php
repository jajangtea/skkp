<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */

$this->breadcrumbs = array(
    'Pendaftaran' => array('index'),
    'Manage',
);
?>

<h1>Kelola Pendaftaran</h1>
<div class="search-form">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    $this->menu=array(
	array('label'=>'Daftar Sidang', 'url'=>array('create')),
);
    ?>
    
</div><!-- search-form -->

<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Data Pendaftaran</h2> 
                <div class="filter-block pull-right">                                                   
                    <a id="ctl0_maincontent_btnPrintOut" class="btn btn-primary pull-left" title="Print Out Daftar Matkul" href="#"><i class="fa fa-print fa-lg"></i></a> 	
                    <?php echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('create'), array('class' => 'btn btn-primary pull-left')); ?>
                </div>
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
                            array(
                                'name' => 'Tanggal',
                                'type' => 'raw',
                                'header' => 'Tgl.Daftar',
                                'value' => '$data->Tanggal',
                                'htmlOptions'=>array('width'=>'40px'),
                            ),
                            
                            'NIM',
                            array(
                                'name' => 'NIM',
                                'type' => 'raw',
                                'header' => 'Mahasiswa',
                                'value' => 'CHtml::encode($data->nIM->Nama)',
                                'htmlOptions'=>array('width'=>'40px'),
                            ),
                            'idSidang.iDJenisSidang.NamaSidang',
                            array(
                                'name' => 'KodePembimbing1',
                                'type' => 'raw',
                                'header' => 'P1',
                                'value' => 'CHtml::encode($data->kodePembimbing1->KodeDosen)',
                                'htmlOptions'=>array('width'=>'40px'),
                            ),
                            array(
                                'name' => 'KodePembimbing1',
                                'type' => 'raw',
                                'header' => 'Nama Dosen',
                                'value' => 'CHtml::encode($data->kodePembimbing1->NamaDosen)',
                                'htmlOptions'=>array('width'=>'160px'),
                            ),
                            array(
                                'name' => 'KodePembimbing2',
                                'type' => 'raw',
                                'header' => 'P2',
                                'value' => 'CHtml::encode($data->kodePembimbing2->KodeDosen)',
                                'htmlOptions'=>array('width'=>'40px'),
                            ),
                            array(
                                'name' => 'KodePembimbing1',
                                'type' => 'raw',
                                'header' => 'Nama Dosen',
                                'value' => 'CHtml::encode($data->kodePembimbing2->NamaDosen)',
                                'htmlOptions'=>array('width'=>'160px'),
                            ),
                            array(
                                'name' => 'Judul',
                                'type' => 'raw',
                                'header' => 'Judul',
                                'value' => '$data->Judul',
                                'htmlOptions'=>array('width'=>'260px'),
                            ),
                            'Judul',
                             
                            array(
                                'class' => 'CButtonColumn',
                            ),
                        ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>   