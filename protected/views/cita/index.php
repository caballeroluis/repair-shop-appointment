<?php 
if (Yii::app()->user->isGuest) {
  header('Location: http://'. $_SERVER['SERVER_NAME'].':' . $_SERVER['SERVER_PORT']. '/web/index.php/site/login');
  die();
} else {
  
}
?>
<?php
/* @var $this CitaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Citas',
);

$this->menu=array(
	array('label'=>'Create Cita', 'url'=>array('create')),
	array('label'=>'Manage Cita', 'url'=>array('admin')),
);
?>

<h1>Citas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
