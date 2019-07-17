<!-- Default box -->
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo CHtml::encode($data->title); ?><small class="hidden-xs"> ditulis oleh <strong><?php echo $data->user_create; ?></strong></small></h3>
        <div class="box-tools pull-right hidden-xs">
            <span class="time"><i class="fa fa-calendar"></i> <?php echo $data->timestamp_created; ?></span>
        </div>
        <div class="hidden-sm hidden-md hidden-lg">
            <small>Ditulis oleh <strong><?php echo $data->user_create; ?></strong> |  <?php echo $data->timestamp_created; ?></span></small>
        </div>
    </div>
    <div class="box-body">
        <?php echo $data->summary; ?>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <?php echo CHtml::link('<i class="fa fa-search"></i> Pratinjau',array('news/view','id'=>$data->id),array('class'=>'btn btn-app'))?>
        <?php echo CHtml::link('<i class="fa fa-edit"></i> Ubah',array('news/update','id'=>$data->id),array('class'=>'btn btn-app'))?>
        <?php if($data->flag_published == News::FLAG_PUBLISHED_INACTIVE && !Yii::app()->user->checkAccess('unit')) {
            echo CHtml::link('<i class="fa fa-check"></i> Setujui', array('news/approve', 'id' => $data->id), array('class' => 'btn btn-app btn-approve'));
        }?>
        <?php if(Yii::app()->user->checkAccess('admin')) { echo CHtml::link('<i class="fa fa-trash"></i> Hapus',array('news/delete','id'=>$data->id),array('class'=>'btn btn-app btn-delete')); }?>
    </div><!-- /.box-footer-->
</div><!-- /.box -->