<?php
/* @var $this TaController */
/* @var $model Ta */

$this->breadcrumbs=array(
	'TA'=>array('index'),
	$model->IdTa=>array('view','id'=>$model->IdTa),
	'Update',
);

$this->menu=array(
	array('label'=>'Create TA', 'url'=>array('create')),
	array('label'=>'View TA', 'url'=>array('view', 'id'=>$model->IdTa)),
	array('label'=>'Manage TA', 'url'=>array('admin')),
);
?>

<h1>Update TA <?php echo $model->IdTa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>