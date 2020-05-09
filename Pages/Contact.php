<?php
  session_start();
  require_once '../App/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Online Doctor | Contact</title>
  <?php require_once '../Ressources/head.css.php' ?>
</head>

<body>
  <?php require_once '../Partials/enTete.php' ?>
  <div class="hero-wrap js-fullheight" style="background-image: url('../Public/IMAGES/img3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
        <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="Pages/Home.php">Home <i class="fas fa-angle-right"></i></a></span> <span>Contact</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Contact Us</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section bg-light">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
        <div class="col-md-12 mb-4">
          <h2 class="h3">Contact Information</h2>
        </div>
        <div class="w-100"></div>
        <div class="col-md-3">
          <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
        </div>
        <div class="col-md-3">
          <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
        </div>
        <div class="col-md-3">
          <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
        </div>
        <div class="col-md-3">
          <p><span>Website</span> <a href="#">yoursite.com</a></p>
        </div>
      </div>
      <div class="row block-9">
        <div class="col-md-6 order-md-last d-flex">
          <form id="form" action="../App/Controller/Contact.ctrl.php" class="bg-white p-5 contact-form" method="POST" >
            <div class="form-group">
              <input type="text" id="fullname"  class="form-control" placeholder="Your Name" name="fullname" data-parsley-trigger-after-failure="focusout" data-parsley-required>
            </div>
            <div class="form-group">
              <input type="email" id="email"  class="form-control" placeholder="Your Email" name="email" data-parsley-trigger-after-failure="focusout" data-parsley-required>
            </div>
            <div class="form-group">
              <input type="text" id="subject" class="form-control" placeholder="Subject" name="subject" data-parsley-trigger-after-failure="focusout" data-parsley-required>
            </div>
            <div class="form-group">
              <textarea  cols="30" rows="7" id="message" class="form-control" placeholder="Message" name="message" data-parsley-trigger-after-failure="focusout" data-parsley-maxlength="255" data-parsley-required ></textarea>
            </div>
            <div class="alert alert-warning" id="err" role="alert">
              
            </div>
            <div class="form-group">
              <input type="submit" id="submit" name="submit"  value="Send Message"  class="btn btn-primary py-3 px-5">
            </div>
          </form>

        </div>

        <div class="col-md-6 d-flex">
          <div id="map" class="bg-white"></div>
        </div>
      </div>
    </div>
  </section>
  <?php require_once '../Partials/suscribeNews.php' ?>
  <?php require_once '../Partials/enPied.php' ?>
  <?php require_once '../Partials/loader.php' ?>
  <?php require_once '../Ressources/footer.js.php' ?>
  <script src="../Public/JS/TraitContact.js"></script>

  <script>
  $('#form').parsley();
</script>
</body>

</html>