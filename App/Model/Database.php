<?php
namespace App\Model;
class Connect
{
    private $USERNAME = "id13509939_steevy";
    private $PASSWORD = "P^>(aZg9#24b4(i_";
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

