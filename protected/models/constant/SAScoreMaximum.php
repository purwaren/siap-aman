<?php


class SAScoreMaximum
{
    const MAX_BAB_I = 1220;
    const MAX_BAB_II = 1510;
    const MAX_BAB_III = 1720;
    const MAX_BAB_IV = 580;

    public static function getAllMaxScoreOptions() {
        return array(
            'I' => self::MAX_BAB_I,
            'II' => self::MAX_BAB_II,
            'III' => self::MAX_BAB_III,
            'IV' => self::MAX_BAB_IV,
        );
    }
}