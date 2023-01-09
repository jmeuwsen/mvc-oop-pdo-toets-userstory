<?php

class Database
{
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;
    private $dbHandler;

    public function __construct()
    {
        $conn = "mysql:host=$this->dbHost;dbname=$this->dbName";

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        
        $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);

        try{
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch(PDOException $e){
            echo "er is een probleem met de DB";
        }
    }

    public function query($sql)
    {
        $this->dbHandler->prepare($sql);
    }

    public function bind($parameter, $value, $type=null)
    {
        switch(is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;

        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    public function execute()
    {
        return $this->statement->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }
}