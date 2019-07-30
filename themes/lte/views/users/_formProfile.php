<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */

$form=$this->beginWidget('CActiveForm', array(
		'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array('class'=>'form-horizontal'),
));

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/bootstrap-fileinput/fileinput.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/bootstrap-fileinput/css/fileinput.min.css');
Yii::app()->clientScript->registerScript('upload',"
    $('#profile-pict').fileinput({
        showCaption: false,
        uploadUrl: '".Yii::app()->createUrl('users/profile', array('do'=>'upload'))."',
        uploadAsync: true,
        maxFileSize: 4096,
        maxFileCount: 1
    });
    $('#profile-pict').on('fileuploaded', function(event, data, previewId, index) {
        var form = data.form, files = data.files, extra = data.extra,
            response = data.response, reader = data.reader;
        $('.profile-user-img').attr('src', response.filelink);
    });
",CClientScript::POS_END);

$profile_pict = Yii::app()->theme->baseUrl.'/assets/img/user4-128x128.jpg';
if (!empty($model->profile_pict)) {
    $profile_pict = Yii::app()->baseUrl.'/'.$model->profile_pict;
}

?>
<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><small>Isian bertanda * tidak boleh dikosongkan</small></h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
        <?php if ($success=Yii::app()->user->getFlash('success')) {?>
            <div class="alert alert-success">
                <?php echo $success ?>
            </div>
        <?php } ?>
		<div class="col-lg-6">
			<div class="form-group">
				<?php echo $form->labelEx($model,'username'); ?>
                <?php echo $form->textField($model,'username',array('class'=>'form-control', 'disabled'=>'disabled')); ?>
                <?php echo $form->error($model,'username'); ?>
			</div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'name'); ?>
                <?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'name'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'email'); ?>
                <?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>
		</div>
        <div class="col-lg-6">
            <div class="box-profile">
                <img class="profile-user profile-user-img img-responsive img-circle" src="<?php echo $profile_pict ?>" alt="User profile picture">
                <input type="file" multiple class="file-loading" id="profile-pict" data-show-preview="false"/>
            </div>
        </div>
	</div><!-- /.box-body -->
	<div class="box-footer">
		<?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-success')); ?>

    </div>
</div><!-- /.box -->

<?php $this->endWidget(); ?>
