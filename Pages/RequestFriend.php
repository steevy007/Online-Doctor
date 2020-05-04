<?php
session_start();
require_once '../App/init.php';

use App\Model\AuthFilter;

AuthFilter::mustConnect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Doctor | Profile</title>
    <?php require_once __DIR__ . '/../Ressources/head.css.php' ?>
    <link rel="stylesheet" href="../Public/CSS/styleP.css">
    <link rel="stylesheet" href="../Public/CSS/styleRequest.css">
    <style>
     
    </style>
</head>

<body>
    <?php require_once __DIR__ . '/../Partials/enTete.php' ?>

    <div class="work-1">
        <h1 class="text-2">Request | Friend</h1>
    </div>

    <section>
            <div class="container testimonials">
                <div class="row mb-2">
                    <div class="col-md-8 testimonial">
                        <div class="row">
                            <div class="avatar col-md-5">
                                <a href="#">
                                    <img class="img-circle" src="https://bootdey.com/img/Content/user_3.jpg" alt="Taylor Otwell">
                                </a>
                            </div>

                            <div class="testimonial-main col-md-7">
                                <h4 class="media-heading"><a href="#m">Owenl Ollyt</a></h4>
                                <a href="" class="text-success"><i class="fas fa-check fa-2x"></i></a>
                                <a href="" class="text-danger"><i class="far fa-times-circle fa-2x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-8 testimonial">
                        <div class="row">
                            <div class="avatar col-md-5">
                                <a href="#">
                                    <img class="img-circle" src="https://bootdey.com/img/Content/user_3.jpg" alt="Taylor Otwell">
                                </a>
                            </div>

                            <div class="testimonial-main col-md-7">
                                <h4 class="media-heading"><a href="#m">Owenl Ollyt</a></h4>
                                <a href="" class="text-success"><i class="fas fa-check fa-2x"></i></a>
                                <a href="" class="text-danger"><i class="far fa-times-circle fa-2x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <?php require_once __DIR__ . '/../Partials/enPied.php' ?>

    <?php require_once __DIR__ . '/../Partials/loader.php' ?>

    <?php require_once __DIR__ . '/../Ressources/footer.js.php' ?>
</body>

</html>