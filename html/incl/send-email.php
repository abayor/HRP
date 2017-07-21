<?php
	require_once('incl/PHP_Mailer/class.phpmailer.php');
	function check_if_field_isset($field) {
		if (isset($_POST[$field])) {
			return $_POST[$field];
		} 
		else {
			return "";
		}
	}
	function send_mail($mail_data, $user_data) {
		$mail = new PHPMailer();
		try {
			/*$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "ssl";
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465;
			$mail->Username = "xxx";
			$mail->Password = "xxx";*/

			$mail->IsHTML(true);
			$mail->From = $mail_data["send_from"];
			$mail->FromName = $mail_data["send_from_name"];
			$mail->Subject = $mail_data["subject"];
			$mail->SMTPDebug  = 0;
			$mail->MailerDebug  = false;
			$mail->Body = $mail_data["content"];
			$mail->AddAddress($mail_data["recipient"]);
			$mail->CharSet = 'UTF-8';
		
		
	
			
			echo $mail_data["message_success"];
		}
		
		catch (phpmailerException $e) {
			//echo $e->errorMessage(); //error messages from PHPMailer
			echo $mail_data["message_fail"];
		} 
		catch (Exception $e) {
			//echo $e->getMessage(); //error messages from anything else!
			echo $mail_data["message_fail"];
		}
	}
		$user_data["packet"] = check_if_field_isset("packet");
	$user_data["name"] = check_if_field_isset("name");
	$user_data["surname"] = check_if_field_isset("surname");
	$user_data["email"] = check_if_field_isset("email");
	$user_data["website"] = check_if_field_isset("website");
	$user_data["note"] = check_if_field_isset("note");
	// New line in textarea is displayed as \r\n, so this string should be replaced with <br>.
	$user_data["note"] = str_replace("\r\n", "<br>", $user_data["note"]);
	$user_data["attachment"] = "";

			//attachment		
 	$errors = FALSE;
	//check for errors
	if ($user_data["name"] == "") {
		$errors = TRUE;
		echo "<div class='alert alert-danger'>First name is required field!</div>";
	}
	elseif ($user_data["surname"] == "") {
		$errors = TRUE;
		echo "<div class='alert alert-danger'>Last name is required field!</div>";
	}
	elseif ($user_data["email"] == "") {
		$errors = TRUE;
		echo "<div class='alert alert-danger'>E-mail address is required field!</div>";
	}
	elseif (! filter_var($user_data["email"], FILTER_VALIDATE_EMAIL)) {
		$errors = TRUE;
		echo "<div class='alert alert-danger'>E-mail address is invalid!</div>";
	}
	


	if ( $errors == FALSE ) {
		$content = '<html><body><table>';
		$content .= '<tr style="background-color: #00b9e1; color: #FFFFFF;"><th style="border: 1px solid gray; padding: 5px">Field</th>';
		$content .= '<th style="border: 1px solid gray; padding: 5px">Data</th></tr>';
		
		foreach($user_data as $key => $field) {
			$content .= '<tr><td style="border: 1px solid gray; padding: 5px">' . $key . '</td>';
			if (($key == "attachment") && ($field != "")) {
                $content .= '<td style="border: 1px solid gray; padding: 5px">' . $field["name"] . '</td></tr>';
			}
			else {
				$content .= '<td style="border: 1px solid gray; padding: 5px">' . $field . '</td></tr>';
			}
		}
			
		$content .= "</table></body></html>";
		
		$mail_data["recipient"] = $recipient;
		
		// if string "contact_form" is chosen in configuration, then data from contact form is inserted. On the other way data is static.
		if ($send_from == "contact_form") {
			$mail_data["send_from"] = $user_data["email"];
		}
		else {
			$mail_data["send_from"] = $send_from;
		}
		
		// if string "contact_form" is chosen in configuration, then data from contact form is inserted. On the other way data is static.
		if ($send_from_name == "contact_form") {
			$mail_data["send_from_name"] = $user_data["name"] . " " . $user_data["surname"];
		}
		else {
			$mail_data["send_from_name"] = $send_from_name;
		}
		
		$mail_data["subject"] = $subject;
		$mail_data["content"] = $content;
		$mail_data["message_success"] = $message_success;
		$mail_data["message_fail"] = $message_fail;
		
		send_mail($mail_data, $user_data);
	}
	
	echo '<br><div class="text-center"><a href="index.php">Send again!</a></div>';
?>