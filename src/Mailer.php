<?php

/**
 * Mailer
 *
 * Send messages
 */
class Mailer {
	/**
	 * Send a message
	 *
	 * @param string $email The email address
	 * @param string $message The message
	 *
	 * @return boolean True if sent, false otherwise
	 * @throws Exception
	 */
	public function sendMessage(/*string*/ $email, string $message): bool {

		// If the email argument is empty throw an exception
		if (empty($email)) {
			throw new Exception;
		}

		// Use mail() or PHPMailer for example
		// Delay execution 3 seconds to simulate actual work being done
		sleep(3);

		// Output the message
		echo("Send: '$message' to '$email'");

		return true;
	}
}
