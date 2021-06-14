<?php
namespace Check\Float;

class FloatCheck
{
    public function apply($check)
    {
        return !is_numeric($check) ? ['Значение не является типом данных float'] : (float)$check;
    }
}