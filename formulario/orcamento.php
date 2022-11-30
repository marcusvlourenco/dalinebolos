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




?>
