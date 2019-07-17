<?php
/* @var $this UsersController */
/* @var $model Users */
$this->pageTitle = 'Penugasan Peran';

$this->breadcrumbs=array(
	'Manajemen Akses'=>array('user/adminAssignment'),
	$model->id,
);

?>

<!-- Main content -->
<section class="content">
	<?php if($message=Yii::app()->user->getFlash('message')) { ?>
	<div class="box box-success box-solid">
		<div class="box-header with-border">
			<h3 class="box-title">Info</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
			<!-- /.box-tools -->
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<?php echo $message ?>
		</div>
		<!-- /.box-body -->
	</div>
	<?php } ?>
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><small>Penugasan peran terhadap user</small></h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'page-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'method'=>'post',
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array('role'=>'form')
		)); ?>
		<div class="box-body">
			<?php
				$row_data='';
				foreach($roles as $row){
					$access = $auth->isAssigned($row->name, $model->id);
					$row_data .= '<tr>
				<td>'.CHtml::checkBox('roles[]',$access,array('value'=>$row->name)).'&nbsp;'.ucfirst($row->name).'</td>
				<td>'.ucfirst($row->description).'</td>
			</tr>';
			}?>
			<table class="table table-bordered table-hover dataTable	">
				<thead>
				<tr>
					<th>Nama Peran</th>
					<th>Keterangan</th>
				</tr>
				</thead>
				<tbody>
				<?php echo $row_data?>
				</tbody>
			</table>

		</div><!-- /.box-body -->

		<div class="box-footer">
			<?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-success','name'=>'Save')); ?>
			&nbsp;
			<?php echo CHtml::linkButton('Kembali',array('class'=>'btn btn-danger','href'=>array('users/adminAssignment'))); ?>
		</div>
		<?php $this->endWidget(); ?>		
	</div><!-- /.box -->
</section><!-- /.content -->
