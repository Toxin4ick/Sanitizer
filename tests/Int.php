<?php
namespace Check\Int;

class IntCheck
{
    public function apply($check)
    {
        return !ctype_digit($check) ? 'Значение не является типом данных int' : (int)$check;
    }
}