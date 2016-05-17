<?php 
if (Yii::app()->user->isGuest) {
  $this->redirect(array('site/login'));
  Yii::app()->end();
}
?>
<?php
/* @var $this HandicapController */
/* @var $model Handicap */

$this->breadcrumbs=array(
	'Handicaps'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Handicap', 'url'=>array('index')),
	array('label'=>'Create Handicap', 'url'=>array('create')),
	array('label'=>'Update Handicap', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Handicap', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Handicap', 'url'=>array('admin')),
);
?>

<h1>View Handicap #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'recargo',
		'minutos_duracion',
		'imagen',
		'vivo',
		'fecha_creacion',
		'fecha_modificacion',
	),
)); ?>
