<?php
session_start();
require_once '../init.php';
use App\Model\Authentification;
if(isset($_SESSION['session'])){
    Authentification::logout();
    header("Location:".$_SERVER['HTTP_REFERER']);
}
