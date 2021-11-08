<?php


namespace App\Helpers;


class StringHelper
{
    public static function getFileNameWithoutFormat(string $str): array
    {
        $arr = mb_str_split($str, 1, 'UTF-8');
        $result = [];
        foreach ($arr as $value){
            if(array_key_exists($value, $result)){
                ++$result[$value];
            } else {
                $result[$value] = 1;
            }
        }
        return $result;
    }

    public static function camelCaseToSeparateWords(string $str): string
    {
        return implode(' ', preg_split('/(?=[A-Z])/',$str));
    }

    /**
     * @param string $line
     * @return string
     */
    public static function lineBreak(string $line): string
    {
        return $line . PHP_EOL;
    }
}
