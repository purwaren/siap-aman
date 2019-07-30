<?php
/* @var $model FeedbackCustom */

if (empty($model->from0->profile_pict)) {
    $profile_pict = Yii::app()->theme->baseUrl.'/assets/img/user1-128x128.jpg';
} else {
    $profile_pict = Yii::app()->baseUrl.'/'.$model->from0->profile_pict;
}

?>
<div class="direct-chat-msg right">
    <div class="direct-chat-info clearfix">
        <span class="direct-chat-name pull-right"><?php echo $model->from0->name.' '.$model->from0->getRoleTitle() ?></span>
        <span class="direct-chat-timestamp pull-left"><?php echo $model->created_at ?></span>
    </div>
    <!-- /.direct-chat-info -->
    <img class="direct-chat-img" src="<?php echo $profile_pict ?>" alt="message user image">
    <!-- /.direct-chat-img -->
    <div class="direct-chat-text">
        <?php echo $model->message ?>
    </div>
    <!-- /.direct-chat-text -->
</div>