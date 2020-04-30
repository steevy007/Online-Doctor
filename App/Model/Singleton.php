<?php
namespace App\Model;
use App\Model\Connect;
class Singleton
{
   protected static $insDB = null;

    private function __construct()
    {
    }

    public static function getInsDB()
    {
        if (static::$insDB == null) {
            static::$insDB=new  Connect();
        }
        return static::$insDB;
    }
}


