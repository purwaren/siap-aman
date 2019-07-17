<?php
/* @var $this Controller */
$this->pageTitle = 'Artikel';
$this->breadcrumbs = array(
    'Artikel'
);
Yii::app()->clientScript->registerScript('img',"
    $('.content img').attr('class','img-responsive');
    $('.btn-approve').click(function(){
        event.preventDefault();
        if(confirm('Anda yakin akan menyetujui artikel ini. Artikel yang disetujui secara otomatis akan terpublikasi di website.')) {
            ".CHtml::ajax(array(
                'type'=>'POST',
                'dataType'=>'JSON',
                'url'=>"js:$(this).attr('href')",
                'success'=>"function(data){
                    alert(data.message);   
                    window.location.reload();
                }"
            ))."
        }
    });
    $('.btn-delete').click(function(){
        event.preventDefault();
        if(confirm('Anda yakin akan menghapus artikel ini ?')) {
             ".CHtml::ajax(array(
                'type'=>'POST',
                'dataType'=>'JSON',
                'url'=>"js:$(this).attr('href')",
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
    <div class="box box-primary">
        <div class="box-body">
            <?php echo CHtml::link('Tambah Artikel',array('news/create'),array('class'=>'btn btn-success'))?>
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
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$model->search(),
        'itemView'=>'_view',
        'template'=>'{items}{pager}',
        'afterAjaxUpdate'=>"function(id, data){
            $('.btn-delete').click(function(){
                event.preventDefault();
                if(confirm('Anda yakin akan menghapus artikel ini ?')) {
                     ".CHtml::ajax(array(
                        'type'=>'POST',
                        'dataType'=>'JSON',
                        'url'=>"js:$(this).attr('href')",
                        'success'=>"function(data){
                            alert(data.message);   
                            window.location.reload();
                        }"
                    ))."
                }
            });
        }",
    )); ?>
</section><!-- /.content -->