<?php
/* @var $this Controller */
$this->pageTitle = 'Gallery Foto & Video';
$this->breadcrumbs = array(
    'Galeri'
);
Yii::app()->clientScript->registerScript('ads',"
    $('a.btn-danger').click(function(event){
        if(confirm('Anda yakin akan menghapus album ini dan semua gambar di dalamnya?')) {
            var url = $(this).attr('href');
            ".CHtml::ajax(array(
                'url'=>'js:url',
                'type'=>'POST',
                'success'=>"function(res){
                    window.location.reload();
                }"
            ))."
        }
        return false;
    });
");
?>
<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <?php echo CHtml::link('Tambah Album',array('album/create'),array('class'=>'btn btn-success'))?>
        </div>
    </div>
    <div class="box box-primary collapsed-box">
        <div class="box-header">
            <h3 class="box-title">Advance Search</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            </div>
        </div>        
        <?php $this->renderPartial('_search',array('model'=>$model))?>        
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Semua Album</h3>
        </div>
        <div class="box-body">
            <?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$model->search(),
                'itemView'=>'_view',
                'template'=>'{items}{pager}',
                'itemsCssClass'=>'container-fluid album'
            )); ?>
        </div>
    </div>

</section><!-- /.content -->