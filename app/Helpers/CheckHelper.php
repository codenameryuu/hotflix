<?php

namespace App\Helpers;

class CheckHelper
{
    /**
     ** Isset.
     *
     * @param $value
     * @return bool
     */
    public static function isset($value)
    {
        if (!isset($value)) {
            return false;
        }

        if (!$value) {
            return false;
        }

        return true;
    }

    /**
     ** Isset string.
     *
     * @param $value
     * @return bool
     */
    public static function issetString($value)
    {
        if (!isset($value)) {
            return false;
        }

        if (!$value) {
            return false;
        }

        if ($value == '') {
            return false;
        }

        return true;
    }

    /**
     ** Isset array.
     *
     * @param $array
     * @param $key
     * @return bool
     */
    public static function issetArray($array, $key)
    {
        if (!array_key_exists($key, $array)) {
            return false;
        }

        if (!isset($array[$key])) {
            return false;
        }

        if (!$array[$key]) {
            return false;
        }

        return true;
    }
}
