<?php 

namespace Sukroncrb2025\Abiesoft\Sistem\Console;

use Sukroncrb2025\Abiesoft\Sistem\Console\do\Action;

class Terminal {

    use Opsi, Action;

    public function command(String $action = "", String $value = "", String $opsi = "") {
        return match($action){
            "start" => $this->start(),
            default => $this->help()
        };
    }

    protected function help() {
        echo "\n\n".$this->ColoringWithBox('Help!', 'hijau')."\n\n";
        echo $this->ColoringTextOnly('Aplikasi', 'biru')."\n";
        echo "   start\n";
        echo "\n\n";
    }

}