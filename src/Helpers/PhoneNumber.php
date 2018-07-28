<?php

namespace Dena\IranLaravel\Helpers;

class PhoneNumber
{
    public static function IranMobileValidation($phone)
    {
		$mobile_codes =	[
			'910',	'911',	'912',	'913',	'914',	'915',	'916',	'916',	'918',
			'919',	'990',	'930',	'933',	'935',	'936',	'936',	'938',	'939',
			'901',	'902',	'903',	'920',	'921',	'931',	'932',	'934',
		];

		$phone	= trim($phone);
		$non_digits = ['‌', '-', '(', ')'];
		$phone	= str_replace($non_digits, '', $phone);
		$phone	= preg_replace('!\s+!', '', $phone);

		if (substr($phone, 0, 6) == '009809') {
			$phone	= '9'.substr($phone, 6);
		} elseif (substr($phone, 0, 5) == '00989') {
			$phone	= '9'.substr($phone, 5);
		} elseif (substr($phone, 0, 5) == '+9809') {
			$phone	= '9'.substr($phone, 5);
		} elseif (substr($phone, 0, 4) == '+989') {
			$phone	= '9'.substr($phone, 4);
		} elseif (substr($phone, 0, 4) == '9809') {
			$phone	= '9'.substr($phone, 4);
		} elseif (substr($phone, 0, 3) == '989') {
			$phone	= '9'.substr($phone, 3);
		} elseif (substr($phone, 0, 2) == '09') {
			$phone	= '9'.substr($phone, 2);
		} else {
			return false;
		}

		if (!in_array(substr($phone, 0, 3), $mobile_codes)) {
			return false;
		}

		return "+98$phone";
	}
}