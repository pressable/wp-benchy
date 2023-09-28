<?php

namespace Pressable\WP_Benchy;

class Utils {

    public static function convert_nanoseconds( $val, $to, $precision = 5 ) {
        switch ($to) {
            case 's':
                $converted = $val / 1000000000;
                break;
            case 'ms':
                $converted = $val / 1000000;
                break;
            default:
                return null;
        }
        
        $converted = round( $converted, $precision );

        return $converted;
    }
}