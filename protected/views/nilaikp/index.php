<?php
/* @var $this NilaikpController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Nilai Kerja Praktek',
);

if (!Yii::app()->user->getLevel() == 2) {
    $this->menu = array(
        array('label' => 'Create Nilaikp', 'url' => array('create')),
        array('label' => 'Manage Nilaikp', 'url' => array('admin')),
    );
}
?>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
