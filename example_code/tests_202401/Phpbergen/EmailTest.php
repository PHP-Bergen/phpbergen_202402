<?php

declare(strict_types=1);

namespace Phpbergen;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Phpbergen\Email
 */
class EmailTest extends TestCase
{
    private string $invalidEmail;
    private string $validEmail;

    public function setUp(): void
    {
        $this->validEmail = 'steinmb@phpbergen.no';
        $this->invalidEmail = 'Invalid@';
    }

    public function testCanBeCreatedFromValidEmail(): void
    {
        $email = Email::fromString($this->validEmail);
        $this->assertSame('steinmb@phpbergen.no', $email->asString());
    }

    public function testCannotBeCreatedFromInvalidEmail(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Email::fromString($this->invalidEmail);
    }
}
