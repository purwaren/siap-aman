<?php
/* @var $this Controller */
/* @var $model Album */
/* @var $content AlbumContent */
/* @var $clientScript CClientScript */
$this->pageTitle = 'Album - '.$model->name;
$this->breadcrumbs = array(
    'Gallery'=>array('admin'),
    $model->name
);
$clientScript = Yii::app()->clientScript;
$clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/lightbox/ekko-lightbox.min.css');
$clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/lightbox/ekko-lightbox.js');
$clientScript->registerScript('lightbox',"
    $('.album-item a img').click(function(){
        event.preventDefault();
        $(this).ekkoLightbox({
            //'remote': $(this).attr('href')
        });
    });
");

$clientScript->registerScript('ads',"
    $('a.btn-danger').click(function(event){
        if(confirm('Anda yakin akan menghapus gambar ini ?')) {
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
            <?php echo CHtml::link('Upload',array('album/upload', 'id'=>$model->id),array('class'=>'btn btn-success'))?>
        </div>
    </div>    
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Semua Foto / Video dalam album ini</h3>
        </div>
        <div class="box-body">
            <?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$content->search(),
                'itemView'=>'_item',
                'template'=>'{items}{pager}',
                'itemsCssClass'=>'container-fluid album'
            )); ?>
        </div>
    </div>

</section><!-- /.content -->