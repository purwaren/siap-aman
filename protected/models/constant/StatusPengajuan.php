<?php


class StatusPengajuan
{
    const DRAFT = 0;
    const DIAJUKAN = 1;
    const DITOLAK = 2;
    const VISIT = 3;
    const DITERIMA = 4;
    const REKOMENDASI = 5;
    const BATAL = 6;

    public static function getAllStatusPengajuanOptions() {
        return array(
            self::DRAFT => 'Draft',
            self::DIAJUKAN => 'Diajukan',
            self::DITOLAK => 'Ditolak',
            self::DITERIMA => 'Diterima',
            self::REKOMENDASI => 'Rekomendasi',
            self::BATAL => 'Dibatalkan'
         );
    }

    public static function getStatusPengajuanForFeedback() {
        return array(
            self::DITOLAK => 'Ditolak',
            self::DITERIMA => 'Diterima',
            self::BATAL => 'Dibatalkan'
        );
    }
}