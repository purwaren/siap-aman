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
				'actions'=>array('create','update','admin','delete','index','view','monitor'),
				'users'=>array('@'),
			),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('profile','photo','upload','submit','document'),
                'roles'=>array('klinik'),
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
        $model = $this->loadModel($id);
        $alamat = AlamatCustom::model()->findByAttributes(array('id_klinik'=>$model->id));
        if (empty($alamat)) {
            $alamat = new AlamatCustom();
        }
        $kontak = KontakCustom::model()->findByAttributes(array('id_klinik'=>$model->id));
        if (empty($kontak)) {
            $kontak = new KontakCustom();
        }
        $fasilitas = FasilitasKlinikCustom::model()->findByAttributes(array('id_klinik'=>$model->id));
        if (empty($fasilitas)) {
            $fasilitas = new FasilitasKlinikCustom();
        }
        $this->render('view',array(
            'model'=>$model,
            'alamat' => $alamat,
            'kontak' => $kontak,
            'fasilitas' => $fasilitas
        ));
	}

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @throws CDbException
     */
	public function actionCreate()
	{
		$model=new KlinikUpdateForm();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['KlinikUpdateForm']))
		{
			$model->attributes=$_POST['KlinikUpdateForm'];
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
     * @throws CDbException
     */
	public function actionUpdate($id)
	{
	    $klinik = $this->loadModel($id);
        $model = KlinikUpdateForm::getInstance($klinik->id_user);

        if (isset($_POST['KlinikUpdateForm'])) {
            $model->attributes = $_POST['KlinikUpdateForm'];
            $model->save();
        }

        $this->render('profile',array(
            'model'=>$model
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
        $klinik = $this->loadModel($id);
        $user = Users::model()->findByPk($klinik->id_user);
        $authManager = Yii::app()->authManager;
        $assignments = $authManager->getAuthAssignments($user->id);
        var_dump($assignments);
        if (!empty($assignments)) {
            foreach ($assignments as $row) {
                $authManager->revoke($row->getItemName(), $id);
            }
        }
        $alamat = AlamatCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
        if (!empty($alamat)) {
            $alamat->delete();
        }

        $kontak = KontakCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
        if (!empty($kontak)) {
            $kontak->delete();
        }

        $fasilitas = FasilitasKlinikCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
        if (!empty($fasilitas)) {
            $fasilitas->delete();
        }
        $klinik->delete();
        $user->delete();

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
		$model=new KlinikCustom('search');
		$model->unsetAttributes();  // clear any default values
        if (Yii::app()->user->isSudin()) {
            $model->id_regency = Yii::app()->user->regency_id;
        }

		if(isset($_GET['KlinikCustom']))
			$model->attributes=$_GET['KlinikCustom'];

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
		$model=KlinikCustom::model()->findByPk($id);
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

    /**
     * @param $type
     * @param string $file_type
     * @throws CDbException
     */
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
                if ($model->type == DocumentType::SELF_ASSESSMENT) {
                    $model->readFile();
                }

                echo CJSON::encode(array(
                    'filelink' => Yii::app()->baseUrl.'/'.$model->filename,
                    'filename' => $model->description
                ));
            }
        }
    }

    /**
     * @param string $id
     * @param string $do
     * @throws CDbException
     */
    public function actionDocument($id='', $do='') {
        $model = new UploadBerkasAkreditasiForm();
        $pengajuan = PengajuanAkreditasiCustom::getInstance();
        $doc = new BerkasAkreditasiCustom();
        $doc->id_pengajuan = $pengajuan->id;
        $sa_resume = new SAResumeCustom();
        $sa_resume->unsetAttributes();
        $sa_resume->id_pengajuan = $pengajuan->id;

        if (!empty($id) && $do=='delete') {
            $tmp = BerkasAkreditasiCustom::model()->findByPk($id);
            $tmp->delete();
        }

	    $this->render('document',array(
            'model'=>$model,
            'doc'=>$doc,
            'sa_resume'=>$sa_resume,
            'pengajuan'=>$pengajuan
        ));
    }

    public function actionSubmit($do='') {
        $klinik = KlinikCustom::getInstance();
        $alamat = AlamatCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
        $kontak = KontakCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
        $fasilitas = FasilitasKlinikCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
        $pengajuan = PengajuanAkreditasiCustom::getInstance();
        $form_pengajuan = new PengajuanAkreditasiForm();
        $form_pengajuan->jenis_pengajuan = $pengajuan->jenis_pengajuan;

        if (isset($_POST['PengajuanAkreditasiForm'])) {
            $form_pengajuan->attributes = $_POST['PengajuanAkreditasiForm'];
            $form_pengajuan->pengajuan = $pengajuan;
            if ($form_pengajuan->save()) {
                Yii::app()->user->setFlash('success', 'Permohonan berhasil diajukan');
            }
        }

        $this->render('submit',array(
            'klinik'=>$klinik,
            'alamat'=>$alamat,
            'kontak'=>$kontak,
            'fasilitas'=>$fasilitas,
            'pengajuan'=>$pengajuan,
            'form_pengajuan'=>$form_pengajuan,
        ));
    }

    public function actionMonitor($id='') {
	    if (Yii::app()->user->isKlinik()) {
	        $pengajuan = PengajuanAkreditasiCustom::getInstance();
	        $this->render('monitor-klinik', array(
	            'pengajuan'=>$pengajuan
            ));
        }
	    else {
	        if (empty($id)) {
                $pengajuan = new PengajuanAkreditasiCustom('search');
                $this->render('monitor', array(
                    'pengajuan' => $pengajuan
                ));
            }
	        else {
                $model = PengajuanAkreditasiCustom::model()->findByPk($id);
                $doc = new BerkasAkreditasiCustom();
                $doc->id_pengajuan = $model->id;
                //get all data for klinik
                $images = FotoKlinikCustom::model()->findAllByAttributes(array('id_klinik'=>$model->id_klinik));
                $klinik = KlinikCustom::model()->findByPk($model->id_klinik);
                $alamat = AlamatCustom::model()->findByAttributes(array('id_klinik'=>$model->id_klinik));
                $kontak = KontakCustom::model()->findByAttributes(array('id_klinik'=>$model->id_klinik));
                $fasilitas = FasilitasKlinikCustom::model()->findByAttributes(array('id_klinik'=>$model->id_klinik));

                if (isset($_POST['PengajuanAkreditasiCustom'])) {
                    $model->attributes = $_POST['PengajuanAkreditasiCustom'];
                    if ($model->update(array('status_info','status_kontak','status_alamat','status_fasilitas','status_foto','status_dokumen'))){
                        Yii::app()->user->setFlash('success', 'Status verifikasi berhasil diupdate');
                    }
                }

                $feedback = new FeedbackForm();
                if (isset($_POST['FeedbackForm'])) {

                }

                $this->render('monitor-detail',array(
                    'model'=>$model,
                    'doc'=>$doc,
                    'images'=>$images,
                    'klinik'=>$klinik,
                    'kontak'=>$kontak,
                    'alamat'=>$alamat,
                    'fasilitas'=>$fasilitas,
                    'feedback'=>$feedback
                ));
            }
        }
    }
}
