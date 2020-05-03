<?php
require_once '../init.php';
use App\Model\Friend;
if(!empty($_GET['myId']) AND !empty($_GET['id_user'])){
    echo 'Good';
}