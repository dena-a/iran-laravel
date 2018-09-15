<?php

namespace Dena\IranLaravel\Helpers;

class ToPersian
{
    public static function fromEnglish($str)
    {
		$english	= ['0','1','2','3','4','5','6','7','8','9'];
		$persian	= ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
		return str_replace($english, $persian, $str);
	}

    public static function fromArabic($str)
    {
		$arabic		= ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩','ي','ك'];
		$persian	= ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹','ی','ک'];
		return str_replace($arabic, $persian, $str);
	}
}