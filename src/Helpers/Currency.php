<?php

namespace Dena\IranLaravel\Helpers;

class Currency
{
    public static function toRial($number)
    {
        return intval($number * 10);
    }
    
    public static function toToman($number)
    {
        return intval($number / 10);
    }
    
    public static function toPersianFormat($number)
    {
        return strrev(implode(',', str_split(strrev(strval(intval($number))), 3)));
	}
}