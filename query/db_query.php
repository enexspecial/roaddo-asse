<?php

class DB{

    protected $hostname = 'localhost';
    protected $username = "root";
    protected $password = "";
    protected $dbName = "roaddo_asse";
    
    /**
     * Initialize the database;
     */
    public function __construct() 
    {
        try{
            $conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbName", $this->username, $this->password);

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connection Established";

        }catch(PDOException $err){
            echo "Error established as a result of ". $err->getMessage();            
        }

    }


    public function insert(string $table, array $params)
    {

    }

    public function readResult(string $table, array $param)
    {

    }
}