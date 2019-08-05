<?php

class PendampingController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete'),
				'roles'=>array(UserRoles::ROLE_ADMIN, UserRoles::ROLE_DINKES),
			),
			array('allow',
                'actions'=>array('profile','education','certification', 'work'),
                'roles'=>array(UserRoles::ROLE_SUDIN, UserRoles::ROLE_PENDAMPING)
            ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     * @throws CHttpException
     */
	public function actionView($id)
	{
	    $pendidikan = new RiwayatPendidikanCustom('search');
	    $pendidikan->id_pendamping = $id;
	    $sertifikasi = new SertifikasiCustom('search');
	    $sertifikasi->id_pendamping = $id;
	    $pekerjaan = new RiwayatPekerjaanCustom('search');
	    $pekerjaan->id_pendamping = $id;
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'pendidikan'=>$pendidikan,
            'sertifikasi'=>$sertifikasi,
            'pekerjaan'=>$pekerjaan
		));
	}

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @throws CException
     */
	public function actionCreate($type='')
	{
		$model=new CreatePendampingForm();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CreatePendampingForm']))
		{
			$model->attributes=$_POST['CreatePendampingForm'];

			if ($type == 'nosudin') {
			    $model->role = UserRoles::ROLE_PENDAMPING;
            } else {
			    $model->role = UserRoles::ROLE_SUDIN;
            }

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
     * @throws CHttpException
     */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PendampingCustom']))
		{
			$model->attributes=$_POST['PendampingCustom'];
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
     * @throws CDbException
     * @throws CHttpException
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
		$dataProvider=new CActiveDataProvider('Pendamping');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PendampingCustom('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PendampingCustom']))
			$model->attributes=$_GET['PendampingCustom'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pendamping the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PendampingCustom::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pendamping $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pendamping-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /**
     * @throws CDbException
     */
    public function actionProfile() {
        $pendamping = PendampingCustom::getCurrentlyLogin();
	    $model = new ProfilePendampingForm();
        $model->id = $pendamping->id;
	    $education = RiwayatPendidikanCustom::model()->findByAttributes(array('id_pendamping'=>$pendamping->id));
	    if (empty($education)) {
	        $education = new RiwayatPendidikanCustom();
	        $education->id_pendamping = $model->id;
        }
	    $certification = SertifikasiCustom::model()->findByAttributes(array('id_pendamping'=>$pendamping->id));
	    if (empty($certification)) {
	        $certification = new SertifikasiCustom();
	        $certification->id_pendamping = $pendamping->id;
        }
	    $work = RiwayatPekerjaanCustom::model()->findByAttributes(array('id_pendamping'=>$pendamping->id));
	    if (empty($work)) {
	        $work = new RiwayatPekerjaanCustom();
	        $work->id_pendamping = $pendamping->id;
        }

	    if (isset($_POST['ProfilePendampingForm'])) {
	        $model->attributes = $_POST['ProfilePendampingForm'];
	        if ($model->save()) {
	            Yii::app()->user->setFlash('success', 'Profile telah disimpan');
	            $pendamping = PendampingCustom::getCurrentlyLogin();
            }
        }

	    $model->attributes = $pendamping->attributes;
        if (!empty($pendamping->alamat)) {
            $model->alamat_1 = $pendamping->alamat0->alamat_1;
            $model->alamat_2 = $pendamping->alamat0->alamat_2;
            $model->provinsi = $pendamping->alamat0->provinsi;
            $model->kota = $pendamping->alamat0->kota;
            $model->kecamatan = $pendamping->alamat0->kecamatan;
        } else {
            $model->provinsi = ProvinceCustom::DKI_JAKARTA;
        }

	    $this->render('profile', array(
	        'model'=>$model,
            'education'=>$education,
            'certification'=>$certification,
            'work'=>$work
        ));
    }

    /**
     * @param string $id
     * @param string $do
     * @throws CDbException
     */
    public function actionEducation($id='', $do='create') {
        if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
            if ($do == 'create') {
                $pendamping = PendampingCustom::getCurrentlyLogin();
                $model = new RiwayatPendidikanCustom();
                $model->attributes = $_POST['RiwayatPendidikanCustom'];
                $model->id_pendamping = $pendamping->id;
                if ($model->save()) {
                    echo CJSON::encode(array(
                        'msg'=>'Riwayat pendidikan berhasil disimpan'
                    ));
                }
                else {
                    echo CJSON::encode($model->getErrors());
                }
            } elseif ($do == 'delete') {
                $model = RiwayatPendidikanCustom::model()->findByPk($id);
                if (!empty($model)) {
                    $model->delete();
                }
            }
        }
    }

    /**
     * @param string $id
     * @param string $do
     * @throws CDbException
     */
    public function actionCertification($id='', $do='create') {
        if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
            if ($do == 'create') {
                $model = new SertifikasiCustom();
                $pendamping = PendampingCustom::getCurrentlyLogin();
                $model->attributes = $_POST['SertifikasiCustom'];
                $model->id_pendamping = $pendamping->id;
                if ($model->save()) {
                    echo CJSON::encode(array(
                        'msg' => 'Sertifikasi berhasil disimpan'
                    ));
                } else {
                    echo CJSON::encode($model->getErrors());
                }
            } elseif ($do == 'delete') {
                $model = SertifikasiCustom::model()->findByPk($id);
                if (!empty($model)) {
                    $model->delete();
                }
            }
        }
    }

    /**
     * @param string $id
     * @param string $do
     * @throws CDbException
     */
    public function actionWork($id='', $do='create') {
        if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
            if ($do == 'create') {
                $model = new RiwayatPekerjaanCustom();
                $model->attributes = $_POST['RiwayatPekerjaanCustom'];
                $pendamping = PendampingCustom::getCurrentlyLogin();
                $model->id_pendamping = $pendamping->id;
                if ($model->save()) {
                    echo CJSON::encode(array(
                        'msg' => 'Riwayat pekerjaan berhasil disimpan'
                    ));
                } else {
                    echo CJSON::encode($model->getErrors());
                }
            } elseif ($do == 'delete') {
                $model = RiwayatPekerjaanCustom::model()->findByPk($id);
                if (!empty($model)) {
                    $model->delete();
                }
            }
        }
    }
}
