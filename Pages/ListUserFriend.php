<?php
session_start();
require_once '../App/init.php';

use App\Model\AuthFilter;

AuthFilter::mustConnect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Doctor | User Friend</title>
    <?php require_once __DIR__ . '/../Ressources/head.css.php' ?>
    <link rel="stylesheet" href="../Public/CSS/styleP.css">
    <link rel="stylesheet" href="../Public/CSS/styleRequest.css">
    <style>
        .member-box {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            max-width: 300px;
            margin: 20px auto;
            font-family: 'Raleway', sans-serif;
        }

        .member-box .shape {
            width: 200px;
            height: 200px;
            background: var(--primary);
            opacity: 0.2;
            position: absolute;
            top: 0;
            right: -100px;
            transform: rotate(45deg);
        }

        .member-box .card-img-top {
            position: relative;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            margin: 20px auto;
            text-align: center;
            box-shadow: 0px 0px 0px 8px rgba(0, 0, 0, 0.06);
            transition: box-shadow 0.3s ease;
        }

        .member-box:hover .card-img-top {
            box-shadow: 0px 0px 0px 12px rgba(0, 0, 0, 0.1)
        }

        .member-box .member-degignation {
            color: var(--green);
        }

        .member-box .member-title {}

        .member-box small {
            font-size: 12px;
        }

        .member-box .social a {
            font-size: 15px;
            color: var(--green);
            padding: 5px;
        }

        .member-box .card-footer {
            background-color: transparent;
            border: 0;
        }
    </style>
</head>

<body>
    <?php require_once __DIR__ . '/../Partials/enTete.php' ?>

    <div class="work-1">
        <h1 class="text-2">Friend User</h1>
    </div>

    <div class="container   ">
        <div class="row">
            <div class="col-md-4">
                <div class="card member-box shadow-lg">
                    <span class="shape"></span>
                    <img class="card-img-top" src="https://placeimg.com/640/480/arch/any" alt="">
                    <div class="card-body">
                        <span class="member-degignation">Secretary</span>
                        <h4 class="member-title">Hashim Ahmed</h4>
                        <strong><i class="fas fa-at" style="color:black"></i>&nbsp;</strong><a href="mailto:secretary@basis.org.bd" class="text-dark">secretary@basis.org.bd</a><br>
                        <strong><i class="fas fa-mobile" style="color:black"></i>&nbsp;</strong> 09612322747 (Ext: 103)
                    </div>
                    <div class="card-footer">
                        <div class="social text-center">
                            <a href="#">
                                <i class="fas fa-user-plus fa-2x" style="color:black"></i>
                            </a>
                            <a href="#">
                                <i class="far fa-eye fa-2x" style="color:black"></i>
                            </a>
                            <a href="#">
                                <i class="far fa-comments fa-2x" style="color:black"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card member-box shadow-lg">
                    <span class="shape"></span>
                    <img class="card-img-top" src="https://placeimg.com/640/480/arch/any" alt="">
                    <div class="card-body">
                        <span class="member-degignation">Secretary</span>
                        <h4 class="member-title">Hashim Ahmed</h4>
                        <strong><i class="fas fa-at" style="color:black"></i>&nbsp;</strong><a href="mailto:secretary@basis.org.bd" class="text-dark">secretary@basis.org.bd</a><br>
                        <strong><i class="fas fa-mobile" style="color:black"></i>&nbsp;</strong> 09612322747 (Ext: 103)
                    </div>
                    <div class="card-footer">
                        <div class="social text-center">
                            <a href="#">
                                <i class="fas fa-user-plus fa-2x" style="color:black"></i>
                            </a>
                            <a href="#">
                                <i class="far fa-eye fa-2x" style="color:black"></i>
                            </a>
                            <a href="#">
                                <i class="far fa-comments fa-2x" style="color:black"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card member-box shadow-lg">
                    <span class="shape"></span>
                    <img class="card-img-top" src="https://placeimg.com/640/480/arch/any" alt="">
                    <div class="card-body">
                        <span class="member-degignation">Secretary</span>
                        <h4 class="member-title">Hashim Ahmed</h4>
                        <strong><i class="fas fa-at" style="color:black"></i>&nbsp;</strong><a href="mailto:secretary@basis.org.bd" class="text-dark">secretary@basis.org.bd</a><br>
                        <strong><i class="fas fa-mobile" style="color:black"></i>&nbsp;</strong> 09612322747 (Ext: 103)
                    </div>
                    <div class="card-footer">
                        <div class="social text-center">
                            <a href="#">
                                <i class="fas fa-user-plus fa-2x" style="color:black"></i>
                            </a>
                            <a href="#">
                                <i class="far fa-eye fa-2x" style="color:black"></i>
                            </a>
                            <a href="#">
                                <i class="far fa-comments fa-2x" style="color:black"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <?php require_once __DIR__ . '/../Partials/enPied.php' ?>

    <?php require_once __DIR__ . '/../Partials/loader.php' ?>

    <?php require_once __DIR__ . '/../Ressources/footer.js.php' ?>
    <script src="/../Public/JS/status.js"></script>
    <script src="/../Public/JS/postStat.js"></script>
    <script src="/../Public/JS/TraitEditProfil.js"></script>
    <script src="/../Public/JS/paginationScript.js"></script>
</body>

</html>