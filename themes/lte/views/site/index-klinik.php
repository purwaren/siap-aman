<?php
/* @var $this Controller */
/* @var $model Klinik */
$this->pageTitle = 'Dashboard';
?>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Profile Klinik</h3>
        </div>
        <div class="box-body">
            <?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'attributes'=>array(
                    'kode_klinik',
                    'nama',
                    'no_izin',
                    'kepemilikan',
                    'penanggung_jawab',
                    'karakteristik',
                    'tingkatan',
                    'created_at',
                    'created_by',
                    'updated_at',
                    'updated_by'
                ),
                'htmlOptions'=>array(
                    'class'=>'table table-hover table-striped'
                ),
            )); ?>
        </div>
        <div class="box-footer">
            <a href="<?php echo Yii::app()->createUrl('klinik/profile')?>" class="btn btn-primary">Update Profile</a>
        </div>
    </div>
</section>