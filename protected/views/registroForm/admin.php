<?php
/* @var $this RegistroFormController */
/* @var $model RegistroForm */

$this->breadcrumbs=array(
	'Registro Forms'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RegistroForm', 'url'=>array('index')),
	array('label'=>'Create RegistroForm', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#registro-form-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Registro Forms</h1>

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
	'id'=>'registro-form-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		'apellido1',
		'apellido2',
		'telefono',
		'codigo_postal',
		/*
		'email',
		'fecha_creacion',
		'fecha_modificacion',
		'password',
		'vivo',
		'imagen',
		'codigo_activacion',
		'activado',
		'username',
		'observaciones',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
