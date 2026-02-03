<?php

namespace App\Helpers;

class Base62
{
protected static string $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    public static function encode(int $number): string
    {
        if ($number === 0) {
            return self::$chars[0];
        }

        $base = strlen(self::$chars);
        $result = '';

        while ($number > 0) {
            $result = self::$chars[$number % $base] . $result;
            $number = intdiv($number, $base);
        }

        return $result;
    }
}
