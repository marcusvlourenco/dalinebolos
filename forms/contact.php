<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


$arquivo = "
  <style type='text/css'>
  body {
  margin:0px;
  font-family:Verdane;
  font-size:12px;
  color: #666666;
  }
  a{
  color: #666666;
  text-decoration: none;
  }
  a:hover {
  color: #FF0000;
  text-decoration: none;
  }
  </style>
    <html>
        <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
            <tr>
              <td>
  <tr>
                 <td width='500'>Name:$name</td>
                </tr>
                <tr>
                  <td width='320'>E-mail:<b>$email</b></td>
     </tr>
      <tr>
                  <td width='320'>Subject:<b>$subject</b></td>
                </tr>
     <tr>
                  <td width='320'>Message:$message</td>
                </tr>
            </td>
          </tr>
        </table>
    </html>
  ";
//enviar

  // emails para quem será enviado o formulário
  $emailenviar = "dalinebolo@gmail.com";
  $destino = $emailenviar;
  $assunto = "Contato pelo Site";

  // É necessário indicar que o formato do e-mail é html
  $headers  = " MIME-Version: 1.1\n";
      $headers .= "Content-type: text/html; charset=utf-8\n";
      $headers .= " From: $name <$email>\n" ;
   $headers .= "Return-Path: $email\n";

  

  $enviaremail = mail($email, $assunto, $arquivo, $headers, $destino);
  if($enviaremail){
  $mgm = "E-MAIL ENVIADO COM SUCESSO!";
  //echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
  echo $mgm;
  } else {
  $mgm = "ERRO AO ENVIAR E-MAIL!";
  echo $mgm;
  }

/**
* Requires the "PHP Email Form" library
* The "PHP Email Form" library is available only in the pro version of the template
* The library should be uploaded to: vendor/php-email-form/php-email-form.php
* For more info and help: https://bootstrapmade.com/php-email-form/
*/

// Replace contact@example.com with your real receiving email address
/* ///////////////////////////////////////////////
$receiving_email_address = 'dalinebolos@gmail.com';

if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
include( $php_email_form );
} else {
die( 'Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];
////////////////////////////////////*/
// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
/*
$contact->smtp = array(
'host' => 'example.com',
'username' => 'example',
'password' => 'pass',
'port' => '587'
);
*/
/*//////////////////////////////////////
$contact->add_message( $_POST['name'], 'From');
$contact->add_message( $_POST['email'], 'Email');
$contact->add_message( $_POST['message'], 'Message', 10);

echo $contact->send();
////////////////////////////////////////*/
?>
