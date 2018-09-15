<?php

namespace Dena\IranLaravel\Helpers;

class Slug
{
    public static function persian($text)
    {
        // trim
        $text = trim($text);

        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // trim -
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return null;
        }

        return $text;
	}
}