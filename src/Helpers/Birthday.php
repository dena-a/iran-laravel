<?php

namespace Dena\IranLaravel\Helpers;

use jDateTime;
use Carbon\Carbon;

class Birthday
{
    public static function JalaliBirthdayValidation($birthday)
    {
		$birthday	= trim($birthday);
        $birthday	= preg_replace('!\s+!', '', $birthday);
        
		if (!preg_match('/^([0-9]{2})?([0-9]{2})[\/\-][0-9]{1,2}[\/\-][0-9]{1,2}$/', $birthday, $birthday)) {
			return false;
        }
        $birthday       = $birthday[0];
        $birthday	    = str_replace('/', '-', $birthday);
        $birthday       = explode('-', $birthday);
        $birthday[0]    = (strlen($birthday[0]) == 2) ? substr(jDate::forge(Carbon::now()->timestamp), 0, 2).$birthday[0] : $birthday[0] ;
        $birthday[1]    = (strlen($birthday[1]) == 1) ? "0$birthday[1]" : $birthday[1] ;
        $birthday[2]    = (strlen($birthday[2]) == 1) ? "0$birthday[2]" : $birthday[2] ;

        if (jDateTime::checkDate($birthday[0], $birthday[1], $birthday[2], false)) {
            return false;
        }

        $birthday	= implode('-', $birthday);
		
		return $birthday;
	}
}