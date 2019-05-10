<?php

namespace Dena\IranLaravel\Helpers;

class NationalIdentityCode
{
    public static function IranNationalIdentityCodeValidation($code)
    {
		$code	= trim($code);
		$code	= str_replace(['‌', '-'], '', $code);
        $code	= preg_replace('!\s+!', '', $code);
                
        if (!preg_match('/^[0-9]{10}$/', $code) || strlen($code) !== 10) {
            return false;
        }
        
        $code_array = str_split($code);
        $control = $code_array[9];
        
        $sum = 0;
        for ($i=2; $i <= 10; $i++) { 
            $sum += $code_array[10-$i] * $i;
        }
        $mod = $sum % 11;

        if (($mod < 2 && $mod != $control) || ($mod >= 2 && $control != 11 - $mod)) {
            return false;
        }
		
		return $code;
	}
}