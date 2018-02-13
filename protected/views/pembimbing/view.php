<?php
/* @var $this PembimbingController */
/* @var $model Pembimbing */

$this->breadcrumbs = array(
    'Pembimbing' => array('index'),
    $model->idDosen0->username,
);

$this->menu = array(
    array('label' => 'Tambah Pembimbing', 'url' => array('create')),
    array('label' => 'Ubah Pembimbing', 'url' => array('update', 'id' => $model->idPembimbing)),
    array('label' => 'Hapus Pembimbing', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->idPembimbing), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Kelola Pembimbing', 'url' => array('admin')),
);
?>

<h3>Tampil Pembimbing #<?php echo $model->idDosen0->username; ?></h3>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'idDosen0.username',
        'idPengajuan0.NIM',
        'idPengajuan0.nIM.Nama',
        'idPengajuan0.Judul'
    ),
));
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'pembimbing-grid',
    'itemsCssClass' => 'table table-striped',
    'dataProvider' => $modelUploadProposal->searchUpload($idPengajuan),
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
            'name' => 'namaFile',
            'type' => 'raw',
            'value' => 'CHtml::link($data->namaFile,"persyaratan/{$data->namaFile}")',
            'filterHtmlOptions' => array('style' => 'width:40%;')
        ),
        'ukuranFIle',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>



