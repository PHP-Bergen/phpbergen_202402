<?php

require_once __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/Calculator.php';

class CalculatorTest extends \PHPUnit\Framework\TestCase
{
    public function testAdditionIsWorking(): void
    {
        self::assertSame(
          6,
          \Calculator::add(3, 3),
        );
        self::assertSame(6, \Calculator::add(3, 3),
        );
    }
}
