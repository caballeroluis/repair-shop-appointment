<?php
/* @var $this CategoriaPiezaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categoria Piezas',
);

$this->menu=array(
	array('label'=>'Create CategoriaPieza', 'url'=>array('create')),
	array('label'=>'Manage CategoriaPieza', 'url'=>array('admin')),
);
?>

<h1>Categoria Piezas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
