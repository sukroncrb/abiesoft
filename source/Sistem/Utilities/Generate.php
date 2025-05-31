<?php

namespace Sukroncrb2025\Abiesoft\Sistem\Utilities;

use Sukroncrb2025\Abiesoft\Sistem\Mysql\DB;

class Generate {

    public static function acak()
    {
        $karakter = 'AaBbCcDdEeFfGgHhIiJjKkLMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789';
        $batas = strlen($karakter);
        $result = '';
        for ($i = 0; $i < 12; $i++) {
            $result .= $karakter[rand(0, $batas - 1)];
        }
        return $result;
    }

    public static function angka($jumlah = 4): int
    {
        $karakter = '0123456789';
        $batas = strlen($karakter);
        $result = '';
        for ($i = 0; $i < $jumlah; $i++) {
            $result .= $karakter[rand(0, $batas - 1)];
        }
        return $result;
    }

    public static function salt(): string
    {
        $charset = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!~^@#$%^&*";
        $base = strlen($charset);
        $result = '';

        $now = explode(' ', microtime())[1];
        while ($now >= $base) {
            $i = $now % $base;
            $result = $charset[$i] . $result;
            $now /= $base;
        }
        return substr($result, -20);
    }

    public static function secretCode($data, $key) {
        $cipher = "aes-128-cbc";
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);

        if (is_array($data)) {
            $data = json_encode($data);
        }

        $ciphertext = openssl_encrypt($data, $cipher, $key, $options=0, $iv);
        return base64_encode($iv . $ciphertext);
    }  

    public static function createSession(string $email) {
        // $kode = Generate::angka(6);
        // $data = [
        //     'email' => $email,
        //     'sesi' => $kode
        // ];
        // $key = Config::fromEnv('SECRET_KEY');
        // $secretcode = Generate::secretCode($data, $key);
        // return $secretcode;
    }

    public static function formID($class): string
    {
        $cf = Cookies::lihat("_cf",);
        $kode = Reader::secretCode($cf, Reader::env('SECRET_KEY'))['inisial'];
        $result = "form-".sha1($class.$kode);
        return $result;
    }

    public static function csrf($formid): string
    {
        $result = "";
        $token = self::acak();
        if(DB::terhubung()->query("SELECT id FROM token WHERE idformulir = ?", [$formid])->hitung() > 0){
            $input = DB::terhubung()->perbarui('token', DB::terhubung()->query("SELECT id FROM token WHERE idformulir = ?", [$formid])->teks(), [
                'idformulir' => $formid,
                'token' => $token
            ]);
        }else{
            $input = DB::terhubung()->input('token', [
                'idformulir' => $formid,
                'token' => $token
            ]);
        }
        if($input){
            $result = $token;
        }
        return $result;
    }

    public static function password(string $string, string $salt): string
    {
        return hash('sha256', $string . $salt);
    }

}