<?php
/**
 * @var $model Registrant
 * @var $photo RegistrantDocument
 */
?>
<html style="margin: 0px; padding: 0px;">
<table cellpadding="0" cellspacing="0" style="border-bottom: #000 2px solid;">
    <tr>
        <td style="width: 12%" valign="middle"><img src="<?php echo Yii::app()->theme->baseUrl?>/assets/img/logo.png" /></td>
        <td style="width: 88%; font-size: 15pt; font-weight: bold;" >&nbsp;<br />&nbsp;&nbsp;&nbsp;PERGURUAN ISLAM AL-ULUM TERPADU<br />&nbsp;&nbsp;&nbsp;PANITIA PENERIMAAN SISWA BARU</td>
    </tr>
</table>
<div style="text-align: center; font-size: 12pt; font-weight: bold; text-decoration: underline;">KARTU UJIAN</div>
<br />
<table cellpadding="3" style="font-size: 12pt;">
    <tr>
        <td style="width: 30%" rowspan="4"><img src="<?php echo $photo->path ?>" style="border: #000 1px solid;"/></td>
        <td style="width: 23%">No. Peserta</td>
        <td style="width: 2%;">:</td>
        <td style="width: 45%"><?php echo $model->reg_number ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $model->firstname.' '.$model->lastname?></td>
    </tr>
    <tr>
        <td>Lokasi Ujian</td>
        <td>:</td>
        <td>Perguruan Al-Ulum Terpadu<br />Jalan Tuasan No. 35, Kota Medan<br />Kode Pos 2022</td>
    </tr>
    <tr>
        <td>Waktu Ujian</td>
        <td>:</td>
        <td>Rabu, 1 Juni 2016<br/>Pukul 08:00 WIB s.d. 12:00 WIB</td>
    </tr>
</table>
<br />
<br />

<p><strong>Catatan:</strong>
<ol>
    <li>Anda diwajibkan untuk mencetak kartu ujian ini, kemudian dibawa pada saat mengikuti ujian.</li>
    <li>Membawa peralatan tulis (pensil 2B untuk lembar jawab komputer)</li>
</ol>
</p>
</html>