<?php 
if (Yii::app()->user->isGuest) {
  header('Location: http://'. $_SERVER['SERVER_NAME'].':' . $_SERVER['SERVER_PORT']. '/web/index.php/site/login');
  die();
} else {
  
}
?>
<?php
/* @var $this ManoController */
/* @var $model Mano */

$this->breadcrumbs=array(
	'Manos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mano', 'url'=>array('index')),
	array('label'=>'Create Mano', 'url'=>array('create')),
	array('label'=>'View Mano', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Mano', 'url'=>array('admin')),
);
?>

<h1>Update Mano <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>