<?php
/**
$data = json_encode([
    'foo' => '123',
    'bar' => 'asd',
    'baz' => '8 (950) 288-56-23',
]);
if( $curl = curl_init() ) {
    curl_setopt($curl, CURLOPT_URL, 'http://localhost/index.php');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "a=$data");
    $out = curl_exec($curl);
    echo $out;
    curl_close($curl);
}*/
require_once "String.php";
require_once "Int.php";
require_once "Float.php";
require_once "sanitaize.php";
require_once "Phone.php";
use PHPUnit\Framework\TestCase;
use Sanitizer\Sanitizer;

class ExampleTest extends TestCase
{
    public function testSanitize()
    {
        $s = new Sanitizer();
        $filters = ['foo' => 'int'];
        $data = json_encode(['foo' => '123']);
        $this->assertTrue($s->sanitize($filters, $data)['foo'] === 123);


        $filters = ['bar' => 'string'];
        $data = json_encode(['bar' => 'asd']);
        $this->assertTrue($s->sanitize($filters, $data)['bar'] === 'asd');
    }
}