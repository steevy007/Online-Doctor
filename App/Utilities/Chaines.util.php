<?php
namespace App\Utilities;
class Chaine{
    public static function secureData($chaine){
        htmlspecialchars($chaine);
        if(!empty($chaine)){
            return trim($chaine);
        }
    }
}