<?php
require_once '../init.php';

use App\Model\Authentification;
use App\Utilities\Chaine;
$message;
if (isset($_POST)) {
    extract($_POST);
    $email = chaine::secureData($email);
    $password = chaine::secureData($password);
    if (empty($email) and empty($password)) {
        $message = 'Veuillez Remplir tout les champs';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Email Incorrect';
    } else {
        $obj = new Authentification($email,$password);
        $obj->Authentifier();
        if(Authentification::$Message!=''){
            $message=Authentification::$Message;
        }else{
            
            $message='success';
        }
    }
}
echo json_encode($message);
/*

echo ;*/
