<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo Yii::app()->user->profile_pict?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::app()->user->fullname?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php $this->widget('zii.widgets.CMenu',array(
            'items'=>array(
                array('label'=>'MAIN NAVIGATION','itemOptions'=>array('class'=>'header')),
                array(
                    'label'=>'<i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>array('/site/index'),
                    'itemOptions'=>array('class'=>'treeview')
                ),
                array(
                    'label'=>'<i class="fa fa-edit"></i> <span>Update Profile</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>array('klinik/profile'),
                    'itemOptions'=>array('class'=>'treeview'),
                    'visible'=>Yii::app()->user->isKlinik()
                ),
                array(
                    'label'=>'<i class="fa fa-edit"></i> <span>Update Profile</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>array('pendamping/profile'),
                    'itemOptions'=>array('class'=>'treeview'),
                    'visible'=>Yii::app()->user->isSudin()||Yii::app()->user->isPendamping()
                ),
                array(
                    'label'=>'<i class="fa fa-image"></i> <span>Upload Foto</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>array('klinik/photo'),
                    'itemOptions'=>array('class'=>'treeview'),
                    'visible'=>Yii::app()->user->isKlinik()
                ),
                array(
                    'label'=>'<i class="fa fa-archive"></i> <span>Upload Dokumen</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>array('klinik/document'),
                    'itemOptions'=>array('class'=>'treeview'),
                    'visible'=>Yii::app()->user->isKlinik()
                ),
                array(
                    'label'=>'<i class="fa fa-file-text"></i> <span>Pengajuan Permohonan</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>array('klinik/submit'),
                    'itemOptions'=>array('class'=>'treeview'),
                    'visible'=>Yii::app()->user->isKlinik()
                ),
                array(
                    'label'=>'<i class="fa fa-file-text"></i> <span>Pemantauan</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>array('klinik/monitor'),
                    'itemOptions'=>array('class'=>'treeview'),
                    'visible'=>Yii::app()->user->isKlinik() || Yii::app()->user->isPendamping()
                ),
                array(
                    'label'=>'<i class="fa fa-users"></i> <span>Data Suku Dinas</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>array('/sudin/admin'),
                    'itemOptions'=>array('class'=>'treeview'),
                    'visible'=>Yii::app()->user->isAdmin() || Yii::app()->user->isDinkes(),
                ),
                array(
                    'label'=>'<i class="fa fa-users"></i> <span>Data Pendamping</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>array('/pendamping/admin'),
                    'itemOptions'=>array('class'=>'treeview'),
                    'visible'=>!Yii::app()->user->isAdmin() || Yii::app()->user->isDinkes() || Yii::app()->user->isSudin(),
                ),

                array(
                    'label'=>'<i class="fa fa-home"></i> <span>Data Klinik</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>'#',
                    'itemOptions'=>array('class'=>'treeview'),
                    'items'=>array(
                        array('label'=>'&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-file-text"></i> Daftar Klinik','url'=>array('/klinik/admin')),
                        array('label'=>'&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-file-word-o"></i> Usulan Akreditasi','url'=>array('/akreditasi/admin')),
                        array('label'=>'&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-file-word-o"></i> Pemantauan','url'=>array('/klinik/monitor')),
                        array('label'=>'&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-file-excel-o"></i> Nilai Akreditasi','url'=>array('/klinik/result')),
                    ),
                    'encodeLabel'=>false,
                    'visible'=>!Yii::app()->user->isKlinik() && !Yii::app()->user->isPendamping(),
                ),
                array(
                    'label'=>'<i class="fa fa-wrench"></i><span>Konfigurasi Sistem</span><i class="fa fa-angle-left pull-right"></i>',
                    'itemOptions'=>array('class'=>'treeview'),
                    'url'=>'#',
                    'items'=>array(
                        array('label'=>'<i class="fa fa-user"></i> Manajemen Pengguna','url'=>array('/users/admin')),
                        array('label'=>'<i class="fa fa-lock"></i> Manajemen Akses','url'=>array('/users/adminAssignment')),
                    ),
                    'encodeLabel'=>false,
                    'visible'=>Yii::app()->user->isAdmin(),
                ),
                array(
                    'label'=>'<i class="fa fa-lock"></i> <span>Ganti Password</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>array('/users/password'),
                    'itemOptions'=>array('class'=>'treeview')
                ),
                array(
                    'label'=>'<i class="fa fa-file-text"></i> <span>Buku Panduan</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>Yii::app()->baseUrl.'/docs/user-manual-klinik.pdf',
                    'itemOptions'=>array('class'=>'treeview'),
                    'linkOptions'=>array('target'=>'_new'),
                    'visible'=>Yii::app()->user->isKlinik(),
                ),
                array(
                    'label'=>'<i class="fa fa-file-text"></i> <span>Buku Panduan</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>Yii::app()->baseUrl.'/docs/user-manual-sudin.pdf',
                    'itemOptions'=>array('class'=>'treeview'),
                    'linkOptions'=>array('target'=>'_new'),
                    'visible'=>Yii::app()->user->isSudin(),
                ),
                array(
                    'label'=>'<i class="fa fa-file-text"></i> <span>Lampiran Daftar Klinik</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>Yii::app()->baseUrl.'/docs/list-klinik-'.Yii::app()->user->regency_id.'.xlsx',
                    'itemOptions'=>array('class'=>'treeview'),
                    'linkOptions'=>array('target'=>'_new'),
                    'visible'=>Yii::app()->user->isSudin(),
                ),
                array(
                    'label'=>'<i class="fa fa-file-text"></i> <span>Lampiran Daftar Klinik</span> <i class="fa fa-angle-left pull-right"></i>',
                    'url'=>Yii::app()->baseUrl.'/docs/list-klinik-all.xlsx',
                    'itemOptions'=>array('class'=>'treeview'),
                    'linkOptions'=>array('target'=>'_new'),
                    'visible'=>Yii::app()->user->isDinkes(),
                ),
            ),
            'encodeLabel'=>false,
            'htmlOptions'=>array('class'=>'sidebar-menu'),
            'submenuHtmlOptions'=>array('class'=>'treeview-menu'),
            'linkLabelWrapper'=>null,
        )); ?>

    </section>
    <!-- /.sidebar -->
</aside>