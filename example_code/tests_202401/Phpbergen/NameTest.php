<?php

declare(strict_types=1);

namespace Phpbergen;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Phpbergen\Name
 */
class NameTest extends TestCase
{
    public function testName(): void
    {
        $person = new Name('Ola', '', 'Normann');
        $this->assertSame('Ola Normann', (string) $person);
        $this->assertSame('Ola Normann', $person->getName());
        self::assertSame('Ola Terje Normann', (new Name('Ola', 'Terje', 'Normann'))->getName());
    }

    public function testWhitespace(): void
    {
        self::assertSame('Ola Terje Normann', (new Name('Ola', 'Terje', 'Normann '))->getName());
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('First name cannot be empty');
        self::assertSame('Ola Terje Normann', (new Name(' ', ' ', ' '))->getName());
    }

    public function testInvalidFirstName(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Name('', 'Kari', 'Normann');
    }

    public function testInvalidLastName(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Name('Ola', '', '');
    }
}
