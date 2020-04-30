<?php
require_once '../init.php';

use App\Utilities\Chaine;
use App\Model\User;

$message = '';
if ($_POST) {
    extract($_POST);
    //$typeUser=Chaine::secureData($typeUser);
    $nom = Chaine::secureData($nom);
    $prenom = Chaine::secureData($prenom);
    $adressePers = Chaine::secureData($adressePers);
    $adresseClinic = Chaine::secureData($adresseClinic);
    $speciality = Chaine::secureData($speciality);
    $password = Chaine::secureData($password);
    $Cpassword = Chaine::secureData($Cpassword);
    $pitch = Chaine::secureData($pitch);
    $tel = Chaine::secureData($tel);
    $AncP = Chaine::secureData($AncP);
    $id = Chaine::secureData($id);

    if (!empty($typeUser) and $typeUser == 'Medecin') {
        if (empty($nom) or empty($prenom) or empty($adressePers) or empty($adresseClinic) or empty($speciality) or empty($pitch) or  empty($tel)) {
            $message = 'Veuillez bien remplir les champs correspondant';
        } else if (strlen($adressePers) < 10) {
            $message = "Votre Adresse Personnel Incorrect";
        } else if (strlen($adresseClinic) < 10) {
            $message = 'L\'adresse de votre clinic est Incorrect';
        } else if (strlen($tel) < 8) {
            $message = 'Le numero doit contenir 8 caracter';
        } else if (strlen($tel) > 8) {
            $message = 'Le numero doit contenir 8 caracter';
        } else if (User::verifyNumber($tel) === false) {
            $message = 'Telephone Existant';
        } else if (empty($message)) {
            if (!empty($AncP)) {
                if (!empty($password) and !empty($Cpassword)) {
                    if (User::verifyPassword($id, $AncP)) {
                        if (strlen($password) > 8 or strlen($Cpassword) < 8) {
                            $message = 'Le mot de passe doit contenir 8 caracter';
                        } else if ($password !== $Cpassword) {
                            $message = 'Mot de passe non identique';
                        } else {
                            User::editPassword($id,password_hash($password,PASSWORD_BCRYPT));
                            $message = 'Succes';
                        }
                    } else {
                        $message = "Ancien Mot de passe Invalide";
                    }
                } else {
                    $message = "Veuillez Saisir les infos concernant la modification du password";
                }
            }

            if (empty($message)) {
                $objet = new User("", $nom, $prenom, "", $adressePers, $adresseClinic, "", $speciality, '+509' . $tel, "", $pitch);
                $objet->editUser($id);
                $message = 'Succes';
            }
        }
    } else {
        if (empty($nom) or empty($prenom) or empty($adressePers) or empty($pitch) or  empty($tel)) {
            $message = 'Veuillez bien remplir les champs correspondant';
        } else if (strlen($adressePers) < 10) {
            $message = "Votre Adresse Personnel Incorrect";
        } else if (strlen($tel) < 8) {
            $message = 'Le numero doit contenir 8 caracter';
        } else if (strlen($tel) > 8) {
            $message = 'Le numero doit contenir 8 caracter';
        } else if (User::verifyNumber($tel) === false) {
            $message = 'Telephone Existant';
        } else if (empty($message)) {
            if (!empty($AncP)) {
                if (!empty($password) and !empty($Cpassword)) {
                    if (User::verifyPassword($id, $AncP)) {
                        if (strlen($password) > 8 or strlen($Cpassword) < 8) {
                            $message = 'Le mot de passe doit contenir 8 caracter';
                        } else if ($password !== $Cpassword) {
                            $message = 'Mot de passe non identique';
                        } else {
                            User::editPassword($id,password_hash($password,PASSWORD_BCRYPT));
                            $message = 'Succes';
                        }
                    } else {
                        $message = "Ancien Mot de passe Invalide";
                    }
                } else {
                    $message = "Veuillez Saisir les infos concernant la modification du password";
                }
            }

            if (empty($message)) {
                $objet = new User("", $nom, $prenom, "", $adressePers, "", "", "", '+509' . $tel, "", $pitch);
                $objet->editUser($id);
                $message = 'Succes';
            }
        }
}
}
echo json_encode($message);
