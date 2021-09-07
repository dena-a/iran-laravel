<?php

namespace Dena\IranLaravel\Helpers;

use Exception;

class NumberToWords
{
    const POINT = 'ممیز';
    const SPLITTER = 'و';
    const NEGATIVE = 'منفی';

    protected static $ones = [
        0 => 'صفر',
        1 => 'یک',
        2 => 'دو',
        3 => 'سه',
        4 => 'چهار',
        5 => 'پنج',
        6 => 'شش',
        7 => 'هفت',
        8 => 'هشت',
        9 => 'نه',
    ];

    protected static $tenToNineteen = [
        0 => 'ده',
        1 => 'یازده',
        2 => 'دوازده',
        3 => 'سیزده',
        4 => 'چهارده',
        5 => 'پانزده',
        6 => 'شانزده',
        7 => 'هفده',
        8 => 'هجده',
        9 => 'نوزده',
    ];

    protected static $tens = [
        0 => '',
        1 => '',
        2 => 'بیست',
        3 => 'سی',
        4 => 'چهل',
        5 => 'پنجاه',
        6 => 'شصت',
        7 => 'هفتاد',
        8 => 'هشتاد',
        9 => 'نود',
    ];

    protected static $hundreds = [
        0 => '',
        1 => 'صد',
        2 => 'دویست',
        3 => 'سیصد',
        4 => 'چهارصد',
        5 => 'پانصد',
        6 => 'ششصد',
        7 => 'هفتصد',
        8 => 'هشتصد',
        9 => 'نهصد',
    ];

    protected static $powersOfTen = [
        0 => '',
        1 => 'هزار',
        2 => 'میلیون',
        3 => 'میلیارد',
        4 => 'بیلیون',
        5 => 'بیلیارد',
        6 => 'تریلیون',
        7 => 'تریلیارد',
    ];

    protected static $negativePowersOfTen = [
        0 => '',
        1 => 'دهم',
        2 => 'صدم',
        3 => 'هزارم',
        4 => 'ده هزارم',
        5 => 'صد هزارم',
        6 => 'میلیونیم',
        7 => 'ده میلیونیم',
        8 => 'صد میلیونیم',
        9 => 'میلیاردیم',
        10 => 'ده میلیاردیم',
        11 => 'صد میلیاردیم',
        12 => 'بیلیونیم',
        13 => 'ده بیلیونیم',
        14 => 'صد بیلیونیم',
        15 => 'بیلیاردیم',
        16 => 'ده بیلیاردیم',
        17 => 'صد بیلیاردیم',
        18 => 'تریلیونیم',
        19 => 'ده تریلیونیم',
        20 => 'صد تریلیونیم',
        21 => 'تریلیاردیم',
        22 => 'ده تریلیاردیم',
        23 => 'صد تریلیاردیم',
    ];

    public static function convert($number)
    {
        if (!is_numeric($number)) {
            throw new Exception("Input it's not a number.");
        }

        $number = strval($number);
        if ($number < 0) {
            $words = self::NEGATIVE.' ';
            $number = ltrim($number, '-');
        } else {
            $words = '';
        }

        if (strpos($number, '.')) {
            $floatPart = substr($number, strpos($number, '.') + 1);
            $integerPart = substr($number, 0, -strlen('.'.$floatPart));
        } else {
            $floatPart = 0;
            $integerPart = $number;
        }

        $words .= self::numberToWords($integerPart);
        if ($floatPart > 0) {
            $words .= ' '.self::POINT.' '.self::numberToWords($floatPart).' '.self::$negativePowersOfTen[strlen($floatPart)];
        }

        return $words;
	}

    private static function numberToWords($number)
    {
        if ($number >= 1000000000000000000000000 || $number < 0) {
            throw new Exception("Input number is not supported.");
        }

        $words = '';

        $splittedNumbers = str_split(strrev($number), 3);
        foreach ($splittedNumbers as &$splittedNumber) {
            $splittedNumber = strrev($splittedNumber);
        }
        $splittedNumbers = array_reverse($splittedNumbers, true);

        foreach ($splittedNumbers as $sectionNumber => $splittedNumber) {
            $words .= self::convertThreeDigitsNumber($splittedNumber);
            if ($sectionNumber >= 1) {
                $words .= ' '.self::$powersOfTen[$sectionNumber];
            }

            $number -= intval($splittedNumber) * pow(10, 3 * $sectionNumber);

            if ($number == 0) {
                break;
            } else {
                $words .= ' '.self::SPLITTER.' ';
            }
        }

        return $words;
    }

    private static function convertThreeDigitsNumber($number)
    {
        $number = intval($number);

        if ($number >= 1000) {
            throw new Exception("Input number is not supported.");
        }

        $words = '';

        if ($number >= 100) {
            $temp = intval($number / 100);
            $words .= self::$hundreds[$temp];
            $number -= $temp * 100;

            if ($number > 0) {
                $words .= ' '.self::SPLITTER.' ';
                $words .= self::convertThreeDigitsNumber($number);
            }
        } elseif ($number >= 20) {
            $temp = intval($number / 10);
            $words .= self::$tens[$temp];
            $number -= $temp * 10;

            if ($number > 0) {
                $words .= ' '.self::SPLITTER.' ';
                $words .= self::convertThreeDigitsNumber($number);
            }
        } elseif ($number >= 10) {
            $words .= self::$tenToNineteen[$number - 10];
        } else {
            $words .= self::$ones[$number];
        }

        return $words;
    }
}
