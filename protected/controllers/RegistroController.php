<?php

class RegistroController extends Controller
{
	
	public $layout='//layouts/column2';

	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
				'actions'=>array('index'),
				'users'=>array('*'),
			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
////				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
  public function actionIndex() { //funcion que pinta la vista y tb guarda las tuplas de los nuevos clentes
    $model = new Registro;
    if(isset($_POST['ajax'])){
      if ($_POST['ajax'] == 'form1') {
//        $model->validate();
        if (CActiveForm::validate($model)) {
          echo('validado');
        } else {
          echo('noValidado');
        }
      }
      Yii::app()->end();
    } else {
      $this->render('index', array(
        'model' => $model,
      ));
    }
  }

//  public function actionCreate() {
//    
//    
//    if (isset($_POST['ajax']) && $_POST['ajax'] === 'form') {
//      echo CActiveForm::validate($model);
//      Yii::app()->end();
//    }
//    
//    if (isset($_POST['Registro'])) {
//      $model->attributes = $_POST['Registro'];
//      if (!$model->validate()) {
//        $model->addError('repetir_password', 'Error al eviar el formulario');
//      } else {
//        //guardar al usuario
//      }
//    }
//  }
  
}