<?php

declare(strict_types=1);


namespace Phpbergen;

use InvalidArgumentException;

/**
 * @covers \Phpbergen\Email
 */
readonly class Email
{
    private string $email;

    private function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf('"%s" is not a valid email address', $email)
            );
        }

        $this->email = $email;
    }

    public static function fromString(string $email): self
    {
        return new self($email);
    }

    public function asString(): string
    {
        return $this->email;
    }
}
