<?php 
  
  //Convertendo caracteres especiais para a realidade HTML
  $name = htmlspecialchars_decode(htmlspecialchars($_POST['name'], ENT_QUOTES,'UTF-8'));
  $email = htmlspecialchars_decode(htmlspecialchars($_POST['email'], ENT_QUOTES,'UTF-8'));
  $phone = htmlspecialchars_decode(htmlspecialchars($_POST['phone'], ENT_QUOTES,'UTF-8'));
  $date = htmlspecialchars_decode(htmlspecialchars($_POST['date'], ENT_QUOTES,'UTF-8'));
  $time = htmlspecialchars_decode(htmlspecialchars($_POST['time'], ENT_QUOTES,'UTF-8'));
  $local = htmlspecialchars_decode(htmlspecialchars($_POST['local'], ENT_QUOTES,'UTF-8'));
  $message = htmlspecialchars_decode(htmlspecialchars($_POST['message'], ENT_QUOTES,'UTF-8'));

  function isEmailValido($email){
    $conta = "/[a-zA-Z0-9\._-]+@";
    $domino = "[a-zA-Z0-9\._-]+.";
    $extensao = "([a-zA-Z]{2,4})$/";
    $pattern = $conta.$domino.$extensao; 
    return preg_match($pattern, $email);
  }
  
  if((empty($name) == true) || (strlen($name) < 3) == true){    
      echo "<script>alert('Nome precisa ser preenchido corretamente...');window.history.back();</script>";
  } elseif(((strlen($email)<8 ) == true) || (strstr($email,'@', true) == false) || (strstr($email,'.',true) == false) || ((isEmailValido($email))==false) || (filter_var( $email, FILTER_VALIDATE_EMAIL) == false)){
      echo "<script>alert('Email precisa ser preenchido corretamente...');window.history.back();</script>";
  } elseif((empty($date) == true) || (strlen($date) < 10) == true){
    echo "<script>alert('Data precisa ser preenchida...');window.history.back();</script>";
  } elseif((empty($time) == true)  || (strlen($time) < 5) == true){
    echo "<script>alert('Horário precisa ser preenchido...');window.history.back();</script>";
  } elseif((empty($local) == true)  || (strlen($local) < 8) == true){
    echo "<script>alert('O Endereço precisa ser preenchido...');window.history.back();</script>";
  } elseif((empty($phone) == true)  || (strlen($phone) < 14) == true){
      echo "<script>alert('Telefone precisa ser preenchido...');window.history.back();</script>";
  } elseif((empty($message) == true)  || (strlen($message) < 2) == true){
      echo "<script>alert('Pedido precisa ser preenchido...');window.history.back();</script>";
  } elseif ( !isset( $_POST ) || empty( $_POST ) ) {
    echo "<script>alert('Nada Foi Postado!');window.history.back();</script>";
  } else {
    $mensagem = "
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
              <td width='500'>Local Entrega:<b>$local</b></td>
              <td width='320'>Telefone:$phone</td>          
          </tr>
          <tr>
              <td width='500'>Data:<b>$date</b></td>          
              <td width='320'>Horário:<b>$time</b></td>
          </tr>
          <tr>
              <th width='820'  colspan='2'  rowspan='2'>Pedido: $message</th>
          </tr>
            
        </table>
        
        </html>
      ";
    $subject = "Orçamento pelo Site";
    $to = "dalinebolos@gmail.com";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";
    $headers .= 'Cc: '.$email . "\r\n";          
    $enviaremail = mail($to,$subject,$mensagem,$headers);
    if ($enviaremail) {
      echo "<script>alert('ORÇAMENTO ENVIADO COM SUCESSO!');</script>";
      echo "<script>alert('AGRADECEMOS A SUA PREFERÊNCIA E EM BREVE ENTRAREMOS EM CONTATO!');location.href='../index.html';</script>";
    }
    else {                
        echo "<script>alert('ERRO AO ENVIAR PEDIDO DE ORÇAMENTO.');</script>";
        echo "<script>alert('<b>Detalhes do erro:</b>');</script>";
        echo "<script>alert($mail->ErrorInfo);</script>";
        echo "<script>window.history.back();</script>";
    } 
  }
?>