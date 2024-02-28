<?php

declare(strict_types=1);

namespace Phpbergen;

use InvalidArgumentException;

readonly class Name
{
    public string $firstName;
    public string $lastName;

    public function __construct(
        string $firstName,
        public string $middleName,
        string $lastName,
    ) {
        if (!trim($firstName)) {
            throw new InvalidArgumentException('First name cannot be empty');
        }
        $this->firstName = trim($firstName);

        if (!trim($lastName)) {
            throw new InvalidArgumentException('Last name cannot be empty');
        }
        $this->lastName = trim($lastName);
    }

    public function __toString(): string
    {
        if (!$this->middleName) {
            return "$this->firstName $this->lastName";
        }

        return "$this->firstName $this->middleName $this->lastName";
    }

    public function getName(): string
    {
        if (!$this->middleName) {
            return "$this->firstName $this->lastName";
        }

        return "$this->firstName $this->middleName $this->lastName";
    }
}
