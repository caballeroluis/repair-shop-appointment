<?php
/* @var $this CategoriaPiezaController */
/* @var $model CategoriaPieza */

$this->breadcrumbs=array(
	'Categoria Piezas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CategoriaPieza', 'url'=>array('index')),
	array('label'=>'Create CategoriaPieza', 'url'=>array('create')),
	array('label'=>'View CategoriaPieza', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CategoriaPieza', 'url'=>array('admin')),
);
?>

<h1>Update CategoriaPieza <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>