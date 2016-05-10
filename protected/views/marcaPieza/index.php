<?php
/* @var $this MarcaPiezaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Marca Piezas',
);

$this->menu=array(
	array('label'=>'Create MarcaPieza', 'url'=>array('create')),
	array('label'=>'Manage MarcaPieza', 'url'=>array('admin')),
);
?>

<h1>Marca Piezas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
