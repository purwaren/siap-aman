<?php
/* @var $this KlinikController */
/* @var $model KlinikUpdateForm */
/* @var $form CActiveForm */
/* @var $doc BerkasAkreditasiCustom */
/* @var $sa_resume SAResumeCustom */
/* @var $pengajuan PengajuanAkreditasiCustom */


Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/bootstrap-fileinput/fileinput.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/bootstrap-fileinput/css/fileinput.min.css');
if (empty($photos)) {
    Yii::app()->clientScript->registerScript('upload',"
        $('#profileKlinik').fileinput({
            showCaption: true,
            uploadUrl: '".Yii::app()->createUrl('klinik/upload',array('type'=>'document','file_type'=>DocumentType::PROFIL_KLINIK))."',
            uploadAsync: true,
            maxFileCount: 1
        });
        $('#suratPermohonan').fileinput({
            showCaption: true,
            uploadUrl: '".Yii::app()->createUrl('klinik/upload',array('type'=>'document','file_type'=>DocumentType::SURAT_PERMOHONAN))."',
            uploadAsync: true,
            maxFileCount: 1
        });
        $('#borangSA').fileinput({
            showCaption: true,
            uploadUrl: '".Yii::app()->createUrl('klinik/upload',array('type'=>'document','file_type'=>DocumentType::SELF_ASSESSMENT))."',
            uploadAsync: true,
            maxFileCount: 1
        });
    ", CClientScript::POS_READY);
}
?>
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'document-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array('class'=>'form-horizontal'),
));
?>
<!-- Default box -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><small>Upload dokumen pendukung untuk permohonan akreditasi</small></h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
        <div class="col-lg-6 col-xs-12">
            <?php if ($success=Yii::app()->user->getFlash('success')) { ?>
                <div class="alert alert-success">
                    <?php echo $success ?>
                </div>
            <?php } elseif ($error=Yii::app()->user->getFlash('error')) { ?>
                <div class="alert alert-error">
                    <?php echo $error ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <?php echo CHtml::label('Profil Klinik','profile') ?>
                <div class="input-group input-group-sm">
                    <span class="input-group-btn">
                        <?php if ($pengajuan->status == StatusPengajuan::DRAFT) {?>
 						    <input type="file" multiple class="file-loading" id="profileKlinik" data-show-preview="false"/>
 						<?php } else {?>
                            <input type="file" multiple class="file-loading" id="profileKlinik" data-show-preview="false" disabled/>
                        <?php } ?>
					</span>
                </div>
            </div>
            <div class="form-group">
                <?php echo CHtml::label('Surat Permohonan','permohonan') ?>
                <div class="input-group input-group-sm">
                    <span class="input-group-btn">
						<?php if ($pengajuan->status == StatusPengajuan::DRAFT) {?>
                            <input type="file" multiple class="file-loading" id="suratPermohonan" data-show-preview="false"/>
                        <?php } else {?>
                            <input type="file" multiple class="file-loading" id="suratPermohonan" data-show-preview="false" disabled/>
                        <?php } ?>
					</span>
                </div>
            </div>
            <div class="form-group">
                <?php echo CHtml::label('Borang Self Assessment (<a href="'.Yii::app()->request->baseUrl.'/assets/docs/template-self-assessment.xlsx'.'">Unduh Borang Di Sini</a>)','borang') ?>
                <div class="input-group input-group-sm">
                    <span class="input-group-btn">
						<?php if ($pengajuan->status == StatusPengajuan::DRAFT) {?>
                            <input type="file" multiple class="file-loading" id="borangSA" data-show-preview="false"/>
                        <?php } else {?>
                            <input type="file" multiple class="file-loading" id="borangSA" data-show-preview="false" disabled/>
                        <?php } ?>
					</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-12">
            <h4><i>Dokumen yang sudah diupload</i></h4>
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'document-grid',
                'dataProvider'=>$doc->search(),
                //'filter'=>$model,
                'columns'=>array(
                    array(
                        'header'=>'No',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
                    ),
                    array(
                        'name'=>'tipe_berkas',
                        'value'=>'$data->getTipeBerkas()'
                    ),
                    'deskripsi',
                    array(
                        'class'=>'CButtonColumn',
                        'template'=>'{download} {delete}',
                        'buttons'=>array(
                            'download'=>array(
                                'label'=>'<i class="fa fa-download"></i>',
                                'imageUrl'=>false,
                                'url'=>'Yii::app()->request->baseUrl."/".$data->file_path',
                                'options'=>array('class'=>'btn btn-xs btn-warning','title'=>'Download','data-toggle'=>'tooltip','target'=>'_new')
                            ),
                            'delete'=>array(
                                'label'=>'<i class="fa fa-trash"></i>',
                                'imageUrl'=>false,
                                'options'=>array('class'=>'btn btn-xs btn-danger','title'=>'Hapus','data-toggle'=>'tooltip'),
                                'visible'=> '$data->idPengajuan->status == StatusPengajuan::DRAFT',
                                'url'=>'Yii::app()->createUrl("klinik/document",array("id"=>$data->id,"do"=>"delete"))'
                            )
                        )
                    ),
                ),
                'htmlOptions' => array(
                    'class' => 'table table-striped'
                ),
                'pagerCssClass' => 'dataTables_paginate paging_bootstrap',
                'itemsCssClass' => 'table table-striped table-hover',
                'cssFile' => false,
                'summaryCssClass' => 'dataTables_info',
                'template'=>'{items}'
            )); ?>
        </div>

	</div><!-- /.box-body -->
</div><!-- /.box -->
<?php $this->endWidget(); ?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><small>Ringkasan penilaian Self Assessment</small></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="col-lg-12">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'sa-resume-grid',
                'dataProvider'=>$sa_resume->search(),
                //'filter'=>$model,
                'columns'=>array(
                    array(
                        'header'=>'No',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
                    ),
                    'bab',
                    'score',
                    array(
                        'name'=>'max_score',
                        'value'=>'$data->getMaxScore()'
                    ),
                    array(
                        'header'=>'Capaian',
                        'value'=> '$data->getProgress()'
                    ),
                ),
                'htmlOptions' => array(
                    'class' => 'table table-striped'
                ),
                'pagerCssClass' => 'dataTables_paginate paging_bootstrap',
                'itemsCssClass' => 'table table-striped table-hover',
                'cssFile' => false,
                'summaryCssClass' => 'dataTables_info',
                'template'=>'{items}'
            )); ?>
        </div>
    </div>
</div>

