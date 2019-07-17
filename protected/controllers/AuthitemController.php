<?php

class AuthitemController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view','create','update','admin','delete','role','assign'),
				'users'=>array('@'),
				//'roles'=>array('admin')
			),			
			array('deny',  // deny all users
				'users'=>array('*'),
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
	
	public function actionRefresh()
	{
		$this->render('refresh',array(
		));
	}
	
	public function actionGetAllController()
	{
		if(Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest)
		{
			$sql = 'SELECT name FROM all_controller GROUP BY name';
			$model = AllController::model()->findAllBySql($sql);
			
			echo CJSON::encode($model);
		}		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Authitem;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Authitem']))
		{
			$model->attributes=$_POST['Authitem'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		if(Yii::app()->request->isAjaxRequest)
		{
			if($_POST['type']==CAuthItem::TYPE_OPERATION)
			{
				echo CHtml::dropDownList('Authitem[name]','',AllController::getAllOptions(),
				array('prompt'=>'Pilih Akses ','class'=>'chzn-select normal-text'));
			}
			else
			{
				echo CHtml::textField('Authitem[name]','');
			}
			Yii::app()->end();
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

		if(isset($_POST['Authitem']))
		{
			$model->attributes=$_POST['Authitem'];
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
		$dataProvider=new CActiveDataProvider('Authitem');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($type=CAuthItem::TYPE_OPERATION)
	{		
		$model=new Authitem('search');
		$model->unsetAttributes();  // clear any default values
		$model->type = $type;
		if(isset($_GET['Authitem']))
			$model->attributes=$_GET['Authitem'];

		$this->render('admin',array(
			'model'=>$model,
			'type'=>$type
		));
	}
	
	/**
	 * Konfigurasi Peran
	 */
	public function actionRole($id)
	{
		$model=$this->loadModel($id);
		$auth = Yii::app()->authManager;
		$parent = $auth->getAuthItem($model->name);
		$message='';
		if(isset($_POST['Save']))	
		{			
			//revoke all access first
			Authitemchild::model()->deleteAll('parent = :parent',array(
				':parent'=>$model->name
			));
			$authitem = $_POST['authitem'];
			$added='';
			foreach($authitem as $row)
			{
				if($parent->addChild($row))
				{
					$added .= $row.', ';
				}
			}
			$message='Hak akses : '.$added.' telah ditambahkan';
		}	
		
		$sql='SELECT name FROM all_controller GROUP BY name';
		$class = AllController::model()->findAllBySql($sql);
		$this->render('role',array(
			'model'=>$model,
			'class'=>$class,
			'message'=>$message,
			'auth'=>$auth,
			'parent'=>$parent
		));
	}
	
	public function actionAssign($id)
	{
		$auth = Yii::app()->authManager;
		$roles = Authitem::model()->findAllByAttributes(array(
			'type'=>CAuthItem::TYPE_ROLE
		));
		$model = Users::model()->findByPk($id);
		
		if(isset($_POST['Save']))
		{
			Authassignment::model()->deleteAll('userid = :id',array(':id'=>$model->id));
			$items = $_POST['roles'];
			$added = '';
			foreach($items as $row)
			{
				if($auth->assign($row, $model->id))
				{
					$added .= $row.', ';
				}
			}
			$message = 'Peran <strong>'.$added.'</strong> berhasil ditugaskan kepada pengguna';
			Yii::app()->user->setFlash('message',$message);
		}
		$this->render('assign',array(
			'roles'=>$roles,
			'model'=>$model,
			'auth'=>$auth
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Authitem the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Authitem::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Authitem $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='authitem-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
