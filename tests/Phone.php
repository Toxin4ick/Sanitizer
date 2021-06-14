<?php
namespace Check\Phone;

class PhoneCheck
{

function apply($param)
{
    return !preg_match('/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', $param) ? ['Значение не является типом данных phone'] : $param;

}
 }