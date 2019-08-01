<?php
/* @var $this Controller */
/* @var $model Sudin */


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
                    <div class="tab-pane" id="tab_education"></div>
                    <div class="tab-pane" id="tab_certification"></div>
                    <div class="tab-pane" id="tab_work"></div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.content -->