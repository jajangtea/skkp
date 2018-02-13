<?php
/* @var $this PembimbingController */
/* @var $model Pembimbing */

$this->breadcrumbs = array(
    'Pembimbings' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Tambah Pembimbing', 'url' => array('create'),'visible' => Yii::app()->user->getLevel() == 1),
    array('label' => 'Data Mahasiswa', 'url' => array('admin'),'visible' => Yii::app()->user->getLevel() == 3),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pembimbing-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Kelola Pembimbing</h3 >


<?php //echo CHtml::link('Pencarian Lanjut', '#', array('class' => 'search-button btn btn-success')); ?>
<div class="search-form">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'pembimbing-grid',
    'itemsCssClass' => 'table table-striped',
    'dataProvider' => $model->search(),
   // 'filter' => $model,
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
        array(
            'name' => 'idDosen',
            'type' => 'raw',
            'header' => 'Pembimbing',
            'value' => '$data->idDosen0->username',
            'htmlOptions' => array('width' => '40px'),
        ),
        'idPengajuan0.NIM',
        'idPengajuan0.nIM.Nama',
        'idPengajuan0.Judul',
        array
            (
            'class' => 'CButtonColumn',
            'template' => '{download}{delete}',
            'buttons' => array
            (
                'download' => array
                (
                    'label' => 'Download',
                   // 'imageUrl' => Yii::app()->request->baseUrl . '/images/sync.png',
                    'url' => ' Yii::app()->createUrl("pembimbing/view", array("id"=>$data["idPembimbing"],"idPengajuan"=>$data["idPengajuan"]))',
                //'click' => 'function(){return confirm("Password akan direset menjadi 1234 ?");}',
                ),
                'delete' => array
                (
                    'label' => 'Hapus',
                  //  'imageUrl' => Yii::app()->request->baseUrl . '/images/sync.png',
                    'url' => ' Yii::app()->createUrl("pengajuan/delete", array("id"=>$data["idPembimbing"]))',
                    'click' => 'function(){return confirm("Apakah akan dihapus ?");}',
                ),
            ),
        ),
    ),
));
?>
