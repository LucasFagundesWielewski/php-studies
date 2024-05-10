<?php

class Sql {
	
    private $conn;

    public function __construct() {

        try {

            $this->conn = new PDO("mysql:host=127.0.0.1:3312;dbname=dbphp7", "root", "");

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {

            die("Connection failed: " . $e->getMessage());
        }
    }

    private function setParams($statement, $parameters = array()) {

        foreach ($parameters as $key => &$value) {

            $statement->bindParam($key, $value);

        }
    }

    public function query(string $rawQuery, $params = array()) {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }

    public function select($rawQuery, $params = array()): array {

        $stmt = $this->query($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
