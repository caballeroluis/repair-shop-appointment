<?php
/* @var $this CategoriaPiezaController */
/* @var $model CategoriaPieza */

$this->breadcrumbs=array(
	'Categoria Piezas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CategoriaPieza', 'url'=>array('index')),
	array('label'=>'Manage CategoriaPieza', 'url'=>array('admin')),
);
?>

<h1>Create CategoriaPieza</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>