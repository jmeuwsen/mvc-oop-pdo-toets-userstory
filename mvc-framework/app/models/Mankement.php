<?php

class Mankement
{
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCountries()
    {
        $this->db->query('SELECT * FROM Mankement');
        $result = $this->db->resultSet();
        return $result;
    }
}