<?php

namespace Phpbergen;

class Member
{

    public function createMember(
      Name $name,
      Email $email,
    ): void {
        $database = new Sqlite();
        $statement = $database->db_connection->prepare(
          "INSERT INTO customer('name', 'email') 
                    VALUES 
                        (:name, :email)"
        );
        $statement->execute([
          'name' => $name->getName(),
          'email' => $email->asString(),
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
