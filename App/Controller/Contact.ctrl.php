<?php
require_once '../init.php';
use App\Model\Contact;
use App\Utilities\Chaine;
$message;
if ($_POST) {
   
   extract($_POST);
   /**
    * secure Data
    */
   $fullname=Chaine::secureData($fullname);
   $email=Chaine::secureData($email);
   $subject=Chaine::secureData($subject);
   $message=Chaine::secureData($message);
   
   if (empty($fullname) or empty($email) or empty($subject) or empty($message)) {
      $message ='Veuillez remplir tout les champs';
     
   } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $message= 'Email invalide';
      
   } else {
      $contact = new Contact($fullname, $email, $subject, $message);
      $contact->faireContact();
      $message ='Succes';
      
   }
}

echo json_encode( $message);

