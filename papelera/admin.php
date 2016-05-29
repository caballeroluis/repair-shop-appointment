<?php
/* @var $this CalendarioFormController */
/* @var $model CalendarioForm */

$this->breadcrumbs=array(
	'Calendario Forms'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CalendarioForm', 'url'=>array('index')),
	array('label'=>'Create CalendarioForm', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#calendario-form-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Calendario Forms</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'calendario-form-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'fecha_cita',
		'fecha_creacion',
		'fecha_modificacion',
		'vivo',
		'fecha_cal_recogida',
		'fecha_gusto_recogida',
		/*
		'precio_cal',
		'observaciones',
		'estado_id',
		'cliente_id',
		'id',
		'prioridad',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
