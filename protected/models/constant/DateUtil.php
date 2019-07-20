<?php


class DateUtil
{
    public static function getAllMonthOptions() {
        return array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
    }

    /**
     * @param $date string yyyy-mm-dd
     * @return string
     */
    public static function dateToString($date) {
        $month = self::getAllMonthOptions();
        $tmp = explode('-', $date);
        return $tmp[2].' '.$month[$tmp[1]].' '.$tmp[0];
    }
}