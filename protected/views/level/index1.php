<?php
/* @var $this LevelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Levels',
);

$this->menu = array(
    array('label' => 'Create Level', 'url' => array('create')),
    array('label' => 'Manage Level', 'url' => array('admin')),
);
?>

<h1>Levels</h1>

<?php
//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); 
?>

<script type="text/javascript">
    var x = 'nilai string';
    document.writeln(x);
    document.write('<br/>');
    function ubahnilai(){
    x=175;
    alert(x);
    document.writeln('<br><input type=button value="kembali ke asal nya" onclick="javascript:history.back();">');

    }
</script>

<input type="button" value="ubah nilainya" onclick="javascript:ubahnilai();">
