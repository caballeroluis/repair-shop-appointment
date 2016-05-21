<?php

class CalendarioController extends Controller
{
    
    public $layout = "//layouts/main";
    
	public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionRegistro(){
          $usuario = $_REQUEST['datos'];
        }
        
        public function actionAcceso(){
          echo hash("sha512", 'abc');
          echo '<br />';
          echo hash("sha256", 'abc');
        }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}