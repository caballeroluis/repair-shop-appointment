<?php 
if (Yii::app()->user->isGuest) {
  header('Location: http://'. $_SERVER['SERVER_NAME'].':' . $_SERVER['SERVER_PORT']. '/web/index.php/site/login');
  die();
} else {
  
}
?>
<?php
/* @var $this EstadoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estados',
);

$this->menu=array(
	array('label'=>'Create Estado', 'url'=>array('create')),
	array('label'=>'Manage Estado', 'url'=>array('admin')),
);
?>

<h1>Estados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
