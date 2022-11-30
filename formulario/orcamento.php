<?php



$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$local = $_POST['local'];
$message = $_POST['message'];


$message = "
  <html> 
    <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#ebb2ed'>
      <tr>
          <th colspan='2'>Orçamento</th>
      </tr>
      <tr>
          <td width='500'>Nome:$name</td>
          <td width='320'>E-mail:<b>$email</b></td>
      </tr>
      <tr>
          <td width='320'>Telefone:$phone</td>
          <td width='500'>Local Entrega:<b>$local</b></td>
      
      </tr>
      <tr>
          <td width='320'>Data:<b>$date</b></td>
      
          <td width='320'>Horário:<b>$time</b></td>
      </tr>
      <tr>
          <th width='320'  colspan='2'  rowspan='2'>Pedido: $message</th>
      </tr>
        
    </table>
    
    </html>
  ";
//enviar

  // emails para quem será enviado o formulário
  $subject = "Orçamento pelo Site";

  
  $to = "dalinebolos@gmail.com";
  
  
  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  
  // More headers
  $headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";
  $headers .= 'Cc: '.$email . "\r\n";
  
  
  $enviaremail = mail($to,$subject,$message,$headers);
  
  
  if ($enviaremail) {
      echo "<script>alert('E-MAIL ENVIADO COM SUCESSO!');location.href='../index.html#Section-Orcamento';</script>";
  }
  else {
      echo "ERRO AO ENVIAR E-MAIL.";
      echo "<b>Detalhes do erro:</b> " . $mail->ErrorInfo;
      echo "<script>location.href='../index.html#Section-Orcamento';</script>";
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
