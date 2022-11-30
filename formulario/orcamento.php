<?php 

function isEmailValido($email){
    $conta = "/[a-zA-Z0-9\._-]+@";
    $domino = "[a-zA-Z0-9\._-]+.";
    $extensao = "([a-zA-Z]{2,4})$/";
    $pattern = $conta.$domino.$extensao; 
    if (preg_match($pattern, $email))
        return false;
    else
        return true;
}

if ( !isset( $_POST ) || empty( $_POST ) ) {
    echo "<script>alert('Envio inválido!');window.history.back();</script>";
}else{
    $captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : null;    
    if(!is_null($captcha)){
        $res = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Ldq4EcjAAAAAMbl6C9qHkfDPiGAWMRX3e1C896H&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']));
        if($res->success === true){   
            $name = $_POST['name'];
            $email = $_POST['email'];
            $tamanho = strlen($name);
            if($tamanho < 3){        
                echo "<script>alert('Nome inválido!');window.history.back();</script>";
            }
            if(isEmailValido($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){                
                echo "<script>alert('E-mail inválido!');window.history.back();</script>";
            }             
            $phone = $_POST['phone'];
            $tamanhop = strlen($phone);
            if($tamanhop < 14){        
                echo "<script>alert('Telefone inválido!');window.history.back();</script>";
            }
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
                echo "<script>alert('ERRO AO ENVIAR E-MAIL.');</script>";
                echo "<script>alert('<b>Detalhes do erro:</b>');</script>";
                echo "<script>alert($mail->ErrorInfo);</script>";
                echo "<script>window.history.back();</script>";
            }
        }else{
            echo "<script>alert('Erro ao validar o captcha!!!');window.history.back();location.reload(true);</script>";
        }
    }else{
        echo "<script>alert('Captcha não preenchido!');window.history.back();</script>";
    }
}
    
?>
