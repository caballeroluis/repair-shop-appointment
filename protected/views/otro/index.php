<?php
/* @var $this OtroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Otros',
);

$this->menu=array(
	array('label'=>'Create Otro', 'url'=>array('create')),
	array('label'=>'Manage Otro', 'url'=>array('admin')),
);
?>

<h1>Otros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
