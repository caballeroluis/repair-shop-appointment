<?php 
if (Yii::app()->user->isGuest) {
  $this->redirect(array('site/login'));
  Yii::app()->end();
}
?>
<?php
/* @var $this MarcaPiezaController */
/* @var $model MarcaPieza */

$this->breadcrumbs=array(
	'Marca Piezas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MarcaPieza', 'url'=>array('index')),
	array('label'=>'Create MarcaPieza', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#marca-pieza-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Marca Piezas</h1>

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
	'id'=>'marca-pieza-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		'imagen',
		'vivo',
		'fecha_creacion',
		'fecha_modificacion',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
