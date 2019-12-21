<?php


class DocumentType
{
    const SURAT_PERMOHONAN = 1;
    const PROFIL_KLINIK = 2;
    const SELF_ASSESSMENT = 3;
    const SURAT_PENGANTAR = 4;
    const REKOMENDASI = 5;
    const ASSESSMENT = 5;

    public static function getAllDocumentTypeOptions() {
        return array(
            self::SURAT_PERMOHONAN => 'Surat Permohonan',
            self::PROFIL_KLINIK => 'Profil Klinik',
            self::SELF_ASSESSMENT => 'Self Assessment',
            self::SURAT_PENGANTAR => 'Surat Pengantar',
            self::REKOMENDASI => 'Rekomendasi',
            self::ASSESSMENT => 'Dokumen Assessment'
        );
    }
}