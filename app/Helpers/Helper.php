<?php

namespace App\Helpers;

class Helper{

    public static function IDtransaction($model, $prefix){
        $data = $model::orderBy('id', 'desc')->first();
        if($data == null){
            return $prefix.'-1';
        }
        return $prefix.'-'.$data->id;
    }
}

?>
