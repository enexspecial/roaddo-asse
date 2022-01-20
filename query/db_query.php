<?php

class DB{

    protected $hostname = 'localhost';
    protected $username = "root";
    protected $password = "";
    protected $dbName = "roaddo_asse";
    protected $mySql;
    
    /**
     * Initialize the database;
     */
    public function __construct() 
    {
        try{
            $this->mySql = new PDO("mysql:host=$this->hostname;dbname=$this->dbName", $this->username, $this->password);

            // set the PDO error mode to exception
            $this->mySql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connection Established";

        }catch(PDOException $err){
            echo "Error established as a result of ". $err->getMessage();            
        }

    }


    public function insert(string $table, array $params)
    {
        try{            
            // table columns;
            $columns = implode(', ', array_keys($params));
            // values for insertion          
            $values = implode(" ',' ", array_values($params));
            // query for insert
            $sql = "INSERT INTO ".$table." (".$columns.")"." VALUES ( '".$values."' )";  
            
           return $this->mySql->exec($sql);

        }catch(PDOException $err){
            return $err->getMessage();
        }
   
        
    }

    public function readResult(string $table, array $param)
    {

    }
}