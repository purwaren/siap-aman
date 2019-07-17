<?php

class RegistrantController extends Controller
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
			array('allow',
				'actions'=>array('admin','approve','verify','view','validate','document','download','adminDocument','print'),
				'users'=>array('@'),
				'roles'=>array('management','admin')
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
						'class'=>'CCaptchaAction',
						'backColor'=>0xFFFFFF,
				),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
				'page'=>array(
						'class'=>'CViewAction',
				),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		//get all document uploaded
		$documents = new RegistrantDocument('search');
		$documents->reg_id = $model->id;
		//get profile pict
		$photo = RegistrantDocument::model()->findPhotoByRegId($model->id);
		
		$this->render('view',array(
			'model'=>$model,
			'documents'=>$documents,
			'photo'=>$photo
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Registrant;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Registrant']))
		{
			$model->attributes=$_POST['Registrant'];
			$model->reg_number=$model->generateRegistrationNumber();
			$security = Yii::app()->getSecurityManager();
			$model->secret_key = $security->generateRandomString(8, false);
			if($model->save())
			{
				//send mail notification
				$mailer = Yii::app()->mailer;
				$mailer->Subject = 'Pendaftaran Perguruan Al-Ulum Terpadu';
				$mailer->body = $this->renderPartial('_mailNotification',array('model'=>$model),true);
				$mailer->AddAddress($model->email);
				$mailer->From = Yii::app()->params['adminEmail'];
				try {
					$mailer->Send();
					$this->redirect(array('view','id'=>$model->id));
				} catch (CException $e) {
					$model->delete();
					Yii::app()->user->setFlash('error','Mohon maaf, saat ini proses pendaftaran sedang tidak bisa dilakukan. Silakan coba beberapa saat lagi');
				}
			}
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

		if(isset($_POST['Registrant']))
		{
			$model->attributes=$_POST['Registrant'];
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
		$dataProvider=new CActiveDataProvider('Registrant');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Registrant('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Registrant']))
			$model->attributes=$_GET['Registrant'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdminDocument()
	{
		$model=new RegistrantDocument('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RegistrantDocument']))
			$model->attributes=$_GET['RegistrantDocument'];

		$this->render('adminDocument',array(
			'model'=>$model,
		));
	}

	/**
	 * Uplad document for registration
	 *
	 */
	public function actionUpload()
	{
		$model = new AccessUploadForm();
		if(isset($_POST['AccessUploadForm']))
		{
			$access = new AccessUploadForm();
			$access->attributes = $_POST['AccessUploadForm'];
			if($access->validate())
			{
				Yii::app()->user->setFlash('access_key', md5($access->secret_key));
				Yii::app()->user->setFlash('reg_number', md5($access->reg_number));
				$model = new DocumentUploadForm();
			}
			else $model = $access;
		}
		else if(isset($_POST['DocumentUploadForm']))
		{
			$doc = new DocumentUploadForm();
			$doc->attributes = $_POST['DocumentUploadForm'];
			$doc->reg_number = Yii::app()->user->getFlash('reg_number');
			$doc->file_ijazah = CUploadedFile::getInstance($doc,'file_ijazah');
			$doc->file_akte = CUploadedFile::getInstance($doc,'file_akte');
			$doc->file_kk = CUploadedFile::getInstance($doc,'file_kk');
			if($doc->save())
			{
				Yii::app()->user->setFlash('success','Dokumen berhasil diunggah.');
				//send notification to registrant
			}
			else Yii::app()->user->setFlash('error','Gagal mengunggah dokumen, silakan coba beberapa saat lagi.');

		}
		else $model = new AccessUploadForm();

		$this->render('upload',array(
			'model'=>$model
		));
	}

	/**
	 * Validate the payment
	 */
	public function actionValidate($id)
	{
		$model = $this->loadModel($id);
		$payment = RegistrantPayment::model()->findByAttributes(array(
			'reg_id'=> $model->id
		));
		$doc = RegistrantDocument::model()->findByAttributes(array(
			'reg_id'=>$model->id,
			'type'=>RegistrantDocument::TYPE_RECEIPT
		));
		if(Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest)
		{
			$model->status = Registrant::STATUS_APPROVED;
			if($model->save())
			{
				//create pdf file, registration card test
				$card = $this->printCard($model->id);
				//send email notification, attach reg card
				$mailer = Yii::app()->mailer;
				$mailer->Subject = 'Kartu Peserta Ujian';
				$mailer->body = $this->renderPartial('_mailValidateRegistrant',array('model'=>$model),true);
				$mailer->AddAddress($model->email);
				$mailer->AddFile($card);
				$mailer->From = Yii::app()->params['adminEmail'];
				try {
					$mailer->Send();
					echo CJSON::encode(array(
						'message'=>'Pembayaran valid, notifikasi ke email pendaftar sudah dikirimkan.'
					));
				} catch (CException $e) {					
					echo CJSON::encode(array(
						'message'=>'Pembayaran berhasil divalidasi, tetapi notifikasi gagal dikirim. Silakan kirim ulang notifikasi'
					));
				}
			}
			else echo CJSON::encode(array(
				'message'=>'Pembayaran tidak dapat divalidasi, silakan coba beberapa saat lagi',
				'error'=>$model->getErrors()
			));
			Yii::app()->end();
		}
		$this->render('validate',array(
			'model'=>$model,
			'payment'=>$payment,
			'doc'=>$doc
		));
	}

	public function actionDownload($id)
	{
		$model = RegistrantDocument::model()->findByPk($id);
		if($model === null)
			throw new CHttpException('404', 'Halaman tidak ditemukan');
		$absPath = Yii::app()->params['basePath'].$model->path;
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=".$model->name.'.'.CFileHelper::getExtension($absPath));
		header("Content-Transfer-Encoding: binary ");
		readfile($absPath);
	}

	public function actionDocument($id)
	{
		$model = RegistrantDocument::model()->findByPk($id);
		if($model === null)
			throw new CHttpException('404', 'Halaman tidak ditemukan');
		$this->render('document',array(
			'model'=>$model,
		));
	}

	private function printCard($id)
	{
		$model = $this->loadModel($id);
		$photo = RegistrantDocument::model()->findByAttributes(array(
			'reg_id'=>$model->id,
			'type'=>RegistrantDocument::TYPE_PHOTO
		));
		$data = $this->renderPartial('_registrationCard',array(
			'model'=> $model,
			'photo'=> $photo
		),true);
		$filename = Yii::app()->params['cardPath'].$model->reg_number.'.pdf';
		$this->publishPDF($data,$filename);
		return $filename;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Registrant the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Registrant::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Registrant $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='registrant-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
