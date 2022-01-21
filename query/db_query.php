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


    /**
     * @var
     */


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

 

    public function view(string $table, array $param, $where=null, int $limit=0, string $order='', $all = '*')
    {
        try{
            $field = implode(",",array_keys($param));
            $value = implode("','",array_values($param));

            if($where != null || $limit > 0 || $order !== "" && count($param) > 0 ){
                $sql = "SELECT ".$all." FROM ".$table." WHERE ".$field." = '".$value."' ORDER BY ".$order." LIMIT ".$limit;
            }else{
                $sql = "SELECT ".$all." FROM ".$table;
            }

           
            
            $stmt = $this->mySql->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);          
            return $stmt->fetchAll();
        }catch(PDOException $err){
            return $err->getMessage();
        }

    }


    public function update(string $table, array $params, int $id)
    {
        try{
            $field = array_keys($params);
            $value = array_values($params);

            $sql = "UPDATE ".$table."SET ".$field."=".$value."WHERE id =".$id;
            $stmt = $this->mySql->prepare($sql);
            return $stmt->execute();

        }catch(PDOException $err){
            return $err->getMessage();
        }

    }

    public function delete(string $table, int $id)
    {
        try{

            $sql = "DELETE FROM ".$table." WHERE id=".$id;
            return $this->mySql->exec($sql);

        }catch(PDOException $err){
            return $err->getMessage();
        }
    }

    
}