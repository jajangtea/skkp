<?php
/* @var $this PengajuanController */
/* @var $model Pengajuan */

$this->breadcrumbs = array(
    'Pengajuan' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Daftar Pengajuan', 'url' => array('index')),
        // array('label' => 'Tambah Pengajuan', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pengajuan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Data Pengajuan KP/Skripsi</h1>


<div class="search-form">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'pengajuan-grid',
    'itemsCssClass' => 'table table-striped',
    'dataProvider' => $model->search(),
    //'filter'=>$model,
    'columns' => array(
        array(
            'header' => "No",
            'value' => '($this->grid->dataProvider->pagination->currentPage*
                                               $this->grid->dataProvider->pagination->pageSize
                                              )+
                                              array_search($data,$this->grid->dataProvider->getData())+1',
            'htmlOptions' => array(
                'style' => 'width: 2%; text-align: center;',
            ),
        ),
        'iDJenisSidang.NamaSidang',
        'nIM.Nama',
        'NIM',
        'TanggalDaftar',
        array(
            'name' => 'Judul',
            'type' => 'raw',
            'header' => 'Judul',
            'value' => 'strtoupper($data->Judul)',
            // 'value' => '$data->idstatusProposal0->statusProposal',
            'htmlOptions' => array('width' => '350px'),
        ),
       
        array(
            'name' => 'idstatusProposal',
            'type' => 'raw',
            'header' => 'Status',
            //'value' => '$data->idstatusProposal==1?strtoupper("Diterima"):strtoupper("Ditolak")',
             'value' => '$data->idstatusProposal',//0->statusProposal',
            'htmlOptions' => array('width' => '40px'),
        ),
        'keterangan',
//        array(
//            'class' => 'CButtonColumn',
//            'visible'=>Yii::app()->user->getLevel() == 2,
//        ),
        array
            (
            'class' => 'CButtonColumn',
            'template' => '{verifikasi}{delete}',
            'buttons' => array
            (
                'verifikasi' => array
                (
                    'label' => 'Verifikasi',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/sync.png',
                    'url' => ' Yii::app()->createUrl("pengajuan/verifikasi", array("id"=>$data["IDPengajuan"]))',
                //'click' => 'function(){return confirm("Password akan direset menjadi 1234 ?");}',
                ),
                'delete' => array
                (
                    'label' => 'Hapus',
                  //  'imageUrl' => Yii::app()->request->baseUrl . '/images/sync.png',
                    'url' => ' Yii::app()->createUrl("pengajuan/delete", array("id"=>$data["IDPengajuan"]))',
                    'click' => 'function(){return confirm("Apakah akan dihapus ?");}',
                ),
            ),
        ),
    ),
));
?>
