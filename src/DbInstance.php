<?php

declare(strict_types=1);

namespace Phpbergen;

/**
 * PhpBergen using singleton pattern.
 */
use PDO;

final class DbInstance
{

    private static ?DbInstance $instance = null;
    private PDO $connection;

    private function __construct()
    {
        $this->connection = new PDO('sqlite:' . SQLITE);
    }

    public static function getInstance(): DbInstance
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }

}
