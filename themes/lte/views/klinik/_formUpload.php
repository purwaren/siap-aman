<?php
/* @var $this KlinikController */
/* @var $model KlinikUpdateForm */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/bootstrap-fileinput/fileinput.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/bootstrap-fileinput/css/fileinput.min.css');
Yii::app()->clientScript->registerScript('upload',"
		$('#uploadFile').fileinput({
			showCaption: false,
			uploadUrl: '".Yii::app()->createUrl('klinik/upload',array('type'=>'photo'))."',
			uploadAsync: true,
			maxFileCount: 5
		});
	");

?>
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'klinik-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array('class'=>'form-horizontal'),
));
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
        <?php if ($success=Yii::app()->user->getFlash('success')) { ?>
        <div class="alert alert-success">
            <?php echo $success ?>
        </div>
        <?php } elseif ($error=Yii::app()->user->getFlash('error')) { ?>
        <div class="alert alert-error">
            <?php echo $error ?>
        </div>
        <?php } ?>
        <div class="col-lg-12">
            <div class="form-group">
                <?php echo $form->labelEx($model,'photo'); ?>
                <div class="input-group input-group-sm">
                    <?php echo $form->hiddenField($model,'photo',array('class'=>'form-control','placeholder'=>'Foto Klinik')); ?>
                    <span class="input-group-btn">
<!--						<button class="btn btn-info btn-flat" type="button" id="uploadButton">Upload</button>-->
						<input type="file" multiple class="file-loading" id="uploadFile"/>
					</span>
                </div>
                <?php echo $form->error($model,'photo'); ?>
            </div>
        </div>

	</div><!-- /.box-body -->
	<div class="box-footer">
        <a href="<?php echo Yii::app()->createUrl('site/index')?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
	</div>
</div><!-- /.box -->

<?php $this->endWidget(); ?>
