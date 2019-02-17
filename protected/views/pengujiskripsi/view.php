<?php
/* @var $this PengujiskripsiController */
/* @var $model Pengujiskripsi */

$this->breadcrumbs = array(
    'Pengujiskripsis' => array('index'),
    $model->idPengujiSkripsi,
);


?>

<h1>View Pengujiskripsi #<?php echo $model->idPengujiSkripsi; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'name' => 'NIM',
            'type' => 'raw',
            'value' => $model->idPendaftaran0->NIM,
        ),
        array(
            'name' => 'Mahasiswa',
            'value' => $model->idPendaftaran0->nIM->Nama,
        ),
        array(
            'name' => 'Judul',
            'value' => $model->idPendaftaran0->Judul,
        ),
        'nilai',
    ),
));
?>
