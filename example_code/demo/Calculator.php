<?php

class Calculator
{

    public static function add(int $a, int $b): int
    {
        return $a + $b;
    }

    public static function isStringLong(string $string): bool
    {
        return strlen($string) > 5;
    }
}
