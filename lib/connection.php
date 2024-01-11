<?php

class DbConnect {
    private string $host;
    private string $port;
    private string $db;
    private string $user;
    private string $pwd;
    private string $dsn;

    /**
     * @var PDO 
     */
    private PDO $conn;

    public function __construct()
    {
        $this->host = getenv('MYSQL_HOST');
        $this->port = getenv('MYSQL_PASSWORD');
        $this->db   = getenv('MYSQL_DATABASE');
        $this->user = getenv('MYSQL_USER');
        $this->pwd  = getenv('MYSQL_PASSWORD');

        $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;

        $this->conn = $this->setConnection();
    }

    /**
     * Get new connection
     * 
     * @return PDO | PDOException
     */
    private function setConnection(): PDO
    {
        try {
            $conn = new PDO($this->dsn, $this->user, $this->pwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }

        return $conn;
    }

  
    public function getConnection(): PDO
    {
        try {
            return $this->conn;
        } catch(PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }
}


// $db = new DbConnect();
// $sql = 'SELECT now()';
// $rs = $db->getConnection()->query($sql);
// $rows = $rs->fetchAll(PDO::FETCH_ASSOC);

// var_dump($rows);