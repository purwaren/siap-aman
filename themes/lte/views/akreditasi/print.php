<?php
/* @var $model PengajuanAkreditasiCustom */

$dataProvider = $model->searchForPrint();
$data = $dataProvider->getData();
?>
<div class="page">
    <h3 style="text-align: center">DATA AKREDITASI KLINIK</h3>
    <table border="1" cellpadding="2" cellspacing="0">
        <thead>
            <tr>
                <th>NO</th>
                <th>PROVINSI</th>
                <th>KAB / KOTA</th>
                <th>NAMA KLINIK</th>
                <th>ALAMAT</th>
                <th>KEPEMILIKAN</th>
                <th>TANGGAL PENETAPAN</th>
                <th>HASIL</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $no=>$pengajuan) {?>
            <tr>
                <td class="text-center"><?php echo $no+1 ?></td>
                <td>DKI JAKARTA</td>
                <td><?php echo $pengajuan->idKlinik->getRegency() ?></td>
                <td><?php echo $pengajuan->idKlinik->nama ?></td>
                <td><?php echo $pengajuan->idKlinik->getAlamat() ?></td>
                <td class="text-center"><?php echo $pengajuan->idKlinik->kepemilikan ?></td>
                <td><?php echo DateUtil::dateToString($pengajuan->tgl_penetapan) ?></td>
                <td class="text-center"><?php echo empty($pengajuan->hasil) ? strtoupper($pengajuan->idKlinik->tingkatan) : strtoupper($pengajuan->hasil) ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
