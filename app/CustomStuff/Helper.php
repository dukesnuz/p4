<?php
namespace App\CustomStuff;

class Helper
{
    // Strip numbers, leave only numbers in the result
    public function stripNumber($number)
    {
        $number = str_replace(array(' ','-', '(',')'),'', $number);
        return $number;
    }
}