<?php
/**
 * @var $model LoginForm
 * @var $form CActiveForm
 * @var $this SiteController
 */
$this->pageTitle='Log In';
$this->breadcrumbs=array(
    'Log In',
);
?>
<div class="login-logo">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <?php echo CHtml::image(Yii::app()->theme->baseUrl.'/assets/img/logo_dki.png','logo dki',array(
                'class'=>'img-responsive'
        ))?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <?php echo CHtml::image(Yii::app()->theme->baseUrl.'/assets/img/logo_dinkes.png', 'logo dinkes', array(
                'class'=>'img-responsive'
        ))?>
    </div>

</div><!-- /.login-logo -->
<h2 style="text-align: center">
<a href="<?php echo Yii::app()->getBaseUrl()?>" style="color:white;"><b>Sistem Aplikasi Akreditasi Mandiri Klinik</b></a>
</h2>
<div class="login-box-body">
    <p class="login-box-msg">Silakan login terlebih dahulu</p>
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
            <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php echo $form->error($model,'password'); ?>
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
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox"> Remember Me
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-success btn-block btn-flat')); ?>
            </div><!-- /.col -->
        </div>
    <?php $this->endWidget(); ?>

    <a href="<?php echo Yii::app()->createUrl('site/register')?>">Registrasi Klinik</a><br>

</div><!-- /.login-box-body -->