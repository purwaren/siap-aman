<?php
/**
 * @var $model KlinikRegistrationForm
 * @var $form CActiveForm
 * @var $this SiteController
 */
$this->pageTitle='Registrasi';
$this->breadcrumbs=array(
    'Registrasi',
);
?>
<div class="login-logo">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <?php echo CHtml::image(Yii::app()->theme->baseUrl.'/assets/img/logo_dki.png','logo dki',array(
                'class'=>'img-responsive'
        ))?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <?php echo CHtml::image(Yii::app()->theme->baseUrl.'/assets/img/logo_dinkes.png', 'logo dinkes', array(
                'class'=>'img-responsive'
        ))?>
    </div>

</div><!-- /.login-logo -->
<h2 style="text-align: center">
<a href="<?php echo Yii::app()->getBaseUrl()?>" style="color:white;"><b>Sistem Aplikasi Akreditasi Mandiri Klinik</b></a>
</h2>
<div class="login-box-body">
    <p class="login-box-msg">Isilah form registrasi berikut ini</p>
    <?php if($message = Yii::app()->user->getFlash('message')) { ?>
        <div class="alert alert-success">
            <?php echo $message ?>
        </div>
    <?php } ?>
    <?php if($error=Yii::app()->user->getFlash('error')) { ?>
        <div class="alert alert-success">
            <?php echo $error ?>
        </div>
    <?php } ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
        <div class="form-group has-feedback">
            <?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Username')); ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <?php echo $form->error($model,'username'); ?>
        </div>
        <div class="form-group has-feedback">
            <?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email')); ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <?php echo $form->error($model,'email'); ?>
        </div>
        <div class="form-group has-feedback">
            <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php echo $form->error($model,'password'); ?>
        </div>
        <div class="form-group has-feedback">
            <?php echo $form->textField($model,'nama_klinik',array('class'=>'form-control','placeholder'=>'Nama Klinik')); ?>
            <span class="form-control-feedback"></span>
            <?php echo $form->error($model,'nama_klinik'); ?>
        </div>
        <div class="form-group has-feedback">
            <?php echo $form->textField($model,'penanggung_jawab',array('class'=>'form-control','placeholder'=>'Nama Penanggung Jawab')); ?>
            <span class="form-control-feedback"></span>
            <?php echo $form->error($model,'penanggung_jawab'); ?>
        </div>
        <?php if(CCaptcha::checkRequirements()): ?>
            <div class="form-group has-feedback">
                <?php echo $form->labelEx($model,'verifyCode'); ?>
                <div>
                    <?php $this->widget('CCaptcha'); ?>
                    <?php echo $form->textField($model,'verifyCode', array('class'=>'form-control','placeholder'=>'Huruf besar & kecil sama saja')); ?>
                </div>
                <?php echo $form->error($model,'verifyCode'); ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-xs-6">
                <?php echo CHtml::submitButton('Daftar',array('class'=>'btn btn-success btn-block btn-flat')); ?>
            </div><!-- /.col -->
            <div class="col-xs-6">
                <?php echo CHtml::link('Halaman Login',Yii::app()->createUrl('site/login'),array('class'=>'btn btn-primary btn-block btn-flat')); ?>
            </div><!-- /.col -->
        </div>
    <?php $this->endWidget(); ?>

</div><!-- /.login-box-body -->