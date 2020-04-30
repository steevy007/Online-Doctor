<?php
session_start();
require_once ('../init.php');
use App\Model\Status;
use App\Utilities\Chaine;
$message='';

if($_POST){
    extract($_POST);
    $text=Chaine::secureData($text);
    if(empty($text)){
        $message='Entrer Le Text a poster';
    }else if(strlen($text)>150){
        $message='VAu plus 150 caracteres';
    }else if(strlen($text)<10){
        $message='Au moins 10 caracteres';
    }else{
        if(empty($message)){
            $objet=new Status(null,$_SESSION['session']['id'],$text);
            if($objet->postStatus()){
                $message='Succes';
            }
        }
    }
}
echo json_encode($message);