<?php 

namespace Sukroncrb2025\Abiesoft\Sistem\Console\Do;

use Sukroncrb2025\Abiesoft\Sistem\Utilities\Reader;

trait Action {

    public function start () {
        $dir = __DIR__."/../../../../".Reader::env('PUBLIC_FOLDER');
        chdir($dir);
        $domain = Reader::env('DOMAIN');
        $port = Reader::env('PORT');
        $ping = null;
        $output = null;
        
        if(PHP_OS == "WINNT") {
            $command = 'ping '.$domain;
        }else{
            $command = 'ping -c 4 '.$domain;
        }
        
        exec($command, $output, $ping);
        if($ping == 0){
            $result = null;
            $output = null;
            echo "\n\n\n".$this->ColoringWithBox('Server Running', 'hijau')."\n";
            echo $this->ColoringTextOnly('Berjalan di:', 'biru')." http://" . $domain . ":" . $port."\n";
            echo $this->ColoringTextOnly('Catatan:', 'biru')." Untuk mematikan server ctrl+C atau close terminal\n\n\n\n";
            exec("php -S " . $domain . ":" . $port, $output, $result);
        }else{
            echo "\n".$this->ColoringWithBox('Domain Error!','merah')."\n";
            echo $this->ColoringTextOnly('Pesan:', 'merah')." Domain/IP : ".$domain." tidak bisa berjalan di jaringan ini.\n";
            echo $this->ColoringTextOnly('Saran:', 'hijau')." Cek setingan DOMAIN pada file .env atau gunakan localhost 127.0.0.1\n\n";
            die();
        }
    }

}