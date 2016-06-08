<?php

class CalendarioFormController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
//        public $layout='//layouts/column2';
        public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create', 'refrescarHandicap', 'refrescarPieza'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*', 'admin', '@'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CalendarioForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CalendarioForm']))
		{
			$model->attributes=$_POST['CalendarioForm'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CalendarioForm']))
		{
			$model->attributes=$_POST['CalendarioForm'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CalendarioForm');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CalendarioForm('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CalendarioForm']))
			$model->attributes=$_GET['CalendarioForm'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CalendarioForm the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CalendarioForm::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CalendarioForm $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='calendario-form-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
        //mis acciones
        
        
        public function actionRefrescarHandicap() {
          $sI = $_POST['sI'];
          $handicap = Yii::app()->db->createCommand(
                  "SELECT id, nombre, recargo, minutos_duracion, imagen, informacion, mano_id "
                  . "FROM handicap "
                  . "WHERE vivo = 1 AND "
                  . "mano_id = $sI"
          )->query();
            
          header('Coarray_pusntent-type: application/json');
          echo CJSON::encode($handicap);
        }
        
        public function actionRefrescarPieza() {
          $sI = $_POST['sI'];
          $consulta = <<<HEREDOC
SELECT pieza.id, pieza.nombre, precio, precio_instalar, (
  SELECT marca_pieza.nombre
  FROM marca_pieza
  WHERE marca_pieza.id = pieza.id
  AND marca_pieza.vivo = 1
) AS marca, imagen, minutos_instalacion, informacion, (
  precio + precio_instalar
) AS precio_instalado
FROM pieza
WHERE vivo = 1
AND categoria_pieza_id = $sI;
HEREDOC;
  //aquí hay un par de subselets, la primera para buscar la marca y la segunda para calcular el precio de la pieza con la instalación
          $pieza = Yii::app()->db->createCommand($consulta)->query();

          
          header('Coarray_pusntent-type: application/json');
          echo CJSON::encode($pieza);
        }

}
