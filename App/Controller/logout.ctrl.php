<?php
session_start();
require_once '../init.php';
use App\Model\Authentification;
if(isset($_SESSION['session'])){
    Authentification::logout();
    header("Location:https://online-doctorapp.000webhostapp.com/Pages/Home.php");
}
