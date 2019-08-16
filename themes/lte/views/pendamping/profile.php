<?php
/* @var $this Controller */
/* @var $model ProfilePendampingForm */
/* @var $education RiwayatPendidikanCustom */
/* @var $certification SertifikasiCustom */
/* @var $work RiwayatPekerjaanCustom */
/* @var $sudin SudinCustom */



$this->pageTitle = 'Update Profile Pendamping';
$this->breadcrumbs = array(
    'Pendamping'=>array('pendamping/admin'),
    'Update Profile'
);
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_profile" data-toggle="tab">Profile Umum</a></li>
                    <?php if(Yii::app()->user->isSudin()) {?>
                    <li><a href="#tab_sudin" data-toggle="tab">Profile Sudin</a></li>
                    <?php } ?>
                    <li><a href="#tab_address" data-toggle="tab">Kontak Pendamping</a></li>
                    <li><a href="#tab_education" data-toggle="tab">Riwayat Pendidikan</a></li>
                    <li><a href="#tab_certification" data-toggle="tab">Sertifikasi</a></li>
                    <li><a href="#tab_work" data-toggle="tab">Riwayat Pekerjaan</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_profile">
                        <?php $this->renderPartial('_formProfile', array('model'=>$model)) ?>
                    </div>
                    <div class="tab-pane" id="tab_address">
                        <?php $this->renderPartial('_formContact', array('model'=>$model)) ?>
                    </div>
                    <div class="tab-pane" id="tab_education">
                        <?php $this->renderPartial('_formEducation', array('model'=>$education)) ?>
                    </div>
                    <div class="tab-pane" id="tab_certification">
                        <?php $this->renderPartial('_formCertification', array('model'=>$certification)) ?>
                    </div>
                    <div class="tab-pane" id="tab_work">
                        <?php $this->renderPartial('_formWork', array('model'=>$work)) ?>
                    </div>
                    <div class="tab-pane" id="tab_sudin">
                        <?php $this->renderPartial('_formSudin',array('model'=>$sudin))?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.content -->