<?php
session_start();
require_once '../App/init.php';
use App\Model\AuthFilter;
AuthFilter::alreadyConnect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Online Doctor | Register</title>
  <?php require_once '../Ressources/head.css.php' ?>
</head>

<body>
  <?php require_once '../Partials/enTete.php' ?>
  <div class="hero-wrap js-fullheight" style="background-image: url('../Public/IMAGES/img3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
        <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="../Pages/Home.php">Home <i class="fas fa-angle-right"></i></a></span> <span>Post a Job</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Post a Job</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="ftco-section bg-light">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-8 mb-5">

          <form  id="form" class="p-5 bg-white" action="../App/Controller/Register.ctrl.php" method="POST" >

            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="font-weight-bold" for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" placeholder="Sanon" data-parsley-required>
              </div>
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="font-weight-bold" for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Sanon" data-parsley-required>
              </div>
            </div>

            <div class="row form-group mb-5" id="b-typeUser" >
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="typeUser">Type Utilisateur</label>
                <select name="typeUser" id="typeUser" class="form-control">
                  <option value="Medecin" selected>Medecin</option>
                  <option value="Client">Client</option>
                </select>
              </div>
            </div>

            <div class="row form-group mb-5">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="AdressePersonnel">Adresse Personnel</label>
                <input type="text" id="adressePers" name="adressePers" class="form-control" placeholder="Delmas 40B" data-parsley-trigger="blur" data-parsley-minlength="10" data-parsley-required>
              </div>
            </div>

            <div class="row form-group mb-5" id="b-adresseClinic">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="fullname">Adresse Clinic</label>
                <input type="text" id="adresseClinic" name="adresseClinic" class="form-control" data-parsley-trigger="blur" data-parsley-minlength="10" placeholder="Delmas 40B">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="font-weight-bold" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="ingsteevesanongmail.com" data-parsley-trigger="blur" data-parsley-required>
              </div>
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="font-weight-bold" for="telephone">Telephone</label>
                <input type="tel" id="tel" name="tel" class="form-control" placeholder="000000" data-parsley-trigger="blur"  data-parsley-maxlength="8" data-parsley-required>
              </div>
            </div>

            <div class="row form-group mb-5" id="b-speciality">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="Speciality">Specialite</label>
                <select name="speciality" id="speciality" class="form-control">
                  <option value="Gunecologue">Gunecologue</option>
                  <option value="Chirurgien" selected>Chirurgien</option>
                  <option value="Dentiste">Dentiste</option>
                  <option value="Anestesiste">Anestesiste</option>
                  <option value="Pediatre">Pediatre</option>
                  <option value="Urologue">Urologue</option>
                  <option value="Cardiologue">Cardiologue</option>
                  <option value="Generaliste">Generaliste</option>
                  <option value="Ophtalmologue">Ophtalmologue</option>
                  <option value="Pneumologue">Pneumologue</option>
                </select>
              </div>
            </div>

            <div class="row form-group mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="font-weight-bold" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" data-equalto="#Cpassword"  data-parsley-maxlength="8" data-parsley-trigger="blur" data-parsley-required>
              </div>
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="font-weight-bold" for="Cpassword">Confirm Password</label>
                <input type="password" id="Cpassword" name="Cpassword" class="form-control" data-equalto="#password"  data-parsley-maxlength="8" data-parsley-trigger="blur" data-parsley-required>
              </div>
            </div>



            <div class="row form-group">
              <div class="col-md-12">
                <h3>Pitch</h3>
              </div>
              <div class="col-md-12 mb-3 mb-md-0">
                <textarea name="pitch" id="pitch" class="form-control" id="" cols="30" rows="5"  data-parsley-minlength="10"></textarea>
              </div>
            </div>

            <div class="alert alert-warning" id="err" role="alert">
              This is a warning alert—check it out!
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <input type="submit" name="submit" id="submit" value="Post" class="btn btn-primary  py-2 px-5">
              </div>
            </div>


          </form>
        </div>

        <div class="col-lg-4">
          <div class="p-4 mb-3 bg-white">
            <h3 class="h5 text-black mb-3">Contact Info</h3>
            <p class="mb-0 font-weight-bold">Address</p>
            <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

            <p class="mb-0 font-weight-bold">Phone</p>
            <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

            <p class="mb-0 font-weight-bold">Email Address</p>
            <p class="mb-0"><a href="#"><span class="__cf_email__" data-cfemail="671e081215020a060e0b2703080a060e094904080a">[email&#160;protected]</span></a></p>

          </div>

          <div class="p-4 mb-3 bg-white">
            <h3 class="h5 text-black mb-3">More Info</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
            <p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once '../Partials/suscribeNews.php' ?>
  <?php require_once '../Partials/enPied.php' ?>
  <?php require_once '../Partials/loader.php' ?>
  <?php require_once '../Ressources/footer.js.php' ?>
  <script src="../Public/JS/TraitRegister.js"></script>
  <script>
  $('#form').parsley();
</script>
</body>

</html>