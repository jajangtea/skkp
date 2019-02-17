<?php
/* @var $this PendaftaranController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pendaftarans',
);


?>

<h1>Pendaftaran</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
