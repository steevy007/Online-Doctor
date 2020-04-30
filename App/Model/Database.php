<?php
namespace App\Model;
class Connect
{
    private $USERNAME = "root";
    private $PASSWORD = "";
    private  $conn;
    private static $insDB;

    public function __construct(){
        try{
            $this->conn=new \PDO("mysql:host=localhost;dbname=onlinedoctor", $this->USERNAME, $this->PASSWORD);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $e){
           
        }
    }


    /**
     * Get the value of conn
     */ 
    public function getConn()
    {
        return $this->conn;
    }
}

