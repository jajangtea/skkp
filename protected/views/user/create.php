<?php
$this->pageTitle=Yii::app()->name . ' - Registrasi';
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Registrasi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelMhs'=>$modelMhs)); ?>