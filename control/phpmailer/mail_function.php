<?php
	function phpmail($to_address,$subj,$msg)
	{
	$mail = new PHPMailer();
	$mail->IsSMTP();	 // set mailer to use SMTP
	$mail->Host = "ssl://smtp.gmail.com"; 	// specify main and backup server
	$mail->Port = 465;	 // set the SMTP port for the GMAIL server
	$mail->SMTPAuth = true;       // enable SMTP authentication
	$mail->Username = "web.admin@seecs.edu.pk";   // your SMTP username or your gmail username
	$mail->Password = "P@ssw0rd3";    // your SMTP password or your gmail password
	$from = "web.admin@seecs.edu.pk"; // Reply to this email
	$to=$to_address; 	// Recipients email ID
	$mail->AddCC('shafaq.soomro@seecs.edu.pk', 'Shafaq Soomro');
	$mail->AddCC('adnan.rasheed@seecs.edu.pk', 'Adnan Rasheed');
	//$name="SEECS Web Admin"; 	// Recipient's name
	$mail->From = $from;
	$mail->FromName = "SEECS Web Admin"; 	// Name to indicate where the email came from when the recepient received
	$mail->AddAddress($to,$name);
//	$mail->AddReplyTo($from,"Web Developer"); //$mail->AddReplyTo("reply@email.com","reply name"); they answer here, optional
	$mail->WordWrap = 50; 	// set word wrap
	$mail->IsHTML(true); 	// send as HTML
	$mail->Subject = $subj;
	$mail->Body = $msg; 	//HTML Body
	$mail->AltBody = "This is the body when user views in plain text format"; 	//Text Body
	return(!$mail->Send());

	}
	
?>