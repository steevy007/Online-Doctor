<?php
  session_start();
  require_once '../App/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Online Doctor | About</title>
  <?php require_once'../Ressources/head.css.php' ?>
</head>

<body>
  <?php require_once '../Partials/enTete.php' ?>
  <div class="hero-wrap js-fullheight" style="background-image: url('../Public/IMAGES/img3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
        <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="../Pages/Home.php">Home <i class="fas fa-angle-right"></i></a></span> <span>About</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">About</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-about d-md-flex">
    <div class="one-half img" style="background-image: url('../Public/IMAGES/about.jpg');"></div>
    <div class="one-half ftco-animate">
      <div class="heading-section ftco-animate ">
        <h2 class="mb-4"><span>We Are The Job Portal Agency</span></h2>
      </div>
      <div>
        <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
      </div>
    </div>
  </section>

  <?php require_once '../Partials/testimonialEmp.php' ?>

  <?php require_once '../Partials/countZone.php' ?>

  <?php require_once '../Partials/suscribeNews.php' ?>
  <?php require_once '../Partials/enPied.php' ?>
  <?php require_once '../Partials/loader.php' ?>
  <?php require_once '../Ressources/footer.js.php' ?>
</body>

</html>