<?php
/* @var $this KlinikController */
/* @var $model PengajuanAkreditasiCustom */
/* @var $doc BerkasAkreditasiCustom */
/* @var $images array */
/* @var $image FotoKlinikCustom */
/* @var $klinik KlinikCustom */
/* @var $kontak KontakCustom */
/* @var $alamat AlamatCustom */
/* @var $fasilitas FasilitasKlinikCustom */
/* @var $feedback FeedbackForm */
/* @var $sa_resume SAResumeCustom */
/* @var $messages array */
/* @var $message FeedbackCustom */


$this->pageTitle = 'Pemantauan & Pendampingan Klinik: '.$model->idKlinik->nama;

Yii::app()->clientScript->registerScript("feedback","
    $('#form-feedback').submit(function(event){
        event.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        ".CHtml::ajax(array(
            'type'=>'POST',
            'url'=>'js:url',
            'data'=>'js:data',
            'success'=>"function(response){
                document.location.reload();
            }"
        ))."
        return false;
    })
", CClientScript::POS_END);

?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <?php if($success=Yii::app()->user->getFlash('success')){ ?>
                <div class="alert alert-success alert-dismissable">
                    <?php echo $success ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_usulan" data-toggle="tab">Usulan Akreditasi</a></li>
                    <li><a href="#tab_sa" data-toggle="tab">Self Assessment</a></li>
                    <li><a href="#tab_profile" data-toggle="tab">Profile Klinik</a></li>
                    <li><a href="#tab_photo" data-toggle="tab">Foto Klinik</a></li>
                    <?php if (Yii::app()->user->isSudin()) {?>
                    <li><a href="#tab_feedback" data-toggle="tab">Tanggapan</a></li>
                    <?php } ?>
                    <li><a href="#tab_message" data-toggle="tab">Pesan</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane" id="tab_sa">
                        <?php $this->widget('zii.widgets.grid.CGridView', array(
                            'id'=>'sa-resume-grid',
                            'dataProvider'=>$sa_resume->search(),
                            //'filter'=>$model,
                            'columns'=>array(
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
                    <div class="tab-pane active" id="tab_usulan">
                        <?php $this->widget('zii.widgets.CDetailView', array(
                            'data'=>$model,
                            'attributes'=>array(
                                'no_urut',
                                'idKlinik.kode_klinik',
                                array(
                                    'name'=>'jenis_pengajuan',
                                    'value'=>$model->getJenisPengajuan()
                                ),
                                array(
                                    'name'=>'tgl_pengajuan',
                                    'value'=>DateUtil::dateToString($model->tgl_pengajuan)
                                ),
                                array(
                                    'name'=>'status',
                                    'value'=>$model->getStatus()
                                ),
                            ),
                            'htmlOptions'=>array(
                                'class'=>'table table-hover table-striped monitor-klinik'
                            ),
                        )); ?>
                        <h4><i>Lampiran Dokumen</i></h4>
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
                                    'template'=>'{download}',
                                    'buttons'=>array(
                                        'download'=>array(
                                            'label'=>'<i class="fa fa-download"></i>',
                                            'imageUrl'=>false,
                                            'url'=>'Yii::app()->request->baseUrl."/".$data->file_path',
                                            'options'=>array('class'=>'btn btn-xs btn-primary','title'=>'Download','data-toggle'=>'tooltip','target'=>'_new')
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
                    <div class="tab-pane" id="tab_photo">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php foreach ($images as $key=>$val) {?>
                                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key?>" class="<?php echo ($key==0)?'active':''?>"></li>
                                <?php } ?>
                            </ol>
                            <div class="carousel-inner text-center">
                                <?php
                                foreach ($images as $idx=>$image) {
                                    if ($idx == 0) {
                                        ?>
                                        <div class="item active">
                                            <img src="<?php echo Yii::app()->baseUrl.'/'.$image->path_foto ?>" alt="<?php echo $image->deskripsi ?>">

                                            <div class="carousel-caption">
                                                <?php echo $image->deskripsi ?>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="item">
                                            <img src="<?php echo Yii::app()->baseUrl.'/'.$image->path_foto ?>" alt="<?php echo $image->deskripsi ?>">

                                            <div class="carousel-caption">
                                                <?php echo $image->deskripsi ?>
                                            </div>
                                        </div>
                                    <?php }} ?>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="fa fa-angle-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="fa fa-angle-right"></span>
                            </a>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_message">
                        <div class="direct-chat-messages direct-chat-primary" style="height: 420px">
                        <?php
                        if (!empty($messages)) {
                            foreach ($messages as $message) {
                                //right
                                if ($message->from == Yii::app()->user->getId()) {
                                    $this->renderPartial('_messageRight', array('model'=>$message));
                                }
                                //left
                                else {
                                    $this->renderPartial('_messageLeft', array('model'=>$message));
                                }
                            }
                        } else { ?>
                            <div class="alert alert-dismissable alert-warning">
                                Tidak ada pesan untuk saat ini.
                            </div>
                        <?php } ?>
                            <span id="bottom">&nbsp;</span>
                        </div>
                        <form id="form-feedback" action="<?php echo Yii::app()->createUrl('feedback/create',array('id_pengajuan'=>$model->id))?>" method="post">
                            <div class="input-group">
                                <input type="text" name="FeedbackCustom[message]" placeholder="Tulis pesan..." class="form-control" autocomplete="off">
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary btn-flat">Kirim</button>
                              </span>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab_profile">
                        <h4><i>Informasi Umum</i></h4>
                        <?php $this->widget('zii.widgets.CDetailView', array(
                            'data'=>$klinik,
                            'attributes'=>array(
                                'kode_klinik',
                                'nama',
                                'no_izin',
                                'kepemilikan',
                                'penanggung_jawab',
                                'karakteristik',
                                array(
                                    'name'=>'tingkatan',
                                    'value'=>$klinik->getTingkatan()
                                ),
                                'created_at',
                                'created_by',
                                'updated_at',
                                'updated_by'
                            ),
                            'htmlOptions'=>array(
                                'class'=>'table table-hover table-striped detil-klinik'
                            ),
                        )); ?>
                        <h4><i>Alamat Klinik</i></h4>
                        <?php $this->widget('zii.widgets.CDetailView', array(
                            'data'=>$alamat,
                            'attributes'=>array(
                                'alamat_1',
                                'alamat_2',
                                array(
                                    'name'=>'kecamatan',
                                    'value'=>$alamat->getDistrict(),
                                ),
                                array(
                                    'name'=>'kota',
                                    'value'=>$alamat->getRegency(),
                                ),
                                array(
                                    'name'=>'provinsi',
                                    'value'=>$alamat->getProvince(),
                                ),
                            ),
                            'htmlOptions'=>array(
                                'class'=>'table table-hover table-striped detil-klinik'
                            ),
                        )); ?>
                        <h4><i>Kontak Klinik / Media Komunikasi </i></h4>
                        <?php $this->widget('zii.widgets.CDetailView', array(
                            'data'=>$kontak,
                            'attributes'=>array(
                                'no_telp',
                                'no_fax',
                                'email',
                                'website',
                            ),
                            'htmlOptions'=>array(
                                'class'=>'table table-hover table-striped detil-klinik'
                            ),
                        )); ?>
                        <h4><i>Fasilitas yang Disediakan Klinik</i></h4>
                        <?php $this->widget('zii.widgets.CDetailView', array(
                            'data'=>$fasilitas,
                            'attributes'=>array(
                                'qty_tempat_tidur',
                                array('name'=>'penyelenggaraan', 'value'=>$fasilitas->getPenyelenggaraan()),
                            ),
                            'htmlOptions'=>array(
                                'class'=>'table table-hover table-striped detil-klinik'
                            ),
                        )); ?>
                    </div>
                    <div class="tab-pane" id="tab_feedback">
                        <?php $this->renderPartial('_formFeedback', array('model'=>$feedback))?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xs-12">
            <?php $this->renderPartial('_formVerification', array(
                'model'=>$model,
                'pengajuan'=>$model,
                'klinik'=>$klinik
            ))?>
        </div>
    </div>
</section>