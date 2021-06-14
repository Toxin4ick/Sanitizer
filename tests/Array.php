<?php
namespace Check\Array;

class ArrayCheck
{
    public function apply($check)
    {

        if (is_array($check)) {
            return $check;
        }
        else{
        return ['Значение не является типом данных array'];

    }
    }
}