<?php
require_once '../init.php';

use App\Model\Inscription;
use App\Utilities\Chaine;
use App\Model\Mail;

$message;
if ($_POST) {

    extract($_POST);
    /**
     * securiser les donne
     */
    $typeUser = Chaine::secureData($typeUser);
    $nom = Chaine::secureData($nom);
    $prenom = Chaine::secureData($prenom);
    $adressePers = Chaine::secureData($adressePers);
    $adresseClinic = Chaine::secureData($adresseClinic);
    $email = Chaine::secureData($email);
    $speciality = Chaine::secureData($speciality);
    $password = Chaine::secureData($password);
    $Cpassword = Chaine::secureData($Cpassword);
    $pitch = Chaine::secureData($pitch);
    $tel = Chaine::secureData($tel);

    if (!empty($typeUser) and $typeUser == 'Medecin') {
        if (empty($nom) or empty($prenom) or empty($adressePers) or empty($adresseClinic) or empty($email) or empty($speciality) or empty($password) or empty($Cpassword) or empty($pitch) or  empty($tel)) {
            $message = 'Veuillez bien remplir les champs correspondant';
        } else if (strlen($adressePers) < 10) {
            $message = "Votre Adresse Personnel Incorrect";
        } else if (strlen($adresseClinic) < 10) {
            $message = 'L\'adresse de votre clinic est Incorrect';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = 'Email Invalide';
        } else if (Inscription::verifyEmail($email) === false) {
            $message = 'Email Existant';
        } else if (strlen($tel) < 8) {
            $message = 'Le numero doit contenir 8 caracter';
        } else if (strlen($tel) > 8) {
            $message = 'Le numero doit contenir 8 caracter';
        } else if (Inscription::verifyNumber($tel) === false) {
            $message = 'Telephone Existant';
        } else if (strlen($password) > 8 or strlen($Cpassword) < 8) {
            $message = 'Le mot de passe doit contenir 8 caracter';
        } else if ($password !== $Cpassword) {
            $message = 'Mot de passe non identique';
        } else {

            if (Mail::sendMailValidate($email, $nom, $prenom) === true) {
                $message = 'Succes';
                $object = new Inscription(null, $nom, $prenom, $typeUser, $adressePers, $adresseClinic, $email, $speciality, '+509' . $tel, password_hash($password, PASSWORD_BCRYPT), $pitch);
                $object->register();
                
            } else {
                $message = 'Echec';
            };
        }
    } else {
        if (empty($nom) or empty($prenom) or empty($adressePers)  or empty($email) or empty($password) or empty($Cpassword) or empty($pitch) or  empty($tel)) {
            $message = "Veuillez bien remplir les champs correspondant";
        } else if (strlen($adressePers) < 10) {
            $message = "Votre Adresse Personnel Incorrect";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = 'Email Invalide';
        } else if (Inscription::verifyEmail($email) === false) {
            $message = 'Email Existant';
        } else if (strlen($tel) < 8) {
            $message = 'Le numero doit contenir 8 caracter';
        } else if (strlen($tel) > 8) {
            $message = 'Le numero doit contenir 8 caracter';
        } else if (Inscription::verifyNumber($tel) === false) {
            $message = 'Telephone Existant';
        } else if (strlen($password) > 8 or strlen($Cpassword) < 8) {
            $message = 'Le mot de passe doit contenir 8 caracter';
        } else if ($password !== $Cpassword) {
            $message = 'Mot de passe non identique';
        } else {
            if (Mail::sendMailValidate($email, $nom, $prenom) === true) {
                $message = 'Succes';
                $object = new Inscription(null, $nom, $prenom, $typeUser, $adressePers, $adresseClinic, $email, $speciality, '+509' . $tel, password_hash($password, PASSWORD_BCRYPT), $pitch);
                $object->register();
                
            } else {
                $message = 'Echec';
            };
        }
    }
}
echo json_encode($message);
