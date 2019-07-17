<?php
/* @var $this Controller */
$this->pageTitle = 'Halaman Statis';
$this->breadcrumbs = array(
    'Halaman Statis'
);
Yii::app()->clientScript->registerScript('img',"
    $('.content img').attr('class','img-responsive');
");
?>
<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <?php echo CHtml::link('Tambah Halaman',array('page/create'),array('class'=>'btn btn-success'))?>
        </div>
    </div>
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$model->search(),
        'itemView'=>'_view',
        'template'=>'{items}{pager}'
    )); ?>
</section><!-- /.content -->