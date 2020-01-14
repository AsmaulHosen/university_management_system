<?php
	$category_name=$category_name;
	$magazine_Title =$magazine_title;
	$magazine_Desc =$magazine_desc;
	$post_Type=$post_type;
	$first_Name=$first_name;
	$last_Name=$last_name;
	
	$mailto = 'nissan19rocks@gmail.com';
    $mailSub = "Notification For Publised Post";
	$message="
	<table border='4px solid' align='center' width='590' cellpadding='4px' cellspacing='4px' >
	<tr>
	<td align='left'>
	<table border='0' width='590' align='center' cellpadding='0' cellspacing='0' class='container590'>
	<tr>
	<td align='left' style='color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;'>
	<!-- section text ======-->
	<p style=''>
	Dear ".$first_Name." ".$last_Name."
	<br/>Your Magazine Have been Approved. Which is Published Now 
	</p>
	
	<p style=''>
	<u><b> Magazine Title :</b></u>".$magazine_Title.",
	</p>
	<p style=''>
	<b> Magazine Category :</b>".$category_Name.",
	</p>
	<p style=''>
	<b> Description :</b>".$magazine_Desc.",
	</p>
	<p style=''>
	<b> Post type :</b>".$post_Type.",
	</p><br/>
	<a href='http://localhost/ewsd/Main/index.php'>Please check this..</a>	
	</td>
	</tr>
	</table>
	</td>
	</tr>
	
	</table>
	
	"
	;
    $mailMsg = $message;
	require '../PHPMailer-master/PHPMailerAutoload.php';
	
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
	$mail ->Username = "samratahamad3@gmail.com";
	$mail ->Password = "samrat1234 ";
	$mail->setFrom('samratahamad3@gmail.com', 'Approved Post');
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
