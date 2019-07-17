<?php
/* @var $this AuthitemController */
/* @var $model Authitem */

$this->breadcrumbs=array(
	'Hak Akses'=>array('index'),
	'Perbarui Akses',
);

$this->menu=array(
	array('label'=>'Pengaturan Akses', 'url'=>array('index')),
	array('label'=>'Pengaturan Peran', 'url'=>array('admin')),
);
?>

<h1>Perbarui Akses</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'authitem-form',
	'enableAjaxValidation'=>false,
));
?>
	<p class="note">Tekan tombol di bawah ini untuk memperbarui daftar akses yang ada di dalam sistem.</p>
	<?php
		$this->widget('zii.widgets.jui.CJuiProgressBar',array(
			'themeUrl'=>Yii::app()->request->baseUrl.'/css',
		    'value'=>0,
			// additional javascript options for the progress bar plugin
		    'options'=>array(
		        'complete'=> new CJavaScriptExpression("function(event,ui){
				}"),				
			),
		    'htmlOptions'=>array(
		    	'id'=>'ajax_progress',
		        'style'=>'height:20px;',
			),
		));
	?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Perbarui'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php 
Yii::app()->clientScript->registerScript('refresh',"
	$('form').submit(function(){
		event.preventDefault();
		//do the ajax things
		".CHtml::ajax(array(
			'url'=>Yii::app()->createUrl('authitem/getAllController'),
			'type'=>'POST',
			'dataType'=>'JSON',
			'success'=>"function(data){
				updateByAjax(data, 0);
			}"
		))."
	});
");
Yii::app()->clientScript->registerScript('func',"
	function updateByAjax(data, idx) {
		if(idx<data.length) {
			var url='".Yii::app()->request->baseUrl."/index.php/'+data[idx].name+'/reload';
			".CHtml::ajax(array(
				'url'=>'js:url',
				'type'=>'POST',
				'dataType'=>'JSON',
				'success'=>"function(resp){
					var percent = ((idx+1)/data.length)*100;
					$('#ajax_progress').progressbar('value',percent);
					$('#ajax_progress div').html('<span>'+percent+' %</span>');
					updateByAjax(data,++idx);
				}"
			))."
		}
	}
",CClientScript::POS_END);
?>