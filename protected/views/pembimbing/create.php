<?php
/* @var $this PembimbingController */
/* @var $model Pembimbing */

$this->breadcrumbs=array(
	'Pembimbings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pembimbing', 'url'=>array('index')),
	array('label'=>'Manage Pembimbing', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->renderPartial('admin_id', array('model'=>$model,'id'=>$id)); ?>