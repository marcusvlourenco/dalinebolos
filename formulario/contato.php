<?php 
  
    //Convertendo caracteres especiais para a realidade HTML
    $name = htmlspecialchars_decode(htmlspecialchars($_POST['name'], ENT_QUOTES,'UTF-8'));
    $email = htmlspecialchars_decode(htmlspecialchars($_POST['email'], ENT_QUOTES,'UTF-8'));
    $phone = htmlspecialchars_decode(htmlspecialchars($_POST['phone'], ENT_QUOTES,'UTF-8'));
    $subject = htmlspecialchars_decode(htmlspecialchars($_POST['subject'], ENT_QUOTES,'UTF-8'));
    $message = htmlspecialchars_decode(htmlspecialchars($_POST['message'], ENT_QUOTES,'UTF-8'));

    function isEmailValido($email){
        $conta = "/[a-zA-Z0-9\._-]+@";
        $domino = "[a-zA-Z0-9\._-]+.";
        $extensao = "([a-zA-Z]{2,4})$/";
        $pattern = $conta.$domino.$extensao; 
        return preg_match($pattern, $email);
    }

    if((empty($name) == true) ||  ((strlen($name) < 3) == true)){    
        echo "<script>alert('Nome precisa ser preenchido corretamente...');window.history.back();</script>";
    } elseif(((strlen($email)<8) == true) || (strstr($email,'@', true) == false) || (strstr($email,'.',true) == false) || ((isEmailValido($email))==false) || (filter_var( $email, FILTER_VALIDATE_EMAIL) == false)){
        echo "<script>alert('Email precisa ser preenchido corretamente...');window.history.back();</script>";
    } elseif((empty($subject) == true) || ((strlen($subject) < 3) == true)){
        echo "<script>alert('Assunto precisa ser preenchido...');window.history.back();</script>";
    } elseif((empty($phone) == true) || ((strlen($phone) < 18) == true)){
        echo "<script>alert('Telefone precisa ser preenchido...');window.history.back();</script>";
    } elseif((empty($message) == true) || ((strlen($message) < 2) == true)){
        echo "<script>alert('Pedido precisa ser preenchido...');window.history.back();</script>";
    } elseif ( !isset( $_POST ) || empty( $_POST ) ) {
        echo "<script>alert('Nada Foi Postado!');window.history.back();</script>";
    } else {
        $to = "contato@dalinebolos.com.br";
        $mensagem = "
            <!DOCTYPE html>
            <html>
                <head>
                    <style>
                        .table {
                          border: 1px solid #ddd;
                          width: 90%;
                        }
                        .customers {
                          font-family: Arial, Helvetica, sans-serif;
                          border-collapse: collapse;
                          padding-top: 5px;
                          padding-bottom: 5px;
                          text-align: left;
                          background-color: #ff35a6;
                          color: #fff;
                          width: 30%;
                          padding: 5px;  
                          font-size: 12px;
                          border: 1px solid #ddd;
                        }
                        .customers:nth-child(even){
                        	background-color: #abbbbb;
                          	color: #000;
                        }
                        .table:hover {
                        	background-color: #ff0000;
                          	color: #ff0000;
                        }
                        .customers2{
                          font-family: Arial, Helvetica, sans-serif;
                          border-collapse: collapse;
                          padding-top: 5px;
                          padding-bottom: 5px;
                          text-align: left;
                          background-color: #ffff;
                          color: #000;
                          width: 70%;
                          padding: 5px;  
                          font-size: 14px;
                          border: 1px solid #ddd;
                        }
                    </style>
                </head>
                <body>
                    <h1>Contato do Site</h1>
                    <table class='table'>
                      <tr>
                        <td class='customers'>Nome:</td>
                        <td class='customers2'>$name</td>
                      </tr>
                    </table>
                    </br>
                    <table class='table'>
                      <tr>
                        <td class='customers'>Telefone:</td>
                        <td class='customers2'>$phone</td>
                      </tr> 
                    </table>
                    </br>
                    <table class='table'>
                      <tr>
                        <td class='customers'>Email:</td>
                        <td class='customers2'>$email</td>
                      </tr>
                    </table>
                    </br>
                    <table class='table'>
                      <tr>
                        <td class='customers'>Assunto:</td>
                        <td class='customers2'>$subject</td>
                      </tr> 
                    </table>
                    </br>
                    <table class='table'>
                      <tr>
                        <th class='customers'>Mensagem:</th>
                      </tr>
                      <tr>
                        <td class='customers2'>$message</td>
                      </tr>
                    </table>
                </body>
            </html>
        ";
        $email = "contato@dalinebolos.com.br";
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";
        $enviaremail = mail($to,$subject,$mensagem,$headers);
        if ($enviaremail) {
            echo "<script>alert('MENSAGEM ENVIADA COM SUCESSO!');</script>";
            echo "<script>alert('AGRADECEMOS O SEU CONTATO E EM BREVE RETORNAREMOS!');location.href='../index.html';</script>";
        }
        else {                
            echo "<script>alert('ERRO AO ENVIAR A MANSAGEM DE CONTATO.');</script>";
            echo "<script>alert('<b>Detalhes do erro:</b>');</script>";
            echo "<script>alert($mail->ErrorInfo);</script>";
            echo "<script>window.history.back();</script>";
        }  
    }
?>
