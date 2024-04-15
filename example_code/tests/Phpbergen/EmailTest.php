<?php

namespace Phpbergen;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Email::class)]
class EmailTest extends TestCase
{
    public function testValidEmailWorks(): void
    {
        $valid_email = 'steinmb@phpbergen.no';
        $email = Email::fromString($valid_email);
        self::assertSame(
          $valid_email,
          $email->asString(),
        );
    }
}
