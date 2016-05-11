<?php 
if (Yii::app()->user->isGuest) {
  header('Location: http://'. $_SERVER['SERVER_NAME'].':' . $_SERVER['SERVER_PORT']. '/web/index.php/site/login');
  die();
} else {
  
}
?>
<?php
/* @var $this MarcaPiezaController */
/* @var $model MarcaPieza */

$this->breadcrumbs=array(
	'Marca Piezas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MarcaPieza', 'url'=>array('index')),
	array('label'=>'Create MarcaPieza', 'url'=>array('create')),
	array('label'=>'View MarcaPieza', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MarcaPieza', 'url'=>array('admin')),
);
?>

<h1>Update MarcaPieza <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>