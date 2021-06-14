<?php
/*
$filters = [
    'foo' => 'int',
    'bar' => 'string',
    'baz' => '125',
];
$data = json_encode([
    'foo' => '123',
    'bar' => 'asd',
    'baz' => '8 (950) 288-56-23',
]);
$testingparam =4;
foreach ($data as $key=>$das)
    if(is_int($das)){
        echo "</br>$das</br>";
    }
foreach ($filters as $key=>$filte)
if(is_numeric($filte))
{
    if(ctype_digit($filte)){
    $testingparam +=$filte;
        }
    echo "</br>$testingparam</br>";
}
var_dump($filters);
*/
use Sanitizer\Sanitizer;
require_once "tests/sanitaize.php";
require_once "tests/Int.php";
require_once "tests/Float.php";
require_once "tests/String.php";
require_once "tests/Phone.php";
require_once "tests/Array.php";
require_once "tests/Structure.php";
class FinalTest
{
    public function testing()
    {
        $sanitizer = new Sanitizer();
        $filters = [
            'foo' => 'int',
            'bar' => 'float',
            'dol' => 'phone',
            'sd' => 'string',
            'dsds' => 'string',
            'ar'=> 'Array',
            'st'=> 'Structure'
        ];
        $config = [
            'ar' => 'Array'
        ];
        $jsonString = json_encode([
            'ar' =>
                ["123",]]);
        $json = json_encode([
            'foo' => '65',
            'bar' => '23423.444',
            'dol' => '+7 (950) 288-56-23',
            'sd' => 'sdaf',
            'dsds'=> 'asd',
            'ar' =>
                ["123", "fdsf"],
            'st' => [
                'jhg'=>'dsa'
    ]
        ]);

        $result = $sanitizer->sanitize($filters, $json);
    var_dump($result);
    }
}
$ds=new FinalTest();
$ds->testing();


$dsad = ('+7 (950) 288-56-23'); // вернет 79096702017
$sdasaq = applys($dsad);
echo $sdasaq; // вернет false