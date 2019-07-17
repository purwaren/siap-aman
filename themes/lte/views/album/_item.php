<?php
/* @var $data AlbumContent*/
?>
<?php if($data->Album->type == Album::TYPE_PICTURE) { ?>
<div class="album-item col-md-3">
        <?php echo CHtml::link(
            CHtml::image($data->filepath, $data->caption, array('class'=>'img-responsive')),
                $data->filepath,
                array('data-title'=>$data->caption, 'data-gallery'=>'multiimages')
            );
        ?>

    <?php echo CHtml::link('<i class="fa fa-trash"></i>',array('album/deleteContent','id'=>$data->id),array('class'=>'btn btn-sm btn-danger','title'=>'Hapus Album'))?>
    <br /><span><?php echo $data->caption ?></span>
</div>
<?php } else { ?>
<div class="video-item col-md-3 colborder">
    <iframe class="video-iframe" src="<?php echo $data->getEmbedUrl()?>?rel=0&amp;wmode=transparent" frameborder="0" allowfullscreen=""></iframe>
    <br />
    <span><?php echo $data->caption ?></span>
</div>
<?php } ?>
