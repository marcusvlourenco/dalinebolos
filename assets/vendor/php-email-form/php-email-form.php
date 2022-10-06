<?php

if(isset($_POST)){
	$formok = true;

	//form data

	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$subject = htmlspecialchars($_POST['subject']);
	$message = htmlspecialchars($_POST['message']);

	//validation
	if(empty($name) || empty($email) || empty($subject) || empty($message)){
		$formok = false;
	}

	if($formok){
		$headers = "From: contato@dalinebolos.com" . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$emailbody = "<p><strong>Subject: </strong> {$subject} </p>
                  <p><strong>Name: </strong> {$name} </p>
                  <p><strong>Email Address: </strong> {$email} </p>
                  <p><strong>Message: </strong> {$message} </p> ";

    mail("contato@dalinebolos.com","Contato",$emailbody,$headers);

	}

        //redirect back to form
        header('location: ' . $_SERVER['HTTP_REFERER']);

}

 ?>