<?php
/* @var $this Controller */
$this->pageTitle = '';
?>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Error <?php echo $code ?></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <?php echo $message ?>
        </div><!-- /.box-body -->

    </div><!-- /.box -->

</section><!-- /.content -->