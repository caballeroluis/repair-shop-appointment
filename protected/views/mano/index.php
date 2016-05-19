<?php
/* @var $this ManoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Manos',
);

$this->menu=array(
	array('label'=>'Create Mano', 'url'=>array('create')),
	array('label'=>'Manage Mano', 'url'=>array('admin')),
);
?>

<h1>Manos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
