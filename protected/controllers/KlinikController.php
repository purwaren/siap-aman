<?php

class KlinikController extends Controller
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
				'actions'=>array('create','update','admin','delete','index','view','profile','photo','upload','submit','document'),
				'users'=>array('@'),
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
		$model=new Klinik;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Klinik']))
		{
			$model->attributes=$_POST['Klinik'];
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

		if(isset($_POST['Klinik']))
		{
			$model->attributes=$_POST['Klinik'];
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
		$dataProvider=new CActiveDataProvider('Klinik');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Klinik('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Klinik']))
			$model->attributes=$_GET['Klinik'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Klinik the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Klinik::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Klinik $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='klinik-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /**
     * Display / Update currently login klinik profile
     * @throws CDbException
     */
	public function actionProfile() {

	    $model = KlinikUpdateForm::getInstance(Yii::app()->user->getId());
	    if (isset($_POST['KlinikUpdateForm'])) {
	        $model->attributes = $_POST['KlinikUpdateForm'];
	        $model->save();
        }

	    $this->render('profile',array(
	        'model'=>$model
        ));
    }

    public function actionPhoto() {
	    $model = new UploadFotoKlinikForm();
	    $klinik = KlinikCustom::model()->findByAttributes(array('id_user'=>Yii::app()->user->getId()));
	    $photos = FotoKlinikCustom::model()->findAllByAttributes(array('id_klinik'=>$klinik->id));
	    $this->render('photo',array(
	        'model'=>$model,
            'photos'=>$photos
        ));
    }

    public function actionUpload($type, $file_type='') {
	    if ($type == 'photo') {
	        $model = new UploadFotoKlinikForm();
	        $model->photo = $_FILES['file_data'];
	        if ($model->save()) {
	            echo CJSON::encode(array(
	                'filelink' => Yii::app()->baseUrl.'/'.$model->filename,
                    'filename' => $model->deskripsi
                ));
            }
        }
	    elseif ($type == 'delete') {
	        $model = FotoKlinikCustom::model()->findByPk($_POST['key']);
	        if (!empty($model)) {
	            $model->delete();
                echo '{}';
            }
        }

	    elseif ($type == 'document') {
	        $model = new UploadBerkasAkreditasiForm();
	        $model->file = $_FILES['file_data'];
	        $model->type = $file_type;
            if ($model->save()) {
                echo CJSON::encode(array(
                    'filelink' => Yii::app()->baseUrl.'/'.$model->filename,
                    'filename' => $model->deskripsi
                ));
            }
        }
    }

    public function actionDocument() {
        $model = new UploadBerkasAkreditasiForm();
        $pengajuan = PengajuanAkreditasiCustom::getInstance();
        $doc = new BerkasAkreditasiCustom();
        $doc->id_pengajuan = $pengajuan->id;
	    $this->render('document',array(
            'model'=>$model,
            'doc'=>$doc
        ));
    }

    public function actionSubmit() {
        $klinik = KlinikCustom::getInstance();
        $alamat = AlamatCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
        $kontak = KontakCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
        $fasilitas = FasilitasKlinikCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
        $pengajuan = PengajuanAkreditasiCustom::getInstance();

        $this->render('submit',array(
            'klinik'=>$klinik,
            'alamat'=>$alamat,
            'kontak'=>$kontak,
            'fasilitas'=>$fasilitas,
            'pengajuan'=>$pengajuan
        ));
    }
}
