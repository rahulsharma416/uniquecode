<?php
use PHPUnit\Framework\TestCase;
use src\Classes\UniqueCode;
require dirname(dirname(__FILE__)) . '/src/Classes/UniqueCode.php';

class UniqueCodeTest extends TestCase
{    

    public function testGenerateUniqueCodeBlank()
    {
        $salt = rand(1, 9999999);
        $testValue = '';
        $expected = -1;
        $uniqueCode = new UniqueCode($testValue, $salt);
        $this->assertEquals($expected,
                $uniqueCode->generateUniqueCode());
    }

    public function testGenerateUniqueCodeSingle()
    {
        $salt = rand(1, 9999999);
        $testValue = 'A';
        $expected = $testValue . $salt;
        $uniqueCode = new UniqueCode($testValue, $salt);
        $this->assertEquals($expected,
                $uniqueCode->generateUniqueCode());
    }

    public function testGenerateUniqueCodeSingleFew()
    {
        $salt = rand(1, 9999999);
        $testValue = 'Adlabs';
        $expected = substr($testValue, 0, 3) . $salt;
        $uniqueCode = new UniqueCode($testValue, $salt);
        $this->assertEquals($expected,
                $uniqueCode->generateUniqueCode());
    }

    public function testGenerateUniqueCodeMultiple1()
    {
        $salt = rand(1, 9999999);
        $testValue = 'Adlabs Windows';
        $expected = 'AW' . $salt;
        $uniqueCode = new UniqueCode($testValue, $salt);
        $this->assertEquals($expected,
                $uniqueCode->generateUniqueCode());
    }

    public function testGenerateUniqueCodeMultiple2()
    {
        $salt = rand(1, 9999999);
        $testValue = 'Adlabs Windows (P) Ltd';
        $expected = 'AWL' . $salt;
        $uniqueCode = new UniqueCode($testValue, $salt);
        $this->assertEquals($expected,
                $uniqueCode->generateUniqueCode());
    }

    public function testGenerateUniqueCodeParentChild()
    {
        $salt = rand(1, 9999999);
        $testValue = 'Adlabs Windows (P) Ltd';
        $expected = 'AWL' . $salt;
        $uniqueCode = new UniqueCode($testValue, $salt);
        $this->assertEquals($expected,
                $uniqueCode->generateUniqueCode());
        $i = 1;
        while($i < 10000)
        {
            $uniqueCode = new UniqueCode($expected . "_" . $i, $salt);
            $this->assertEquals($expected . "_" . ($i + 1),
                    $uniqueCode->generateUniqueCode(['parent_code' => $expected . "_" . $i]));
            ++$i;
        }
    }
}