<?php
/* @var $content string */
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl?>/assets/css/print.css" />
    <title>Daftar Klinik Hasil Akreditasi</title>
</head>
<body>
<div class="page-header">
    <img src="<?php echo Yii::app()->theme->baseUrl?>/assets/img/logo.png" style="height: 50px">
</div>

<div class="page-footer">
    Jl. Kesehatan No. 10, Kel. Petojo Selatan, Kec. Gambir <br />
    Jakarta Pusat, Jakarta 10510 <br />
    Telp. (021) 3845825
</div>

<table>

    <thead>
    <tr>
        <td>
            <!--place holder for the fixed-position header-->
            <div class="page-header-space"></div>
        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <?php echo $content; ?>
        </td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td>
            <!--place holder for the fixed-position footer-->
            <div class="page-footer-space"></div>
        </td>
    </tr>
    </tfoot>

</table>
<script type="text/javascript">
    window.onload = function() { window.print(); }
</script>
</body>
</html>