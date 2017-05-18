<?php
/* @var $this TaController */
/* @var $model Ta */

$this->breadcrumbs=array(
	'Tas'=>array('index'),
	$model->IdTa=>array('view','id'=>$model->IdTa),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ta', 'url'=>array('index')),
	array('label'=>'Create Ta', 'url'=>array('create')),
	array('label'=>'View Ta', 'url'=>array('view', 'id'=>$model->IdTa)),
	array('label'=>'Manage Ta', 'url'=>array('admin')),
);
?>

<h1>Update Ta <?php echo $model->IdTa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>