<?php
/* @var $this PengujiskripsiController */
/* @var $model Pengujiskripsi */

$this->breadcrumbs = array(
    'Penguji Skripsi' => array('index'),
    'Tambah',
);
echo '<br/>';
$this->menu = array(
    array('label' => '<i class="fa fa-wrench"></i><span>Kelola Penguji Skripsi</span>', 'url' => array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model' => $model)); ?>
<?php $this->renderPartial('admin_id', array('model'=>$model,'id'=>$id)); ?>