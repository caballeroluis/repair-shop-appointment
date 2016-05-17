<?php 
if (Yii::app()->user->isGuest) {
  $this->redirect(array('site/login'));
  Yii::app()->end();
}
?>
<?php
/* @var $this CitaController */
/* @var $model Cita */

$this->breadcrumbs=array(
	'Citas'=>array('index'),
	$model->fecha_cita,
);

$this->menu=array(
	array('label'=>'List Cita', 'url'=>array('index')),
	array('label'=>'Create Cita', 'url'=>array('create')),
	array('label'=>'Update Cita', 'url'=>array('update', 'id'=>$model->fecha_cita)),
	array('label'=>'Delete Cita', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fecha_cita),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cita', 'url'=>array('admin')),
);
?>

<h1>View Cita #<?php echo $model->fecha_cita; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fecha_cita',
		'fecha_creacion',
		'fecha_modificacion',
		'vivo',
		'fecha_cal_recogida',
		'fecha_gusto_recogida',
		'precio_cal',
		'observaciones',
		'estado_id',
		'cliente_id',
	),
)); ?>
