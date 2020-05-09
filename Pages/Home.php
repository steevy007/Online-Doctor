<?php
session_start();
require_once '../App/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Doctor | Home</title>
    <?php require_once __DIR__. '/../Ressources/head.css.php' ?>
</head>

<body>
    <?php require_once __DIR__.'/../Partials/enTete.php' ?>
    <!-- END nav -->

    <div class="hero-wrap js-fullheight" style="background-image: url('../Public/IMAGES/img3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                data-scrollax-parent="true">
                <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We have
                        <span class="number" data-number="850000">0</span> great job offers you deserve!</p>
                    <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Your Dream
                        <br><span>Job is Waiting</span></h1>

                    <div class="ftco-search">
                        <div class="row">
                            <div class="col-md-12 nav-link-wrap">
                                <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill"
                                        href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find
                                        a Job</a>

                                </div>
                            </div>
                            <div class="col-md-12 tab-wrap">

                                <div class="tab-content p-4" id="v-pills-tabContent">

                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                        aria-labelledby="v-pills-nextgen-tab">
                                        <form action="#" class="search-job">
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <div class="icon"><span><i
                                                                        class="fas fa-briefcase"></i></span></div>
                                                            <input type="text" class="form-control"
                                                                placeholder="eg. Garphic. Web Developer">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <div class="select-wrap">
                                                                <div class="icon"><span><i
                                                                            class="fas fa-angle-down"></i></span></div>
                                                                <select name="" id="" class="form-control">
                                                                    <option value="">Category</option>
                                                                    <option value="">Full Time</option>
                                                                    <option value="">Part Time</option>
                                                                    <option value="">Freelance</option>
                                                                    <option value="">Internship</option>
                                                                    <option value="">Temporary</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <div class="icon"><span><i
                                                                        class="fas fa-map-marker-alt"></i></span></div>
                                                            <input type="text" class="form-control"
                                                                placeholder="Location">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <input type="submit" value="Search"
                                                                class="form-control btn btn-primary">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel"
                                        aria-labelledby="v-pills-performance-tab">
                                        <form action="#" class="search-job">
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <div class="icon"><span class="icon-user"></span></div>
                                                            <input type="text" class="form-control"
                                                                placeholder="eg. Adam Scott">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <div class="select-wrap">
                                                                <div class="icon"><span
                                                                        class="ion-ios-arrow-down"></span></div>
                                                                <select name="" id="" class="form-control">
                                                                    <option value="">Category</option>
                                                                    <option value="">Full Time</option>
                                                                    <option value="">Part Time</option>
                                                                    <option value="">Freelance</option>
                                                                    <option value="">Internship</option>
                                                                    <option value="">Temporary</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <div class="icon"><span class="icon-map-marker"></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                placeholder="Location">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <input type="submit" value="Search"
                                                                class="form-control btn btn-primary">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section services-section bg-light">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span><img src="../Public/ICONES/icons8_Administrative_Tools_80px.png"
                                    alt=""></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Search Millions of Jobs</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span><img src="../Public/ICONES/icons8_Caduceus_80px.png" alt=""></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Easy To Manage Jobs</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span><img src="../Public/ICONES/icons8_Goal_80px.png" alt=""></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Top Careers</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span><img src="../Public/ICONES/icons8_Certificate_80px.png" alt=""></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Search Expert Candidates</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-counter">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Categories work wating for you</span>
                    <h2 class="mb-4"><span>Medecin</span> Specialiste</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ftco-animate">
                    <ul class="category">
                        <li><a href="#">Web Development <span class="number" data-number="1000">0</span></a></li>
                        <li><a href="#">Graphic Designer <span class="number" data-number="1000">0</span></a></li>
                        <li><a href="#">Multimedia <span class="number" data-number="2000">0</span></a></li>
                        <li><a href="#">Advertising <span class="number" data-number="900">0</span></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <?php require_once __DIR__. '/../Partials/countZone.php' ?>

    <?php require_once __DIR__.'/../Partials/testimonialEmp.php' ?>

    <?php require_once __DIR__.'/../Partials/suscribeNews.php' ?>

    <?php require_once __DIR__.'/../Partials/enPied.php' ?>

    <?php require_once __DIR__.'/../Partials/loader.php' ?>

    <?php require_once __DIR__.'/../Ressources/footer.js.php' ?>
    <?php
	if (isset($_GET['connect']) and $_GET['connect'] === 'true') {
	?>
    <script src="../Public/JS/welcomeUser.js"></script>
	<?php
	}
	?>
</body>

</html>