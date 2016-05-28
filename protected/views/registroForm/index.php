<?php
/* @var $this RegistroFormController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Registro Forms',
);

$this->menu=array(
	array('label'=>'Create RegistroForm', 'url'=>array('create')),
	array('label'=>'Manage RegistroForm', 'url'=>array('admin')),
);
?>

<h1>Registro Forms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
