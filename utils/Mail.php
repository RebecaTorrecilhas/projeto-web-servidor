<?php

use PHPMailer\PHPMailer\PHPMailer;

class Mail {
	static public function setup() {
		require_once 'utils/Constants.php';

		$mailer = new PHPMailer();

		$mailer->isSMTP();
		$mailer->Host = $mail->host;
		$mailer->SMTPAuth = true;
		$mailer->Username = $mail->username;
		$mailer->Password = $mail->password;
		$mailer->SMTPSecure = $mail->encryption;
		$mailer->Port = $mail->port;
		$mailer->CharSet = 'UTF-8';

		return $mailer;
	}
}
