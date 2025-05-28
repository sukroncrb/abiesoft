<?php 

namespace Sukroncrb2025\Abiesoft\Sistem\Console;

trait Opsi {

    public static function coloringWithBox ($teks,$warna = 'hitam') {
        return match($warna) {
            'abuabu' => "\e[0m\e[0;100m ".$teks." \e[0m",
            'merah' => "\e[0m\e[0;101m ".$teks." \e[0m",
            'hijau' => "\e[0m\e[0;102m ".$teks." \e[0m",
            'kuning' => "\e[0m\e[0;103m ".$teks." \e[0m",
            'biru' => "\e[0m\e[0;104m ".$teks." \e[0m",
            'pink' => "\e[0m\e[0;105m ".$teks." \e[0m",
            'birumuda' => "\e[0m\e[0;106m ".$teks." \e[0m",
            'putih' => "\e[0m\e[0;107m ".$teks." \e[0m",
            'hitam' => "\e[0m\e[0;108m ".$teks." \e[0m",
            default => "\e[0m\e[0;108m ".$teks." \e[0m"
        };
    }

    public static function coloringTextOnly ($teks,$warna = 'default') {
        return match($warna) {
            'abuabu' => "\e[0;30m".$teks."\e[0m",
            'merah' => "\e[0;31m".$teks."\e[0m",
            'hijau' => "\e[0;32m".$teks."\e[0m",
            'kuning' => "\e[0;33m".$teks."\e[0m",
            'biru' => "\e[0;34m".$teks."\e[0m",
            'pink' => "\e[0;35m".$teks."\e[0m",
            'birumuda' => "\e[0;36m".$teks."\e[0m",
            'putih' => "\e[0;37m".$teks."\e[0m",
            default => "\e[0m".$teks."\e[0m"
        };
    }

}