<?php
/* @var $this PersyaratanKpController */
/* @var $model PersyaratanKp */

$this->breadcrumbs = array(
    'Persyaratan Kps' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List PersyaratanKp', 'url' => array('index')),
    array('label' => 'Create PersyaratanKp', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#persyaratan-kp-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<br/>
<h1>Persyaratan Dokumen </h1>
<p class="label label-info">Lengkapi dokumen persyaratan anda.</p>
<br/>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'persyaratan-kp-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => "No",
            'value' => '($this->grid->dataProvider->pagination->currentPage*
                                       $this->grid->dataProvider->pagination->pageSize
                                      )+
                                      array_search($data,$this->grid->dataProvider->getData())+1',
        ),
        array(
            'name' => 'formKeteranganLunas',
            'type' => 'raw',
            'header' => 'Pembayaran',
            'value' =>'$data->formKeteranganLunas== null ? "Belum upload" : $data->formKeteranganLunas',
            'htmlOptions' => array('width' => '40px'),
        ),
        array(
            'name' => 'formPersetujuanKp',
            'type' => 'raw',
            'header' => 'Persetujuan',
            'value' =>'$data->formPersetujuanKp== null ? "Belum upload" : $data->formPersetujuanKp',
            'htmlOptions' => array('width' => '40px'),
        ),
        array(
            'name' => 'formPenilaianPerusahaan',
            'type' => 'raw',
            'header' => 'Perusahaan',
            'value' =>'$data->formPenilaianPerusahaan== null ? "Belum upload" : $data->formPenilaianPerusahaan',
            'htmlOptions' => array('width' => '40px'),
        ),
        
        array(
            'name' => 'formPendaftaran',
            'type' => 'raw',
            'header' => 'formPendaftaran',
            'value' =>'$data->formPendaftaran== null ? "Belum upload" : $data->formPendaftaran',
            'htmlOptions' => array('width' => '40px'),
        ),
        array(
            'name' => 'formPendaftaran',
            'type' => 'raw',
            'header' => 'formPendaftaran',
            'value' =>'$data->formPendaftaran== null ? "Belum upload" : $data->formPendaftaran',
            'htmlOptions' => array('width' => '40px'),
        ),
        array(
            'name' => 'formBimbingan',
            'type' => 'raw',
            'header' => 'formBimbingan',
            'value' =>'$data->formBimbingan== null ? "Belum upload" : $data->formBimbingan',
            'htmlOptions' => array('width' => '40px'),
        ),
        array(
            'name' => 'formKehalian',
            'type' => 'raw',
            'header' => 'formKehalian',
            'value' =>'$data->formKehalian== null ? "Belum upload" : $data->formKehalian',
            'htmlOptions' => array('width' => '40px'),
        ),
      
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
