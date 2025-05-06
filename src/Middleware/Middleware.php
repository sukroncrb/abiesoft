<?php 

namespace Sukroncrb2025\Abiesoft\Middleware;

use Sukroncrb2025\Abiesoft\Sistem\Utilities\Reader;

class Middleware {

    protected static function whiteListDefault () {
        return [
            '/',
        ];
    }

    protected static function whiteUserUrlAccess ($grup) {
        $data[$grup] = self::whiteListDefault();
        $dataroute = Reader::yaml("routes");
        foreach($dataroute as $r){
            foreach($r['path'] as $k => $v) {
                if(in_array($grup,explode(",",$v['midleware']))){
                    array_push($data[$grup], $k);
                }
            }
        }
        return $data[$grup];
    }

    public static function url($path, $grup) {
        return in_array($path,self::whiteUserUrlAccess($grup));
    }

}