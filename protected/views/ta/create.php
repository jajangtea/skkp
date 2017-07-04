<?php
/* @var $this TaController */
/* @var $model Ta */

$this->breadcrumbs=array(
	'TA'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage TA', 'url'=>array('admin')),
);
?>

<h1>Create TA</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>