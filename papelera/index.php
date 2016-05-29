<?php
/* @var $this CalendarioFormController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Calendario Forms',
);

$this->menu=array(
	array('label'=>'Create CalendarioForm', 'url'=>array('create')),
	array('label'=>'Manage CalendarioForm', 'url'=>array('admin')),
);
?>

<h1>Calendario Forms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
