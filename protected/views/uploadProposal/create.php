<?php
/* @var $this UploadProposalController */
/* @var $model UploadProposal */

$this->breadcrumbs=array(
	'Upload Proposals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Persyaratan', 'url'=>array('index')),
	array('label'=>'Manage Persyaratan', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>