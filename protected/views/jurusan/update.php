<?php
/* @var $this JurusanController */
/* @var $model Jurusan */

$this->breadcrumbs=array(
	'Jurusans'=>array('index'),
	$model->KodeJurusan=>array('view','id'=>$model->KodeJurusan),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jurusan', 'url'=>array('index')),
	array('label'=>'Create Jurusan', 'url'=>array('create')),
	array('label'=>'View Jurusan', 'url'=>array('view', 'id'=>$model->KodeJurusan)),
	array('label'=>'Manage Jurusan', 'url'=>array('admin')),
);
?>

<h1>Update Jurusan <?php echo $model->KodeJurusan; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>