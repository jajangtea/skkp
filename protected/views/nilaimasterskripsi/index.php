<?php
/* @var $this Nilai Master SkripsiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Nilai Master Skripsi',
);

if (!Yii::app()->user->getLevel() == 2) {
    $this->menu = array(
        array('label' => 'Create Nilai Master Skripsi', 'url' => array('create')),
        array('label' => 'Manage Nilai Master Skripsi', 'url' => array('admin')),
    );
}
?>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
