<?php

namespace Phpbergen;

class Member
{

    public function createMember(
      $firstName,
      $middleName,
      $lastName,
      $email,
    ): void {
        if (!is_string($firstName)) {
            throw new \InvalidArgumentException('First name must a string');
      }
        if (strlen($firstName) < 3) {
            return;
        }

        $fullName = "$firstName $middleName $lastName";
        $database = new Sqlite();
        $statement = $database->db_connection->prepare(
          "INSERT INTO customer('name', 'email') 
                    VALUES 
                        (:name, :email)"
        );
        $statement->execute([
          'name' => $fullName,
          'email' => $email,
        ]);
    }

    public function newestMember(): string
    {
        $instance = DbInstance::getInstance();
        $connection = $instance->getConnection();
        $sql = $connection->prepare("SELECT * FROM 'customer' WHERE id = :id");
        $sql->execute(['id' => $this->newestMemberId()]);
        $result = $sql->fetchAll();
        ['id' => $id, 'name' => $name, 'email' => $email] = $result[0];
        return "$id, $name, $email";
    }

    public function newestMemberId(): int
    {
        $database = new Sqlite();
        $statement = $database->db_connection->query(
          "select seq from sqlite_sequence where name='customer'"
        );
        $result = $statement->fetchAll();
        if ($result) {
            return $result[0]['seq'];
        }

        return 0;
    }

}
