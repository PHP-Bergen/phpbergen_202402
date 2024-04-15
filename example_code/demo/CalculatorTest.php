<?php

use PHPUnit\Framework\TestCase;

include_once __DIR__ . '/Calculator.php';

class CalculatorTest extends TestCase
{

    public function testAddition(): void
    {
        self::assertSame(
          5,
          \Calculator::add(2, 3),
          'Failed addition',
        );
        self::assertSame(-10, Calculator::add(-5, -5));
    }

    public function testLogic(): void
    {
        self::assertTrue(Calculator::isStringLong('phpBergen'));
        self::assertFalse(Calculator::isStringLong('php'));
    }
}
