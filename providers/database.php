<?php

class DataBase {

    private $url;
    private $dbname;
    private $username;
    private $password;
    private $port;

    function __construct($url, $dbname, $username, $password = '', $port = 3306) {
        $this->url = $url;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;
    }

    function connect() {
        try {
            $pdo = new PDO("mysql:dbname={$this->dbname};host={$this->url};port={$this->port};charset=UTF8", $this->username, $this->password);
            return $pdo;
        } catch(PDOException $e) {
            echo $e;
            return NULL;
        }
    }

}

?>