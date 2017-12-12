<?php
namespace App\CustomStuff;

class Helper
{
    // Strip numbers, leave only numbers in the result
    public static function stripNumber($number)
    {
        $number = str_replace(array(' ','-', '(',')'),'', $number);
        return $number;
    }

    // Format numbers using hyphens
    public static function formatPhoneNumber($number)
    {
        $formatted_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number);
        return $formatted_number;
    }
}
