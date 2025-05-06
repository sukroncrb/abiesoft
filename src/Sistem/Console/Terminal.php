<?php 

namespace Sukroncrb2025\Abiesoft\Sistem\Console;

use Sukroncrb2025\Abiesoft\Sistem\Console\Do\Action;
use Sukroncrb2025\Abiesoft\Sistem\Console\Schema\DeleteSchema;
use Sukroncrb2025\Abiesoft\Sistem\Console\Schema\MakeSchema;

class Terminal {

    use Opsi, Action, MakeSchema, DeleteSchema;

    public function command(String $action = "", String $value = "", String $opsi = "") {

        $model = "";

        if(isset(explode(":",$action)[1])){
            $model = explode(":",$action)[1];
            $action = explode(":",$action)[0];
        }

        return match($action){
            "start" => $this->start(),
            "make" => $this->make($model, $value),
            "delete" => $this->delete($model, $value),
            default => $this->help()
        };
    }

    protected function make(string $model, string $value) {
        return match($model){
            'schema' =>$this->buatSchema($value),
            default => $this->help()
        };
    }

    protected function delete(string $model, string $value) {
        return match($model){
            'schema' =>$this->deleteSchema($value),
            default => $this->help()
        };
    }

    protected function help() {
        echo "\n\n".$this->ColoringWithBox('Help!', 'hijau')."\n\n";
        echo $this->ColoringTextOnly('Aplikasi', 'biru')."\n";
        echo "   start\n\n";
        echo $this->ColoringTextOnly('Schema', 'biru')."\n";
        echo "   make:schema namatabel \n";
        echo "   delete:schema namatabel \n";
        echo "\n\n";
    }

}