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


  

?>
