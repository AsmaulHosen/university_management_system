<?php
    $magazine_Title=$magazine_title;
	$category_Name=$category_name;
	$magazine_Desc=$magazine_desc;
	$post_Type=$post_type;
	$mailto = $mc_email;
    $mailSub = "Notification For New Magazine Post";
	$message="
	<table border='4px solid' align='center' width='590' cellpadding='4px' cellspacing='4px' >
	<tr>
	<td align='left'>
	<table border='0' width='590' align='center' cellpadding='0' cellspacing='0' class='container590'>
	<tr>
	<td align='left' style='color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;'>
	<!-- section text ======-->
	<h3 style=''>
	One New Magazine Posted From Your Department.<hr/>
	
	</h3>
	<a href='http://localhost/ewsd/Main/Admin/magazine_list.php'>Please check this..</a>
	<p style=''>
	<u><b> Magazine Title : </b></u>".$magazine_Title.",
	</p>
	<p style=''>
	<b> Magazine Category : </b>".$category_Name.",
	</p>
	<p style=''>
	<b> Description : </b>".$magazine_Desc.",
	</p>
	<p style=''>
	<b> Post type : </b>".$post_Type.",
	</p>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	
	</table>
	
	"
	;
    $mailMsg = $message;
	require 'PHPMailer-master/PHPMailerAutoload.php';
	
	$mail = new PHPMailer();
	
	$mail->SMTPOptions = array(
    'ssl' => array(
	'verify_peer' => false,
	'verify_peer_name' => false,
	'allow_self_signed' => true
    )
	);
	$mail ->IsSmtp();
	$mail ->SMTPDebug = 0;
	$mail ->SMTPAuth = true;
	$mail ->SMTPSecure = 'ssl';
	$mail ->Host = "smtp.gmail.com";
	// $mail ->Port = 465; // or 587
	$mail ->Port = 465; // or 587
	$mail ->IsHTML(true);
	$mail ->Username = "israfilsamrat3@gmail.com";
	$mail ->Password = "samrat1234 ";
	$mail->setFrom('israfilsamrat3@gmail.com', 'New Magazine Post');
	//$mail->addReplyTo('lunchforyou48@gmail.com', 'Lunch4U');
	$mail ->Subject = $mailSub;
	$mail ->Body = $mailMsg;
	$mail ->AddAddress($mailto);
	
	if(!$mail->Send())
	{
		//echo "Mail Not Sent";
	}
	else
	{
		//echo "Mail Sent";
	}	
