<?php
namespace Check\String;

class StringCheck
{
    public function apply($check)
    {
        return !is_string($check) ? ['Значение не является типом данных string'] : $check;
    }
}