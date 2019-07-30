<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>SI</b>AP</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SiAp</b>AMan</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
<!--                <li class="dropdown notifications-menu">-->
<!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                        <i class="fa fa-clock-o"></i>-->
<!--                        <span id="clock">12:01:31</span>-->
<!--                    </a>-->
<!--                </li>-->
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">1</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Ada 1 notifikasi</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> Pengajuan akreditasi dari Klinik Cahaya Medika
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo Yii::app()->theme->baseUrl?>/assets/img/avatar04.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo Yii::app()->user->fullname?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo Yii::app()->theme->baseUrl?>/assets/img/avatar04.png" class="img-circle" alt="User Image">
                            <p>
                                <?php echo Yii::app()->user->fullname?><br />
                                <?php
                                    if (Yii::app()->user->isSudin())  {
                                        echo '<small>'.Yii::app()->user->regency.'</small>';
                                    }
                                ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo Yii::app()->createUrl('users/profile')?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo Yii::app()->createUrl('site/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>