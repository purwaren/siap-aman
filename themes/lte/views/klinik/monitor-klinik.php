<?php
/* @var $this UsersController */
/* @var $form CActiveForm */
/* @var $pengajuan PengajuanAkreditasiCustom */
/* @var $messages array */


$this->pageTitle = 'Pemantauan Pendampingan - No. Urut '.$pengajuan->no_urut;

$this->breadcrumbs=array(
	'Klinik'=>array('admin'),
    'Pemantauan'
);

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
	<!-- Default box -->
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <?php if ($success=Yii::app()->user->getFlash('success')) {?>
                <div class="alert alert-success"><?php echo $success ?></div>
            <?php } ?>
            <?php if (empty($pengajuan->jenis_pengajuan)) { ?>
                <div class="alert alert-warning">Anda belum mengajukan permohonan, silakan lakukan pengajuan permohonan terlebih dahulu</div>
            <?php } else { ?>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_usulan" data-toggle="tab">Usulan Akreditasi</a></li>
                        <li><a href="#tab_message" data-toggle="tab">Pesan</a></li>
                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane active" id="tab_usulan">
                            <?php $this->widget('zii.widgets.CDetailView', array(
                                'data'=>$pengajuan,
                                'attributes'=>array(
                                    'no_urut',
                                    array(
                                        'name'=>'jenis_pengajuan',
                                        'value'=>$pengajuan->getJenisPengajuan()
                                    ),
                                    array(
                                        'name'=>'tgl_pengajuan',
                                        'value'=>DateUtil::dateToString($pengajuan->tgl_pengajuan)
                                    ),
                                    array(
                                        'name'=>'status',
                                        'value'=>$pengajuan->getStatus()
                                    ),
                                ),
                                'htmlOptions'=>array(
                                    'class'=>'table table-hover table-striped monitor-klinik'
                                ),
                            )); ?>
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
                            </div>
                            <form id="form-feedback" action="<?php echo Yii::app()->createUrl('feedback/create',array('id_pengajuan'=>$pengajuan->id))?>" method="post">
                                <div class="input-group">
                                    <input type="text" name="FeedbackCustom[message]" placeholder="Tulis pesan..." class="form-control" autocomplete="off">
                                    <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary btn-flat">Kirim</button>
                              </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>



