<?php
/**
 * Class TipePendamping
 */

class TipePendamping
{
    const PENDAMPING_MANAJEMEN = '01';
    const PENDAMPING_UKM = '02';
    const PENDAMPING_UKP = '03';

    public static function getAllTipeOptions() {
        return array(
            self::PENDAMPING_MANAJEMEN => 'Pendamping Manajemen',
            self::PENDAMPING_UKM => 'Pendamping UKM',
            self::PENDAMPING_UKP => 'Pendamping UKP'
        );
    }
}