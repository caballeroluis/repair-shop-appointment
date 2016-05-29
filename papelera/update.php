<?php
/* @var $this CalendarioFormController */
/* @var $model CalendarioForm */

$this->breadcrumbs=array(
	'Calendario Forms'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CalendarioForm', 'url'=>array('index')),
	array('label'=>'Create CalendarioForm', 'url'=>array('create')),
	array('label'=>'View CalendarioForm', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CalendarioForm', 'url'=>array('admin')),
);
?>

<h1>Update CalendarioForm <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>