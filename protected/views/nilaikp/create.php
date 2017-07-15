<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */

$this->breadcrumbs=array(
	'Nilaikps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-wrench"></i><span>Kelola</span>', 'url'=>array('admin')),
);
?>

<hr/>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>