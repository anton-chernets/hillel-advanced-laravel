<?php


namespace App\Helpers;


class ArrayHelper
{
    public static function sumSecondNumbers(array $arr): int
    {
        $sum = 0;
        array_walk_recursive(
            $arr,
            static function ($value, $key) use (&$sum) {
                if (is_numeric($value) && !($key % 2 === 0)) {
                    $sum += $value;
                }
            }
        );
        return $sum;
    }
}
