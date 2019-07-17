<?php
/* @var $data Album*/
?>
<div class="album-item col-md-3">
    <div class="item-overlay">
        <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('album/update','id'=>$data->id),array('class'=>'btn btn-sm btn-primary','title'=>'Edit Album'))?>
        <?php echo CHtml::link('<i class="fa fa-trash"></i>',array('album/delete','id'=>$data->id),array('class'=>'btn btn-sm btn-danger','title'=>'Hapus Album'))?>
        <a href="<?php echo Yii::app()->createUrl('album/view', array('id'=>$data->id))?>">
            <?php echo $data->getAlbumThumbnail(); ?>
        </a>
    </div>
    <span><?php echo $data->name ?></span>
</div>