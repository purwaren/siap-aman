<?php
/* @var $this Controller */
$this->pageTitle = 'Validasi Pembayaran';
$this->breadcrumbs = array(
    'Pendaftar'=>array('registrant/admin'),
    'Validasi'
);

Yii::app()->clientScript->registerScript('confirm',"
    $('.confirm-payment').click(function(){
        event.preventDefault();
        if(confirm('Anda yakin melakukan validasi pembayaran ini ?')) {
            ".CHtml::ajax(array(
                'url'=>"js:$(this).attr('href')",
                'type'=>'POST',
                'dataType'=>'JSON',
                'success'=>"function(data){
                    alert(data.message);    
                    window.location.reload();
                }"
            ))."
        }
    });
");
?>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><small>Bukti pembayaran pendaftaran</small></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <?php $this->widget('zii.widgets.CDetailView',array(
                        'data'=>$payment,
                        'attributes'=>array(
                            array(
                                'label'=>'No. Pendaftaran',
                                'value'=>$model->reg_number
                            ),
                            array(
                                'label'=>'Nama Peserta',
                                'value'=>$model->firstname.' '.$model->lastname
                            ),
                            array(
                                'label'=>'Jenjang Pendidikan',
                                'value'=>$model->selected_edu_level
                            ),
                            'name',
                            'bank',
                            array(
                                'label'=>'Jumlah Bayar',
                                'value'=>number_format($payment->amount)
                            ),
                            'date_paid',
                            'timestamp_created',
                        ),
                        'htmlOptions'=>array(
                            'class'=>'table table-hover table-striped'
                        ),
                    ))?>
                </div>
                <div class="col-md-6">
                    <?php echo CHtml::image($doc->path, 'Bukti Bayar',array('class'=>'img-responsive img-receipt'))?>
                </div>
            </div>

        </div><!-- /.box-body -->
        <div class="box-footer">
            <?php if($model->status == Registrant::STATUS_VALIDATED) {
                echo CHtml::link('Validasi',array('registrant/validate','id'=>$model->id),array('class'=>'btn btn-primary confirm-payment'));
            } else {
                echo CHtml::link('Kirim Notifikasi',array('registrant/validate','id'=>$model->id),array('class'=>'btn btn-primary confirm-payment'));
            }?> &nbsp;
            <?php echo CHtml::link('Kembali',array('registrant/admin'),array('class'=>'btn btn-danger'))?>
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
</section><!-- /.content -->