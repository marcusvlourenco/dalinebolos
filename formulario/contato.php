<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$to = "dalinebolos@gmail.com";

$message = "
<html>
    <head>
        <title>HTML email</title>
    </head>
    <body>
        <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#ebb2ed'>
            <tr>
                <th colspan='2'>Contato</th>
            </tr>
            <tr>
                <td width='500'>Nome:$name</td>
            
                <td width='320'>E-mail:<b>$email</b></td>
            </tr>
            <tr>
                <td width='320'>Assunto:<b>$subject</b></td>
            
                <td width='320'>Telefone:<b>$phone</b></td>
            </tr>
            <tr>
                <th width='320'  colspan='2'  rowspan='2'>Mensagem: $message</th>
            </tr>
                
        </table>
    </body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";
$headers .= 'Cc: '.$email . "\r\n";


$enviaremail = mail($to,$subject,$message,$headers);


if ($enviaremail) {
    echo "<script>alert('E-MAIL ENVIADO COM SUCESSO!');location.href='../index.html#Section-Contato';</script>";
}
else {
    echo "ERRO AO ENVIAR E-MAIL.";
    echo "<b>Detalhes do erro:</b> " . $mail->ErrorInfo;
    echo "<script>location.href='../index.html#Section-Contato';</script>";
}


  

  

/**
* Requires the "PHP Email Form" library
* The "PHP Email Form" library is available only in the pro version of the template
* The library should be uploaded to: auxiliar/php-email-form/php-email-form.php
* For more info and help: https://bootstrapmade.com/php-email-form/
*/

// Replace contato@example.com with your real receiving email address
/* ///////////////////////////////////////////////
$receiving_email_address = 'dalinebolos@gmail.com';

if( file_exists($php_email_form = '../arquivos/auxiliar/php-email-form/php-email-form.php' )) {
include( $php_email_form );
} else {
die( 'Unable to load the "PHP Email Form" Library!');
}

$contato = new PHP_Email_Form;
$contato->ajax = true;

$contato->to = $receiving_email_address;
$contato->from_name = $_POST['name'];
$contato->from_email = $_POST['email'];
$contato->subject = $_POST['subject'];
////////////////////////////////////*/
// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
/*
$contato->smtp = array(
'host' => 'example.com',
'username' => 'example',
'password' => 'pass',
'port' => '587'
);
*/
/*//////////////////////////////////////
$contato->add_message( $_POST['name'], 'From');
$contato->add_message( $_POST['email'], 'Email');
$contato->add_message( $_POST['message'], 'Message', 10);

echo $contato->send();
////////////////////////////////////////*/
?>
