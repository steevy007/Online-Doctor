<?php
namespace App\Model;
require_once '../init.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail{
    private  const GUSER='steevesanon555@gmail.com';
    private  const GPWD='steevy2017';
    
    public static function sendMailValidate($to,$nom,$prenom){
        $token=sha1($to).md5($prenom);
        $body="
        <head>
            <style>
               h1{
                   color:red;
               }
            </style>
        </head>
        <body>
            <h1>Hello $nom $prenom ,<h1/>
            <p>
               Bienvenue Nous vous Prions de bien vouloir cliquer sur ce lien <a href='http://localhost:8000//App/Controller/ActiverCompte.ctrl.php?email=$to&token=$token'> Activez Mon Compte </a> pour pouvoir activer votre compye
            <p/>
        </body>
        </html>
        ";
        $mail=new PHPMailer();
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 3;
        $mail->SMTPAuth = true;  // authentication enabled
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
        $mail->SMTPAutoTLS = false;
        $mail->Host ='smtp.gmail.com';
        $mail->Port = 587;
        $mail->isHTML();
        $mail->Username =self::GUSER;  
        $mail->Password = self::GPWD;
        $mail->SetFrom(self::GUSER,'Online Doctor');
        $mail->Body=$body;
        $mail->AltBody = 'Message Non Supporter';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Subject = 'Validation de mail';
        $mail->AddAddress($to,$nom);
        if(!$mail->Send()) {
            //return false;
            var_dump($mail->ErrorInfo);
        } else {
            return true;
            
        }
        $mail->smtpClose();
    }


    
    public static function sendMail($to,$nom,$prenom){

        $body="
        <head>
            <style>
               h1{
                   color:red;
               }
            </style>
        </head>
        <body>
            <h1>Hello $nom $prenom ,<h1/>
            <p>
               Bienvenue Nous vous Prions de bien vouloir cliquer sur ce lien <a href='http://localhost:8000//App/Controller/ActiverCompte.ctrl.php?email=$to&token=$token'> Activez Mon Compte </a> pour pouvoir activer votre compye
            <p/>
        </body>
        </html>
        ";

    }

}


/*
define ('GUSER','steevesanon555@gmail.com');
define ('GPWD','steevy2017');
    $body="<hr><p>je suis le king  </p>";
    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
    $mail->SMTPAutoTLS = false;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->isHTML();
    $mail->Username = GUSER;  
    $mail->Password = GPWD;           
    $mail->SetFrom("steevesanon555@gmail.com","Sanon");
    $mail->Subject = "Sujet";
    $mail->Body=$body;
    //$mail->msgHTML($body) ;
    $mail->AddAddress("steevesanon6@gmail.com");
    if(!$mail->Send()) {
        echo 'Message non Envoye '.$mail->ErrorInfo;
    } else {
        echo 'Message Envoye';
    }
    $mail->smtpClose();*/