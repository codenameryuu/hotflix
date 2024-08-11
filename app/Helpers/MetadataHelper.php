<?php

namespace App\Helpers;

class MetadataHelper
{
    /**
     ** Metadata.
     *
     * @return object
     */
    public static function metadata()
    {
        $result = (object) [
            'title' => 'Hotflix',
            'description' => '',
            'keywords' => '',
        ];

        return $result;
    }
}
