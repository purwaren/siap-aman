<?php

class SiteController extends Controller
{
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
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $this->layout = '//layouts/column2';
		if(Yii::app()->user->isGuest)
			$this->redirect(array('login'));
		else {
		    if (Yii::app()->user->isKlinik()) {
		        $model = KlinikCustom::model()->findByAttributes(array('id_user'=>Yii::app()->user->getId()));
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
		        $this->render('index-klinik',array(
		            'model'=>$model,
                    'alamat' => $alamat,
                    'kontak' => $kontak,
                    'fasilitas' => $fasilitas
                ));
            }
		    else {
		        $pengajuan = new PengajuanAkreditasiCustom('search');
		        $pengajuan->status = array(StatusPengajuan::DIAJUKAN, StatusPengajuan::VISIT, StatusPengajuan::DITERIMA);
		        $this->render('index', array(
		            'pengajuan' => $pengajuan
                ));
            }
        }
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout = '//layouts/column2';
		if($error=Yii::app()->errorHandler->error)
		{
//			var_dump($error);
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout='//layouts/login';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
     * Display registration page
     */
	public function actionRegister() {
	    $this->layout = '//layouts/login';
	    $model = new KlinikRegistrationForm();

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='registration-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // collect user input data
        if(isset($_POST['KlinikRegistrationForm']))
        {
            $model->attributes=$_POST['KlinikRegistrationForm'];
            // validate user input and redirect to the previous page if valid
            if($model->save()) {
                $model->unsetAttributes();
                Yii::app()->user->setFlash('message', 'Registrasi berhasil, silakan login');
            }
            else {
                Yii::app()->user->setFlash('error', 'Registrasi gagal, silakan coba kembali beberapa saat lagi');
            }
        }
        // display the login form
        $this->render('register',array('model'=>$model));
    }
}