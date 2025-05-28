<?php

namespace Sukroncrb2025\Abiesoft\Sistem\Utilities;

use Symfony\Component\Yaml\Yaml;

class Reader {

    public static function env($key):mixed{
        $dir = __DIR__.'/../../../';
        return parse_ini_file($dir.'.env')[$key];
    }

    public static function yaml(string $nama) :array{
        $dir = __DIR__.'/../../../config/';
        return Yaml::parseFile($dir.$nama.'.yaml');
    }

    public static function secretCode($secretcode, $key) {
        $cipher = "aes-128-cbc";
        $ciphertext_dec = base64_decode($secretcode);
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = substr($ciphertext_dec, 0, $ivlen);
        $ciphertext = substr($ciphertext_dec, $ivlen);
        $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv);
        $data = json_decode($original_plaintext, true);
        return (json_last_error() == JSON_ERROR_NONE) ? $data : $original_plaintext;
    }

}