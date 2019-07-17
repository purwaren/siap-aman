<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $this->getPageTitle(); ?>
        </h1>
        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('ext.EBreadcrumbs', array(
                'breadcrumbLabel'=>' ',
                'links'=>$this->breadcrumbs,
                'htmlOptions'=>array('class'=>'breadcrumb'),
                'tagName'=>'ol',
                'encodeLabel'=>false
            )); ?>
        <?php endif?>

    </section>
    <?php echo $content; ?>
</div><!-- /.content-wrapper -->
<?php $this->endContent(); ?>