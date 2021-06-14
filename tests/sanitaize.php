<?php
namespace Sanitizer;

use Check\Array\ArrayCheck;
use Check\Float\FloatCheck;
use Check\Int\IntCheck;
use Check\String\StringCheck;
use Check\Phone\PhoneCheck;
use Check\Structure\StructureCheck;
class Sanitizer
{
    public $storeTypes = [
        'float' => FloatCheck::class,
        'int'=>IntCheck::class,
        'string'=>StringCheck::class,
        'phone'=> PhoneCheck::class,
        'Array'=>ArrayCheck::class,
        'Structure'=>StructureCheck::class
    ];

    public function sanitize(array $filters, $data)
    {
        $data = json_decode($data, true); //переделываем json формат в ассоциативный массив
        foreach ($data as $key=>$sada) //Проходимя по всему массиву
        {
            if (array_key_exists($key, $filters)) //проверяем чтобы каждый ключ из data совпадал с нашими заданными
            {

            }
            else
            {
                echo "Ключа  $key нет в списке доступных ключей";
                die;//Если нашёлся какой-то ключ которые не входит в наш список, то завершаем процесс
            }
        }
        foreach ($filters as $key => $filter)//Теперь проходимся для проверки типа данных
        {
                if (isset($this->storeTypes[$filter]))//Проверка на то чтобы типы данных подходили с заданными нами
                {
                    $substitute = new $this->storeTypes[$filter]();//Создаём новый объект хранящий этот тип данных

                    if (is_array($data[$key]))// Я х.з как оно проверяет
                    {
                        for ($i = 0; $i < count($data[$key]); $i++)//Цикл для каждого элемента массива
                        {
                            $data[$key] = $substitute->apply($data[$key]);//Меняет тип данных из string, на нужный.
                        }
                    }
                    else
                    {
                        $data[$key] = $substitute->apply($data[$key]);//Если в строке от переделанного массива json тип данных не соотносится с заданным то появиться ошибка с объяснением
                    }
                }
                else
                {
                    return "У ключа $key неправильный тип данных";// Тип данных ключа заддан не корректно
                }
        }
        return $data;//Выводим наш массивчик
    }
}