<?php
/* @var $this SudinController */
/* @var $model SudinCustom */


$this->pageTitle = 'Dokumen: '.$name;

?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default">
                <div class="box-body">
                    <object style="width:800px; min-height: 600px; position: absolute;" data="<?php echo $url ?>" type="application/pdf">
                        You need to enable pdf viewer in browser
                    </object>
                </div>
            </div>
        </div>
    </div>

</section><!-- /.content -->