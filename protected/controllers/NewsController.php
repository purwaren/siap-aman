<?php

class NewsController extends Controller
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
				'actions'=>array('delete'),
				'users'=>array('@'),
				'roles'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','upload','index','view','admin','listTag'),
				'users'=>array('@'),
				'roles'=>array('management','unit','admin'),
			),
			array('allow',
				'actions'=>array('approve'),
				'users'=>array('@'),
				'roles'=>array('management','admin')
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new NewsForm();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NewsForm']))
		{
			$model->attributes=$_POST['NewsForm'];
			if(!Yii::app()->user->checkAccess('admin'))
				$model->flag_published = News::FLAG_PUBLISHED_INACTIVE;

			//pre process tag
			if(!empty($model->tag))
			{
				$tags = explode(',',$model->tag);
				foreach ($tags as $tag)
				{
					$tagmodel = MetaTag::model()->findByAttributes(array('name'=>$tag));
					if($tagmodel === null)
					{
						$tagmodel = new MetaTag();
						$tagmodel->name = $tag;
						$tagmodel->timestamp_created = new CDbExpression('NOW()');
						$tagmodel->user_create = Yii::app()->user->getName();
						$tagmodel->save();
					}
				}
			}

			if($model->save())
				$this->redirect(array('view','id'=>$model->data->id));
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

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
			
			//pre process tag
			if(!empty($model->tag))
			{
				$tags = explode(',',$model->tag);
				foreach ($tags as $tag)
				{
					$tagmodel = MetaTag::model()->findByAttributes(array('name'=>$tag));
					if($tagmodel === null)
					{
						$tagmodel = new MetaTag();
						$tagmodel->name = $tag;
						$tagmodel->timestamp_created = new CDbExpression('NOW()');
						$tagmodel->user_create = Yii::app()->user->getName();
						$tagmodel->save();
					}
				}
			}

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
			var_dump($model->getErrors());
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
		$model = $this->loadModel($id);
		if($model === null)
			echo CJSON::encode(array('message'=>'Data tidak ditemukan.'));
		else {
			if($model->delete())
				echo CJSON::encode(array('message'=>'Artikel berhasil dihapus'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('News');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new News('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		//only allowed to edit their own article, except admin
		if(!Yii::app()->user->checkAccess('admin'))
			$model->user_create=Yii::app()->user->getName();

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionApprove($id) {
		$model = $this->loadModel($id);
		if($model === null)
			echo CJSON::encode(array('message'=>'Error, data tidak ditemukan.'));
		else {
			$model->flag_published = News::FLAG_PUBLISHED_ACTIVE;
			if($model->save())
				echo CJSON::encode(array('message'=>'Proses persetujuan artikel berhasil.'));
		}
	}

	/**
	 * Upload utility for redactor widget
	 * @param string $type
	 */
	public function actionUpload($type='image')
	{
		$upload = new RedactorUploadForm();
		$upload->setScenario($type);
		$upload->file = ($type=='image'||$type=='file')?$_FILES['file']:$_FILES['file_data'];
		$upload->type = $type;
		$path = Yii::app()->params['uploadPath'][$type];
		if($upload->save($path))
		{			
			if($type=='image')
			{
				$filelink = Yii::app()->params['imageUrl'].$upload->filename;
				echo CJSON::encode(array(
						'filelink'=> $filelink,
						'filename'=>$upload->filename
				));
			}
			if($type=='file')
			{
				$filelink = Yii::app()->params['fileUrl'].$upload->filename;
				echo CJSON::encode(array(
					'filelink'=> $filelink,
					'filename'=>$upload->file->getName()
				));
			}
			else if($type=='banner')
			{
				$filelink = Yii::app()->params['imageUrl'].$upload->filename;
				echo CJSON::encode(array(
					'initialPreview'=>array(
							CHtml::image($filelink,$upload->filename,array('class'=>'file-preview-image')),
					),
					'imageUrl'=>$filelink
				));
			}
		}
		else
		{
			echo CJSON::encode(array(
				'error'=>$upload->getError('file')
			));
		}
	}
	
	public function actionListTag($term)
	{
		$models = MetaTag::model()->orderByName()->findAll('UPPER(name) LIKE :term',array(
			':term'=>strtoupper($term).'%'
		));
		$data = array();
		if($models !== null)
		{
			foreach ($models as $row)
				$data[] = $row->name;
		}
		echo CJSON::encode($data);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return News the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param News $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
