<?php
/**
 * @description: 
 * This class will be having the following use cases:
 * - Set of words > 4
 * - Set of words > 1 and < 4
 * - Set of words = 1 (Characters > 3)
 * - Set of words = 1 (Characters <= 3)
 */
class UniqueCode
{
    private $sentence;
    private $uniqueCode;
    private $wordsCount;
    private $maxUniqueLimit = 4;

    public function __construct($sentence)
    {
        $this->sentence = $sentence;
        $this->wordsCount = 0;
    }
    
    /**
     * Count the number of words in $str
     */
    private function countWords($pickChars = false)
    {
        $state = 1;
        $i = 0;
        while($i < strlen($this->sentence))
        {
            if(' ' == $this->sentence[$i] || '\n' == $this->sentence[$i] 
                    || '\t' == $this->sentence[$i])
            {
                $state = 1;
            }
            else if($state == 1)
            {
                if($pickChars && $this->wordsCount < 4 && $this->ifAlphabet($this->sentence[$i]))
                    $this->uniqueCode .= $this->sentence[$i];
                
                ++$this->wordsCount;
                $state = 0;
            }
            ++$i;
        }
    }
    
    private function ifAlphabet($value)
    {
        $key = ord($value);
        if(($key > 47 && $key < 58) ||
           ($key > 64 && $key < 91) ||
           ($key > 96 && $key < 123))
        {
            return true;
        }
        return false;
    }
    
    private function getWordsCount()
    {
        return $this->wordsCount;
    }
    
    private function setUniqueCode($value)
    {
        $this->uniqueCode = $value;
    }
    
    public function getUniqueCode()
    {
        return $this->uniqueCode;
    }
    
    public function generateUniqueCode($options = [])
    {
        $parentCode = $options['parent_code'] ?? false;
        if($parentCode)
        {
            $secStr = explode("_", $parentCode);
            if(1 == count($secStr) && "_" != trim($secStr[count($secStr) - 1]))
            {
                $parentCode .= "_" . 1;
            }
            else if(1 > count($secStr) && "_" == trim($secStr[count($secStr) - 1]))
            {
                $parentCode .= 1;
            }
            else
            {
                $lastCounter = intval(trim($secStr[count($secStr) - 1]));
                $usPos = strrpos($parentCode, "_");
                $parentCode = substr($parentCode, 0, $usPos + 1) . (++$lastCounter);
            }
            $this->setUniqueCode($parentCode);
        }
        else
        {
            $this->countWords(true);
            if(0 == $this->wordsCount)
            {
                return -1;
            }
            else if(1 == $this->wordsCount)
            {
                $value = "";
                if(3 < strlen($this->wordsCount))
                {
                    $value = substr($this->sentence, 0, 3);
                }
                else if(0 == strlen($this->wordsCount))
                {
                    return -1;
                }
                else if(3 > strlen($this->wordsCount))
                {
                    $value = substr($this->sentence, 0);
                }
                $this->setUniqueCode($value);
            }
            $value = $this->getUniqueCode() . rand(1, 9999999);
            $this->setUniqueCode($value);
        }
        return $this->getUniqueCode();
    }
}

$sentance = "";
$obj = new UniqueCode($sentance);
print("\n");
print($obj->generateUniqueCode());
print("\n");
$sentance = "A";
$obj = new UniqueCode($sentance);
$parent = $obj->generateUniqueCode();
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$obj = new UniqueCode($parent);
$parent = $obj->generateUniqueCode(['parent_code' => $parent]);
print("\n");
print($parent);
print("\n");
$sentance = "Ad Labs (P) Ltd";
$obj = new UniqueCode($sentance);
$parent = $obj->generateUniqueCode();
print("\n");
print($parent);
print("\n");
?>