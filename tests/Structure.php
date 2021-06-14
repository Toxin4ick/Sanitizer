<?php

namespace Check\Structure;

class StructureCheck
{

    public function apply($check)
{
    if ((array_keys($check) !== range(0, count($check) - 1))) {
        return $check;
    }
    foreach ($check as $key=>$value){
        if(!is_string($key)){
            return 'Значение не является типом данных String';
            die;
        }
    }
    return 'Значение не является типом данных Structure';
}
}