<?php

namespace App\Model;

class AuthFilter
{
    public static function mustConnect()
    {
        if (!isset($_SESSION['session'])) {
            header('Location:https://online-doctorapp.000webhostapp.com/Pages/Login.php');
        }
    }

    public static function alreadyConnect()
    {
        if (isset($_SESSION['session']) and !empty($_SESSION['session'])) {
            header('Location:https://online-doctorapp.000webhostapp.com/Pages/Home.php');
        }
    }

    public static function mustBeAdmin($id_user)
    {
        if (isset($_SESSION['session']) and !empty($_SESSION['session'])) {
            if ($id_user != $_SESSION['session']['id']) {
                header("Location:https://online-doctorapp.000webhostapp.com/Pages/Profile.php?id=$_SESSION[session][id]");
            }
        }
    }
}
