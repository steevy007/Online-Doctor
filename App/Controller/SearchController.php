<?php
if(isset($_GET['query_search']) AND !empty($_GET['query_search'])){
    //echo $_GET['query_search'];
}else{
    header('Location:https://online-doctorapp.000webhostapp.com/Pages/Utilisateurs');
}