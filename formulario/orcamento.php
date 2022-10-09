<?php



$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$people = $_POST['people'];
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
                 <td width='500'>Nome:$name</td>
                </tr>
                <tr>
                  <td width='320'>E-mail:<b>$email</b></td>
                </tr>
                <tr>
                  <td width='320'>Telefone:<b>$phone</b></td>
                </tr>
                <tr>
                  <td width='320'>Data:<b>$date</b></td>
                </tr>
                <tr>
                  <td width='320'>Horas:<b>$time</b></td>
                </tr>
                <tr>
                  <td width='320'>Local:<b>$people</b></td>
                </tr>
                <tr>
                  <td width='320'>Pedido:<b>$message</b></td>
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
  $assunto = "Orçamento pelo Site";

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
  * The library should be uploaded to: auxiliar/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contato@example.com with your real receiving email address
  /*
  $receiving_email_address = 'dalinebolos@gmail.com';

  if( file_exists($php_email_form = '../arquivos/auxiliar/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $book_a_table = new PHP_Email_Form;
  $book_a_table->ajax = true;
  
  $book_a_table->to = $receiving_email_address;
  $book_a_table->from_name = $_POST['name'];
  $book_a_table->from_email = $_POST['email'];
  $book_a_table->subject = "New table booking request from the website";
*/
  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $book_a_table->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */
/*
  $book_a_table->add_message( $_POST['name'], 'Name');
  $book_a_table->add_message( $_POST['email'], 'Email');
  $book_a_table->add_message( $_POST['phone'], 'Phone', 4);
  $book_a_table->add_message( $_POST['date'], 'Date', 4);
  $book_a_table->add_message( $_POST['time'], 'Time', 4);
  $book_a_table->add_message( $_POST['people'], '# of people', 1);
  $book_a_table->add_message( $_POST['message'], 'Message');

  echo $book_a_table->send(); */
?>
