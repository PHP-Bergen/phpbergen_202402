<?php

declare(strict_types=1);

namespace Phpbergen;

use PDO;

final class Sqlite
{

    public PDO $db_connection;

    public function __construct()
    {
        $this->db_connection = new PDO('sqlite:' . SQLITE);
    }

    public function init(): void
    {
        $schema =<<<SQL
            CREATE TABLE `customer` (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name VARCHAR(256) NOT NULL,
                email VARCHAR(256) NOT NULL
            );
        SQL;

        if (!$this->tableExists('customer')) {
            $this->db_connection->query($schema);
        }
    }

    private function tableExists(string $table): bool
    {
        $result = false;
        $statement = $this->db_connection->prepare("SELECT name FROM sqlite_master WHERE type = 'table' AND name = :table");

        if ($statement) {
            $statement->execute(['table' => $table]);
            $result = $statement->fetchAll();
        }

        if (!$result) {
            return false;
        }

        return true;
    }

}
