<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */

$this->breadcrumbs = array(
    'Nilai KP' => array('index'),
    'Manage',
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
                <h2 class="pull-left"><i class="fa fa-bars"></i> Data Nilai KP</h2> 
                <div class="filter-block pull-right">                                                   
                </div>
            </header>
            <div class="main-box-body clearfix">  
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'nilaikp-grid',
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
                            'NIM',
                            'nIM.Nama',
                            'NilaiPembimbing',
                            'NilaiPenguji',
                            'NilaiPerusahaan',
                            'NA',
                            'Index',
//                            array(
//                                'class' => 'CButtonColumn',
//                            ),
                            array
                                (
                                'class' => 'CButtonColumn',
                                'template' => '{down}{update}{delete}',
                                'buttons' => array
                                    (
                                    'down' => array
                                        (
                                        'label' => 'Nilai Huruf',
                                        'imageUrl' => Yii::app()->request->baseUrl . '/images/sync.png',
                                        'options'=>array('class'=>'down'),
                                        'url' => ' Yii::app()->createUrl("nilaikp/reset", array("NIM"=>$data["NIM"]))',
                                        //'click' => 'function(){return confirm("Password akan direset menjadi 1234 ?");}',
                                    ),
                                    'update' => array
                                        (
                                        'label' => 'Ubah',
                                        'imageUrl' => Yii::app()->request->baseUrl . '/images/update.png',
                                        'options'=>array('class'=>'down'),
                                        'url' => ' Yii::app()->createUrl("nilaikp/update", array("NIM"=>$data["NIM"],"idPengajuan"=>$data["idPengajuan"]))',
                                    ),
                                    'delete' => array
                                        (
                                        'label' => 'Hapus',
                                        'imageUrl' => Yii::app()->request->baseUrl . '/images/delete.png',
                                        'options'=>array('class'=>'down'),
                                        'url' => ' Yii::app()->createUrl("nilaikp/delete", array("NIM"=>$data["NIM"]))',
                                        //'click' => 'function(){return confirm("Password akan direset menjadi 1234 ?");}',
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

