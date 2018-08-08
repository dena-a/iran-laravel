<?php

namespace Dena\IranLaravel\Helpers;

class PhoneNumber
{
    public static function IranMobileValidation($phone)
    {
		$phone	= trim($phone);
		$non_digits = ['‌', '-', '(', ')'];
		$phone	= str_replace($non_digits, '', $phone);

		$phone	= preg_replace('!\s+!', '', $phone);
		if (!preg_match('/^(\+989|00989|989|09|9)([0-9]{9})$/', $phone, $phone)) {
			return false;
		}
		$phone = $phone[0];

		$phone	= preg_replace('/^(\+989|00989|989|09|9)/', '+989', $phone);
		
		return $phone;
	}
}