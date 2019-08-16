<?php

class UsersController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','adminAssignment','reset'),
				'users'=>array('@'),
				'roles'=>array('admin'),
			),
            array('allow',
                'actions'=>array('password','profile'),
                'users'=>array('@')
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
		$model=new UserAddForm();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserAddForm']))
		{
			$model->attributes=$_POST['UserAddForm'];
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
     * @throws CHttpException
     */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
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
     * @throws CHttpException
     * @throws CDbException
     */
	public function actionDelete($id)
	{
	    $authManager = Yii::app()->authManager;
        $assignments = $authManager->getAuthAssignments($id);
        if (!empty($assignments)) {
            foreach ($assignments as $row) {
                $authManager->revoke($row->getItemName(), $id);
            }
        }
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
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAdminAssignment()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('adminAssignment',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /**
     * @throws CDbException
     * @throws CException
     * @throws CHttpException
     */
    public function actionPassword()
    {
        $user = $this->loadModel(Yii::app()->user->getId());
        $model = new ChangePasswordForm();

        if (isset($_POST['ChangePasswordForm'])) {
            $model->attributes = $_POST['ChangePasswordForm'];
            if ($model->save())
            {
                Yii::app()->user->setFlash('message', 'Password berhasil diubah');
            }
        }

        $model->unsetAttributes();
        $model->userid=$user->id;

        $this->render('password', array(
            'model'=>$model
        ));
    }

    /**
     * @param string $do
     * @return bool
     * @throws CHttpException
     * @throws CDbException
     */
    public function actionProfile($do='') {

        $model = $this->loadModel(Yii::app()->user->getId());
        if ($do == 'upload') {
            $file = CUploadedFile::getInstanceByName('file_data');
            $filename = 'img_'.date('YmdHis').'_'.rand(100, 9999).'.'.$file->extensionName;
            $path = Yii::app()->params['uploadPath']['photo'].$filename;
            $model->profile_pict = Yii::app()->params['urlPhoto'].$filename;
            $model->timestamp_updated = new CDbExpression('NOW()');
            $model->user_update = Yii::app()->user->getName();

            if ($file->saveAs($path)) {
                if ($model->update(array('profile_pict', 'timestamp_updated', 'user_update'))) {
                    echo CJSON::encode(array(
                        'filelink' => Yii::app()->baseUrl.'/'.$model->profile_pict
                    ));
                }
            }
            Yii::app()->end();
        }

        if (isset($_POST['Users'])) {
            $model->name = $_POST['Users']['name'];
            $model->email = $_POST['Users']['email'];
            $model->timestamp_updated = new CDbExpression('NOW()');
            $model->user_update = Yii::app()->user->getName();
            if ($model->update(array('name', 'email', 'timestamp_updated', 'user_update'))) {
                Yii::app()->user->setFlash('success', 'Profile berhasil diupdate');
            }
        }

        $this->render('profile', array(
            'model'=>$model
        ));
    }

    /**
     * @param $id
     * @throws CHttpException
     * @throws CException
     */
    public function actionReset($id) {
        if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
            $user = $this->loadModel($id);
            $newpass = Users::randomPassword(6);
            $user->password = CPasswordHelper::hashPassword($newpass);
            $user->timestamp_updated = new CDbExpression('NOW()');
            $user->user_update = Yii::app()->user->getName();
            if ($user->update(array('password','timestamp_udpated','user_update'))) {
                echo CJSON::encode(array(
                    'msg' => 'Password setelah di-reset: '.$newpass
                ));
            }
        }

    }
}
