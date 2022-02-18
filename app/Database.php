<?php 

namespace App;

use PDO;
use PDOException;
use PDOStatement;

class Database {
    const HOST = 'localhost';
    const NAME = 'finances_controller';
    const USER = 'root';
    const PASSWORD = 'root';

    private PDO $connection;

    public function __construct($table = null)
    {
        $this->setConnection();
    }

    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname='. self::NAME, self::USER, self::PASSWORD);
            // Lançando exceção quando dar erro no banco
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            die("Error: {$ex->getMessage()}");
        }
    }

    private function setParametros(PDOStatement $queryPreparada, $chaveQuery, $valorChave)
    {
        // $query->bindParam(":email", $email);
        $queryPreparada->bindParam($chaveQuery, $valorChave);
    }

    private function montarQuery(PDOStatement $queryPreparada, array $params)
    {
        foreach($params as $key => $value) {
            $this->setParametros($queryPreparada, $key, $value);
        }
    }

    /**
     * Usar
     * $conn = new Database();
     *   $result = $conn->executeQuery('SELECT * FROM users WHERE id = :ID LIMIT 1', array(
     *       ':ID' => $id
     *   ));

     * return $result->fetchAll(PDO::FETCH_ASSOC);
     */

    public function executeQuery(string $query, array $params = [])
    {
        $stmt = $this->connection->prepare($query);
        $this->montarQuery($stmt, $params);
        $stmt->execute();
        return $stmt;
    }

    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }

    public function findyByEmail($table, $email) 
    {
        $query = "SELECT * FROM {$table} WHERE email = :email LIMIT 1";
        $execut = $this->executeQuery($query, [':email' => $email]);
        if($execut->rowCount() > 0) {
            $obj = $execut->fetchAll(PDO::FETCH_CLASS, self::class);
            return $obj;
        } 
        return false;
    }
}