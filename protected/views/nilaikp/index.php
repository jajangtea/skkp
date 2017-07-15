<?php
/* @var $this NilaikpController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Nilai Kerja Praktek',
);

if (!Yii::app()->user->getLevel() == 2) {
    $this->menu = array(
        array('label' =>'<i class="fa fa-plus"></i><span>Tambah</span>', 'url' => array('create')),
        array('label' =>'<i class="fa fa-wrench"></i><span>Kelola</span>', 'url' => array('admin')),
    );
}
?>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
