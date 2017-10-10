<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */

$this->breadcrumbs = array(
    'Periode' => array('index'),
    'Kelola',
);
//$this->menu = array(
//    array('label' =>'<i class="fa fa-plus"></i><span>Tambah</span>', 'url' => array('create')),
//);
Yii::app()->clientScript->registerScript('down', "
jQuery('#nilaikp-grid a.down').live('click',function() {
        if(!confirm('Are you sure you want to mark this commission as PAID?')) return false;
        
        var url = $(this).attr('href');
        //  do your post request here
        $.post(url,function(res){
             alert(res);
         });
        return false;
});
");

$this->renderPartial('_search', array(
    'model' => $model,
));
?>

<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Periode Sidang</h2> 
                <div class="filter-block pull-right">                                                   
                    <a id="ctl0_maincontent_btnPrintOut" class="btn btn-primary pull-left" title="Print Out Daftar Matkul" href="#"><i class="fa fa-print fa-lg"></i></a> 	
                    <?php echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('create'), array('class' => 'btn btn-primary pull-left')); ?>
                </div>
            </header>
            <div class="main-box-body clearfix">  
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'periode-grid',
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
                            'tahun',
                            array(
                                'name' => 'bulan',
                                'type' => 'raw',
                                'header' => 'Bulan',
                                'value' => 'CHtml::encode($data->ubahBulan())',
                                'htmlOptions' => array('width' => ''),
                            ),
                            'statusVakasi',
                            array
                                (
                                'class' => 'CButtonColumn',
                                'template' => '{create}{update}{delete}',
                                'buttons' => array
                                    (
                                    'create' => array
                                        (
                                        'label' => 'Tambah Sidang',
                                        'imageUrl' => Yii::app()->request->baseUrl . '/images/plus.png',
                                        'options' => array('class' => 'create'),
                                        'url' => ' Yii::app()->createUrl("sidangmaster/create", array("idPeriode"=>$data->idPeriode))',
                                    ),
                                    'update' => array
                                        (
                                        'label' => 'Ubah',
                                        'imageUrl' => Yii::app()->request->baseUrl . '/images/update.png',
                                        'options' => array('class' => 'update'),
                                        'url' => '$data->idPeriode',
                                    ),
                                    'delete' => array
                                        (
                                        'label' => 'Hapus',
                                        'imageUrl' => Yii::app()->request->baseUrl . '/images/delete.png',
                                        'options' => array('class' => 'delete'),
                                        'url' => '$data->idPeriode',
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
