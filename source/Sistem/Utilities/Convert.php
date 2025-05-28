<?php

namespace Sukroncrb2025\Abiesoft\Sistem\Utilities;

class Convert {

    public static function tsToWord(string $timestamp): string {

        $waktu_sekarang = time();
        $selisih_detik = $waktu_sekarang - $timestamp;

        if ($selisih_detik < 60) {
            return " barusaja";
        } elseif ($selisih_detik < 3600) { // 60 detik * 60 menit
            return round($selisih_detik / 60) . " menit yang lalu";
        } elseif ($selisih_detik < 86400) { // 60 detik * 60 menit * 24 jam
            return round($selisih_detik / 3600) . " jam yang lalu";
        } elseif ($selisih_detik < 2592000) { // 60 detik * 60 menit * 24 jam * 30 hari (rata-rata)
            return round($selisih_detik / 86400) . " hari yang lalu";
        } elseif ($selisih_detik < 31536000) { // 60 detik * 60 menit * 24 jam * 365 hari (rata-rata)
            return round($selisih_detik / 2592000) . " bulan yang lalu";
        } else {
            return round($selisih_detik / 31536000) . " tahun yang lalu";
        }

    }
}